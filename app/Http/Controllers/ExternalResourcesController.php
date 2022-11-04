<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalResourcesController extends ExternalResourceFunctions
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function externalBooksSearch(Request $request)
    {
        $name = $request->get('name');

        $data = $this->getExternalBook($name);

        if (!$data) {
            return [
                "status_code" => 404,
                "status" => "not found",
                "data" => [],
            ];
        } else {
            return [
                "status_code" => 200,
                "status" => "success",
                "data" => $data,
            ];
        }






    }
}
