<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class AutoCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autocomplete-search');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
  
        $res = Books::select("*")
                ->where("book_title","LIKE","$request->term")
                ->get();
    
        return response()->json($res);
    }
}
