<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function all(Request $request)
    {


        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $category = $request->input('category');

        if ($id) {
            $kost = Kost::find($id);

            if ($kost) {
                return ResponseFormatter::success(
                    $kost,
                    'Data Kost berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Kost tidak ada',
                    404
                );
            }
        }

        $kost = Kost::query();

        if ($name) {
            $kost->where('name', 'like', '%' . $name . '%');
        }
        if ($category) {
            $kost->where('category', 'like', '%' . $category . '%');
        }

        return ResponseFormatter::success(
            $kost->paginate($limit),
            'Data list Kost berhasil diambil'
        );
        // return response()->json([
        //     'kost' => $kost,

        // ]);
    }
}
