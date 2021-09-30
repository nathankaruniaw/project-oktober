<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use Yajra\Datatables\Datatables;
class PageController extends Controller
{

    public function index(){

        return view('admin.pages.index');
    }

    public function pageGetData(){

        $data = DB::table('page')
            ->where('idPage', DB::raw('idSubPage'))
            ->get();

        return Datatables::of($data)
            ->addColumn('action', function($data){
                return view('admin._action', [
                    'model' => $data,
                    'delete' => route('pageDeleteData',$data->idPage),
                    'edit' => $data->idPage,
                ]);
            })
            ->make(true);

    }

    public function pageAddData(Request $request){

        $max = DB::table('page')->max('idPage');
        $max = $max + 1;

        DB::table('page')
            ->insert([
                'namaPage' => $request->namaPage,
                'statusPage' => $request->statusPage,
                'idSubPage' => $max,
            ]);
    }

    public function pageEditData(Request $request){

        $page = DB::table('page')
            ->where('idPage', $request->idPage)
            ->first();

        $subPage = DB::table('page')
            ->where('idSubPage', $request->idPage)
            ->where('idPage', '<>', $request->idPage)
            ->get();

        $data = [$page, $subPage];

        return response()->json($data);
    }

    public function pageDeleteData($id){

        DB::table('page')
            ->where('idSubPage', $id)
            ->delete();
    }

    public function pageUpdateData(Request $request){

        DB::table('page')
            ->where('idPage', $request->idPage)
            ->update([
                $request->kolom => $request->value
            ]);
    }

    public function pageInsertSubPage(Request $request){

        DB::table('page')
            ->insert([
                'namaPage' => $request->namaPage,
                'statusPage' => $request->statusPage,
                'idSubPage' => $request->idPage
            ]);

        $subPage = DB::table('page')
            ->where('idSubPage', $request->idPage)
            ->where('idPage', '<>', $request->idPage)
            ->get();

        return response()->json($subPage);
    }

    public function pageDeleteSubPage(Request $request){

        DB::table('page')
            ->where('idPage', $request->id)
            ->delete();

        $subPage = DB::table('page')
            ->where('idSubPage', $request->idPage)
            ->where('idPage', '<>', $request->idPage)
            ->get();

        return response()->json($subPage);
    }
}
