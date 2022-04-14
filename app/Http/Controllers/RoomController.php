<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Facility;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $rooms = Room::orderBy('name')->get();
        return view('admin.rooms', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $facilities = Facility::orderBy('name')->get();
        $users = User::orderBy('surname')->orderBy('firstname')->get();

        return view('admin.create_room', compact(['facilities', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Room::create(request()->validate([
            'name' => ['required'],
            'facility_id' => ['required'],
            'user_id' => ['required']
        ]));
        session()->flash('success', 'Room created successfully');
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        $facilities = Facility::orderBy('name')->get();
        $users = User::orderBy('surname')->orderBy('firstname')->get();
        return view('admin.edit_room', compact(['room', 'facilities', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        request()->validate([
            'name' => ['required'],
            'facility_id' => ['required'],
            'user_id' => ['required']
        ]);

        $room->name = $request->name;
        $room->facility_id = $request->facility_id;
        $room->user_id = $request->user_id;
        $room->save();

        session()->flash('success', 'Room updated successfully');
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        session()->flash('success', $room->name.' has been deleted successfully');
        return back();
    }
}
