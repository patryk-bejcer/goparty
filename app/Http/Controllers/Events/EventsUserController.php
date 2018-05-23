<?php

namespace App\Http\Controllers\Events;

use App\Models\Event;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class EventsUserController extends Controller
{

    public function index()
    {

    }

    public function allEvents()
    {
        $events = Event::where('start_date', '>=', date('Y-m-d H:i:s'))
            ->orderBy('start_date')
            ->paginate(15);

        return view('site.events.index', compact('events'));
    }

    public function clubEvents()
    {
        echo 'single.club.events';
    }

    public function singleEvent($id)
    {
        echo $id;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchEvents(Request $request)
    {

        /*
         * @TODO Finish search events form 
         */

        $city = $request->get('city');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        if ($city) {
            $events = Event::where([
                ['start_date', '>=', $startDate],
                ['start_date', '<=', $endDate],
            ])->
            whereHas('club', function ($query) use ($city) {
                $query->where('locality', 'like', $city);
            })->get();
        } else {
            $events = Event::where([
                ['start_date', '>=', $startDate],
                ['start_date', '<=', $endDate],
            ])->get();
        }

//	    return response()->json($events);
        return view('site.events.search', compact('events'));
    }

}
