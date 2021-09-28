<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;

class PageController extends Controller
{

    public function index(){

        return view('admin.pages.index');
    }
}
