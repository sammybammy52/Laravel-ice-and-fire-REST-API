<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookController extends CrudFunctions
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'isbn' => 'required|unique:books',
            'authors' => 'required',
            'country' => 'required',
            'number_of_pages' => 'required|integer',
            'publisher' => 'required',
            'release_date' => 'required',
        ]);

        try {
            $data = $request->all();
            $book = $this->createBook($data);

            return [
                "status_code" => 201,
                "status" => "success",
                "data" => [
                    "book" => $book
                ]
            ];

        } catch (\Exception $e) {
            return response()->json([
                "status_code" => 500,
                "status" => "error occured",
                "message" => $e->getMessage(),
                "data" => []
            ],500);
        }



    }


    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            $search = $request->get('search');
            $year = $request->get('year');

            $books = $this->retrieveBook($search, $year);

            return [
                "status_code" => 200,
                "status" => "success",
                "data" => $books
            ];
        } catch (\Exception $e) {
            return response()->json([
                "status_code" => 400,
                "status" => "error occured",
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        try {
            $data = $request->all();
            $book = $this->updateBook($data, $id);
            return [
                "status_code" => 200,
                "status" => "success",
                "message" => "The book {$book->name} was updated successfully",
                "data" => $book
            ];
        } catch (\Exception $e) {
            return response()->json([
                    "status_code" => 400,
                    "status" => "error occured",
                    "message" => $e->getMessage(),
                    "data" => []
                ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bookName = $this->deleteBook($id);
            return [
                "status_code" => 204,
                "status" => "success",
                "message" => "The book '{$bookName[0]["name"]}' was deleted successfully",
                "data" => []
            ];
        } catch (\Exception $e) {
            return response()->json([
                "status_code" => 400,
                "status" => "error occured",
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $book = $this->showBook($id);

            return [
                "status_code" => 200,
                "status" => "success",
                "data" => $book
            ];
        } catch (\Exception $e) {
            return response()->json([
                "status_code" => 400,
                "status" => "error occured",
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }


}
