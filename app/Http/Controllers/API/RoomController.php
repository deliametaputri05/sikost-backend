<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function all(Request $request)
    {

        $id = $request->input('id');
        $kost_id = $request->input('kost_id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if ($id) {
            $room = Room::find($id);

            if ($room) {
                return ResponseFormatter::success(
                    $room,
                    'Data produk berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
            }
        }

        $room = Room::with(['kost']);

        if ($kost_id) {
            $room->where('kost_id', $kost_id);
        }
        if ($name) {
            $room->where('name', 'like', '%' . $name . '%');
        }
        if ($types) {
            $room->where('types', 'like', '%' . $types . '%');
        }
        if ($price_from) {
            $room->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $room->where('price', '<=', $price_to);
        }
        if ($rate_from) {
            $room->where('rate', '>=', $rate_from);
        }
        if ($rate_to) {
            $room->where('rate', '<=', $rate_to);
        }

        return ResponseFormatter::success(
            $room->paginate($limit),
            'Data list room berhasil diambil'
        );
    }
}
