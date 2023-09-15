<?php
namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Traits\JoinQueryParams;

class EventController extends Controller
{
    use JoinQueryParams;
    
    public function index(Request $request)
    {
        $join = $request->query('join');

       if($join==null){
        $events = Event::all();
 
       }
       else{

       $this->join(Event::class,$join); 
       }



    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->libelle = $request->input('libelle');
        $event ->date = $request->input('date');
        $event->description = $request->input('description');
        $event->user_id = $request->input('user_id');
        $event->save();

        return response()->json($event, 201);
    
    }
} 
