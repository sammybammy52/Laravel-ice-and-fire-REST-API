<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\CrudFunctions;


class CrudFunctionsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_method_and_database_storage()
    {
       $data = [
        "id" => 999,
        "name" => "Test Book",
        "isbn" => "444-4444444",
        "authors" => [
            "Brent Faiyaz",
            "Sonder"
        ],
        "country" => "USA",
        "number_of_pages" => 100,
        "publisher" => "Dpat",
        "release_date" => "2022-12-04"
       ];

       $obj = new CrudFunctions;

       $create = $obj->createBook($data);

       $this->assertDatabaseHas('books', [
        'name' => 'Test Book'
       ]);


    }
    public function test_read_function()
    {
        $obj = new CrudFunctions;

       $read = $obj->retrieveBook('Test Book', '2022');

        $this->assertNotEmpty($read);

    }

    public function test_update_function()
    {
        $obj = new CrudFunctions;
        $data = [
            "country" => "Nigeria",
            "number_of_pages" => 110,
        ];
        $update = $obj->updateBook($data, 999);

        $this->assertNotEmpty($update);

    }

    public function test_delete_function()
    {
        $obj = new CrudFunctions;

        $delete = $obj->deleteBook(999);

        $this->assertNotEmpty($delete);

    }
}
