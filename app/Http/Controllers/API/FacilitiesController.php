<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    public function all(Request $request)
    {


        $id = $request->input('id');
        $room_id = $request->input('room_id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');

        if ($id) {
            $facilities = Facilities::find($id);

            if ($facilities) {
                return ResponseFormatter::success(
                    $facilities,
                    'Data facilities berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data facilities tidak ada',
                    404
                );
            }
        }

        $facilities = facilities::with(['room']);

        if ($room_id) {
            $facilities->where('room_id', $room_id);
        }

        if ($name) {
            $facilities->where('name', 'like', '%' . $name . '%');
        }

        return ResponseFormatter::success(
            $facilities->paginate($limit),
            'Data list facilities berhasil diambil'
        );
    }
}
