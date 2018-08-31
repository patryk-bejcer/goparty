<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Club;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    function autocomplete(){
        $term = \Illuminate\Support\Facades\Input::get('term');
        $clubs = array();
        $query = Club::where('official_name', 'LIKE', '%'.$term.'%')->limit(5)->get();


        foreach ($query as $club){
            $clubs[] = ['label' => $club->official_name, 'value' => $club->official_name, 'id' => $club->id, 'locality' => $club->locality];
        }
        return \response()->json($clubs);
    }

    function search_clubs(){
        $clubs = array();
        if(($term = \Illuminate\Support\Facades\Input::get('music_type')) != null){

            $term_to_return = Music::findOrFail($term);
            $get_clubs_by_music_type = DB::table('club_musics')->where('music_type_id', $term)->get();
            $arr = [];
            $zmienna = array();
            foreach ($get_clubs_by_music_type as $club){

                $c = Club::withTrashed()->find($club->club_id);
                if(!$c->trashed()){
                    array_push($clubs, $c);
                }

            }

            return view('site.search.club_search', compact('clubs'))->with(['search_category'=>$term_to_return->name]);

        }
        $term = \Illuminate\Support\Facades\Input::get('search');

        $clubs = Club::where('official_name', 'LIKE', '%'. $term. '%')->get();


        return view('site.search.club_search', compact('clubs'))->with(['search_category'=>$term]);
    }
}
