<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    public function all(Request $request)
    {
        // $company = Company::with('user')->get();

        // return response()->json([
        //     'company' => $company,

        // ]);


        $id = $request->input('id');
        $user_id = $request->input('user');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $category = $request->input('category');

        if ($id) {
            $company = Company::find($id);

            if ($company) {
                return ResponseFormatter::success(
                    $company,
                    'Data Company berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Company tidak ada',
                    404
                );
            }
        }



        $company = Company::with('user')->get();

        if ($user_id) {
            $company->where('user_id', $user_id);
        }
        if ($name) {
            $company->where('name', 'like', '%' . $name . '%');
        }
        if ($category) {
            $company->where('category', 'like', '%' . $category . '%');
        }

        // return ResponseFormatter::success(
        //     $company->paginate($limit),
        //     'Data list company berhasil diambil'
        // );
        return response()->json([
            'company' => $company,

        ]);
    }
}
