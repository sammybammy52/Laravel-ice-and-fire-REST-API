# Project: Laravel REST API

## Description
This is an application that calls an external
API service to get information about books & also Create, Read, Update and Delete data from a local MYSQL database about books

## Steps to setup the aplication
Set up the .env file with your database authentication credentials and your database name.


1) Install dependencies by running 
```shell
composer install
```

2) Generate migration with 
```shell
php artisan migrate
```

3) To run the application use 
```shell
php artisan serve
```


## End-point: External API Books Search
To get a book from the external API, you need to pass a query parameter with a variable of **'name'** as its seen in the link below. an example book name is **'A Clash of Kings'**. if no query parameter is passed, all books will be returned.
### Method: GET
>```
>http://localhost:8000/api/external-books?name=:nameOfABook
>```
### Query Params

|Param|value|
|---|---|
|name|:nameOfABook|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Create Book
To store a book in your database, you have to send a POST request to the endpoint below.

You also have to add an accept header to accept application/json

You must pass in the following parameters.
    <ul>
        <li> name </li>
        <li> isbn </li>
        <li> authors </li>
        <li> country </li>
        <li> number_of_pages </li>
        <li> publisher </li>
        <li> release_date </li>
     </ul>

a sample raw JSON object can also be seen below
### Method: POST
>```
>http://localhost:8000/api/v1/books
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "name": "Tom Clancy: Locked On",
    "isbn": "978-3641092320",
    "authors": [
        "Tom Clancy",
        "Mark Greaney"
    ],
    "country": "USA",
    "number_of_pages": 592,
    "publisher": "Penguin Publishing Group, 2011",
    "release_date": "2011-12-13"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Retrieve Books
To retrieve books from your database you have to send a GET request to the URL endpoint below, it also has a search functionality.

### Method: GET
>```
>http://localhost:8000/api/v1/books
>```

To search for books with the above endpoint, you just have to pass in a query parameter of **'search'** it allows you to search the **'name'**, **'country'** and **'publisher'** columns in the database. 

### Method: GET
>```
>http://localhost:8000/api/v1/books?search=:searchKey
>```

You are also able to search by year by adding **'year'** to the query parameters
### Method: GET
>```
>http://localhost:8000/api/v1/books?year=:year
>```

In addition you call also pass in both **'search'** and **'year'** query parameters at the same time to narrow down your search even more.
### Method: GET
>```
>http://localhost:8000/api/v1/books?search=:searchKey&year=:year
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Update Book
To update any of the records in your database you have to send a PATCH request to the URL endpoint below. where :id is the id of the specific book you want to update. you must also attach the fields you want to update.

<ul>
        <li> name </li>
        <li> isbn </li>
        <li> authors </li>
        <li> country </li>
        <li> number_of_pages </li>
        <li> publisher </li>
        <li> release_date </li>
     </ul>

an Example is attached below
### Method: PATCH
>```
>http://localhost:8000/api/v1/books/:id
>```
### Body (**raw**)

```json
{
    "release_date": "2011-12-13"
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Delete Book
To delete a book, send a DELETE request to the URL endpoint below, where :id is the id of the specific book you want to delete
### Method: DELETE
>```
>http://localhost:8000/api/v1/books/:id
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Alternative Delete Route
An alternate delete route with the same functionality with the delete route below where :id is the id of the specific book you want to delete
### Method: POST
>```
>http://localhost:8000/api/v1/books/:id/delete
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Show Book
To view an individual book send a GET Request to the URL endpoint below where :id is the id of the specific book your'e looking for
### Method: GET
>```
>http://localhost:8000/api/v1/books/:id
>```


## Tests
Unit Tests are provided, run them by using command

```shell
php artisan test
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

