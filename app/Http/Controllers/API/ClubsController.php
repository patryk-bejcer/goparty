<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClubsController extends Controller
{
    public function getNearestClubs(Request $request)
    {
        $lat = $request->get('lat');
        $long = $request->get('long');

        $clubs = DB::select("SELECT *
        FROM clubs
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long')) 
        ASC LIMIT 4");

        return response()
            ->json($clubs);
    }

    public function getNearestEvents(Request $request)
    {
        /*
         * @TODO Optimize Query
         */

        $lat = $request->get('lat');
        $long = $request->get('long');
        $currentTime = date('y-m-d');

//        $events = Event::all();

//        $events = DB::table('events')
//            ->leftJoin('clubs', 'clubs.id', '=', 'events.id')
//            ->where('events.start_date', '>=', $currentTime)
//            ->orderByRaw(((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long')))
//            ->get();

        $events = DB::select("SELECT events.id, title, start_date, country, official_name, event_img FROM `events`
        LEFT JOIN clubs
        ON events.club_id = clubs.id WHERE start_date > '$currentTime'
        ORDER BY ((latitude-'$lat')*(latitude-'$lat')) + ((longitude - '$long')*(longitude - '$long'))
        ASC LIMIT 6");

        return response()
            ->json($events);
    }
}
