<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


//This Controller holds special methods or computations that might be needed by the ExternalResourcesController

class ExternalResourceFunctions extends Controller
{

    public function getExternalBook($name)
    {
        $searchKey = "https://www.anapioficeandfire.com/api/books?name={$name}";
        $response =  Http::get($searchKey);
        $jsonResponse = $response->json($key = null);

        if (count($jsonResponse) < 1) {
            return false;
        }
        else {
            $data = [];
            for ($i = 0; $i < count($jsonResponse); $i++) {
                $element = $jsonResponse[$i];
                $date = date_create($element["released"]);
                $elementArray = [
                    "name" => $element["name"],
                    "isbn" => $element["isbn"],
                    "authors" => $element["authors"],
                    "number_of_pages" => $element["numberOfPages"],
                    "publisher" => $element["publisher"],
                    "country" => $element["country"],
                    "release_date" => date_format($date, "Y-m-d"),

                ];
                array_push($data, $elementArray);
            }

            return $data;
        }
    }
}
