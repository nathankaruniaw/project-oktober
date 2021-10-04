<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use response;

class DashboardController extends Controller
{
    //
    public function dashboard(){

        $page = DB::table('page')
            ->where('page.idPage', '1')
            ->leftJoin('pageSection', 'pageSection.idPage', 'page.idPage')
            ->orderBy('page.idPage', 'asc')
            ->orderBy('pageSection.urutanPageSection', 'asc')
            ->get();

        dd($page);
        return view('dashboard.dashboard');
    }

    public function halaman($halaman){

        $pages = DB::table('page')
            ->where('namaPage', $halaman)
            ->first();

        $sections = DB::table('pageSection')
            ->where('pageSection.idPage', $pages->idPage)
            ->orderBy('pageSection.urutanPageSection', 'asc')
            ->leftJoin('section', 'section.idSection', 'pageSection.idSection')
            ->get();

        // dd($sections);

        return view('dashboard.halaman', compact('pages', 'sections'));
    }
}
