<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use benhall14\phpCalendar\Calendar as Calendar;

class EventController extends Controller
{
    public function createEvent()
    {
        return view('admin.createevent');
    }

    public function store(Request $request)
    {
        $event= new Event();
        $event->title=$request->get('title');
        $event->start_date=$request->get('startdate');
        $event->end_date=$request->get('enddate');
        $event->save();
        return redirect()->route('dashboard')->with('success', 'Event has been added');
    }

    public function calender()
    {
        $events = [];
        $data = Event::all();
        if($data->count()){
            foreach ($data as $key => $value){
                
                $events[] = Calendar::event(
                    $value->title,true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    null,
                    // Add color
                    [
                    'color' => '#000000',
                    'textColor' => '#008000',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);

        return view('admin.calender', compact('calendar'));
      
    }




}
