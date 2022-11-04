<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ExternalResourceFunctions;

class ExternalResourcesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_if_route_exists_and_returns_array()
    {
        $response = $this->getJson('/api/external-books');

        $response->assertStatus(200);

        $this->assertNotEmpty($response, true);

    }

    public function test_search_functionality()
    {
        $obj = new ExternalResourceFunctions;
        $name = "A Clash of Kings";
        $data = $obj->getExternalBook($name);

        $expected = [
            [
                "name" => "A Clash of Kings",
                "isbn" => "978-0553108033",
                "authors" => [
                    "George R. R. Martin"
                ],
                "number_of_pages" => 768,
                "publisher" => "Bantam Books",
                "country" => "United States",
                "release_date" => "1999-02-02"
            ]
        ];

        $this->assertEquals($data, $expected);
    }


}
