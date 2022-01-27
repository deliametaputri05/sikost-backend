<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FacilitiesRequest;
use App\Models\User;
use App\Models\Facilities;
use App\Models\Kost;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class FacilitiesController extends Controller
{
    public function index()
    {
        $facilities = Facilities::with(['room'])->paginate();

        return view('admin.facilities.index', [
            'facilities' => $facilities
        ]);
    }

    public function create()
    {
        $facilities = Facilities::all();
        $room       = Room::all();

        return view('admin.facilities.create', compact('facilities', 'room'));
    }

    public function store(Request $request)
    {


        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Facilities::create($data);
        // dd($data);

        return redirect()->route('facilities.index');
    }

    public function edit($id, Room $room)
    {
        // $room = Room::find($id);
        $facilities = Facilities::with('room')->where('id', $id)->first();
        $room = Room::all();
// dd($room);
        return view('admin.facilities.edit', compact('facilities', 'room')
            // 'room' => $room,
            // 'kost' => $kost
);
    }

    public function update(Request $request, Facilities $facilities)
    {
        $data = $request->all();

        $facilities->update($data);
// dd($data);
        return redirect()->route('facilities.index');
    }

    public function destroy(Facilities $facilities)
    {
        $facilities->delete();

        return redirect()->route('facilities.index');
    }
}
