<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Yajra\Datatables\Datatables;
class SectionController extends Controller
{

    public function index(){

        $pages = DB::table('page')
            ->where('idPage', DB::raw('idSubPage'))
            ->get();

        $subPages = DB::table('page')
            ->where('idPage', '<>', DB::raw('idSubPage'))
            ->get();

        return view('admin.section.index', compact('pages', 'subPages'));
    }

    public function sectionAddData($id){

        $data = DB::table('page')
            ->where('idPage', $id)
            ->first();

        return view('admin.section.detail', compact('data'));
    }

    public function sectionGetSectionData(Request $request){
        $data = DB::table('pageSection')
            ->where('idPage', $request->idPage)
            ->leftJoin('section', 'section.idSection', 'pageSection.idSection')
            ->orderBy('pageSection.urutanPageSection', 'asc')
            ->get();

        $section = DB::table('section')
            ->orderBy('idSection', 'asc')
            ->get();

        $data = [$data, $section];

        return response()->json($data);
    }

    public function sectionUpdateSectionData(Request $request){

        // dd($request);

        $count = 1;
        foreach($request->list as $list){
            DB::table('pageSection')
                ->updateOrInsert([
                    'idSection' => $list,
                    'idPage' => $request->idPage,
                ],[
                    'idSection' => $list,
                    'idPage' => $request->idPage,
                    'urutanPageSection' => $count
                ]);
            $count++;
        }
    }
}
