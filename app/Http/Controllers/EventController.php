<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
    //
    public function index(){
    	$events = Event::all();
    	return view('event', compact('events'));
    }
    public function add(){
    	return view('add');
    }
    public function store(Request $request){
    	Event::create($request->all());
    	return redirect(route('events.index'));
    }
    public function edit($id){
    	$event = Event::find($id);
    	return view('edit',compact('event','id'));
    }
    public function update(Request $request,$id){
    	Event::find($id)->update($request->all());
    	return redirect(route('events.index'));
    }
    public function destroy($id){
    	Event::find($id)->delete();
    	return redirect(route('events.index'));
    }
}
