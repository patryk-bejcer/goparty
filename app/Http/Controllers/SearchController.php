<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Models\Club;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    function autocomplete(){
        $term = \Illuminate\Support\Facades\Input::get('term');
        $clubs = array();
        $query = Club::where('official_name', 'LIKE', '%'.$term.'%')->limit(5)->get();


        foreach ($query as $club){
            $clubs[] = ['label' => $club->official_name, 'value' => $club->official_name, 'id' => $club->id, 'voivodeship' => $club->voivodeship];
        }
        return \response()->json($clubs);
    }

    function search_clubs(){
        $term = \Illuminate\Support\Facades\Input::get('search');

        $clubs = Club::where('official_name', 'LIKE', '%'. $term. '%')->get();

        return view('site.search.club_search', compact('clubs'));
    }
}
