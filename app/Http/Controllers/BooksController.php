<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Books;
use App\Models\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookView = array(

            // Ankit will act as key
            "1" => array(

                // Subject and marks are
                // the key value pair
                "book_title" => "Things Fall Apart",
                "book_description" =>  "English Nigeria",
                "book_auther" => 'Chinua Achebe',
                "book_image" => "https://m.media-amazon.com/images/I/81H+63TZuFL.jpg",
            ),
            "2" => array(

                // Subject and marks are
                // the key value pair
                "book_title" => 'Fairy tales',
                "book_description" => 'Danish Denmark',
                "book_auther" => 'Hans Christian Andersen',
                "book_image" => 'https://m.media-amazon.com/images/I/81CAKo3L7aL.jpg',
            ), "3" => array(

                // Subject and marks are
                // the key value pair
                "book_title" => "The Divine Comedy",
                "book_description" => "Italian ",
                "book_auther" => 'Dante Alighieri',
                "book_image" => "https://m.media-amazon.com/images/M/MV5BNjEwYmEwMDgtNzg2NC00MDNmLTgyYjAtOGExODBjYjdjMDJkXkEyXkFqcGdeQXVyODUwMzI5ODk@._V1_.jpg",
            ), "4" => array(

                // Subject and marks are
                // the key value pair
                "book_title" => "Pride and Prejudice",
                "book_description" => "United Kingdom",
                "book_auther" => 'Jane Austen',
                "book_image" => "https://m.media-amazon.com/images/M/MV5BMTA1NDQ3NTcyOTNeQTJeQWpwZ15BbWU3MDA0MzA4MzE@._V1_.jpg",
            ), "5" => array(

                // Subject and marks are
                // the key value pair
                "book_title" => "Wuthering Heights",
                "book_description" => "United Kingdom",
                "book_auther" => 'Emily Bront',
                "book_image" => "https://m.media-amazon.com/images/I/71TjAcMTDML.jpg",


            ),
        );

        $books = Books::all();

        return response()->json($books);
    }


    // public function index()
    // {

    //     $books = Test::all();

    //     return view('show', ['books' => $books]);
    // }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // dd($request->book_image);
        // echo "</pre>";

        // $book = Books::all();
        // dd($book);

        // $book = new Books();

        // $book->book_title = $request->book_title;
        // $book->book_description = $request->book_description;
        // $book->book_auther = $request->book_auther;
        $authorId = author::where('name', $request->book_auther)->get();

        // dd( $authorId);
        $image = base64_encode(file_get_contents($request->file('book_image')));

        $valid = $this->validate($request, [
            'book_title'         => 'required',
            'book_description'   => 'required',
            'book_auther'        => 'required',
        ]);

        $book = Books::create($valid);
        // $book->book_image = $request->book_image;
        $book->book_image = $image;
        $book->author_id  = $authorId[0]->id;

        $book->save();
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $findBook = Books::find($id);
        // dd($findBook);
        return view('update_books', ['request' => $findBook, 'id' => $id, 'authors' => author::all()]);
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $book = Books::find($id);
        // $book = Books::all();
        // $book->delete();



        // to delete all data in column 
        // // one 
        // DB::table('books')->delete();


        // //two 
        Books::truncate();

        return redirect('/index');
    }

    public function updateBook(Request $request, $id)
    {
        $authorId = author::where('name', $request->book_auther)->get();

        # code...
        $book = Books::find($id);
        $book->book_title = $request->book_title;
        $book->book_description = $request->book_description;
        $book->book_auther = $request->book_auther;
        $book->book_image = $request->book_image;
        $book->author_id  = $authorId[0]->id;

        $book->save();
        return redirect('/index');
    }













    // public function update(Request $request, $id)
    // {
    //     $findBook = Test::find($id);
    //     // dd($findBook);
    //     return view('update', ['request' => $findBook, 'id' => $id]);
    // }





    // public function updatename(Request $request, $id)
    // {
    //     # code...
    //     $book = Test::find($id);
    //     $book->book_title = $request->book_title;

    //     $book->save();
    //     return redirect('/show');
    // }





    public function sortDown()
    {
        $sortData = Books::orderBy('updated_at', 'desc')->get();
        return view('index', ['books' => $sortData]);
    }
}