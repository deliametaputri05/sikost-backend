<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class EducationController extends Controller
{
    public function all(Request $request)
    {
        // dd($request);

        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $user_id = $request->input('user');
        $name = $request->input('name');
        $major = $request->input('major');
        $level = $request->input('level');
        $year = $request->input('year');
        $gpa = $request->input('gpa');
        $skill = $request->input('skill');



        if ($id) {
            $edu = Education::with(['user'])->find($id);

            if ($edu) {
                return ResponseFormatter::success(
                    $edu,
                    'Data education berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data education tidak ada',
                    404
                );
            }
        }

        $edu = Education::with(['user'])->where('user_id', Auth::user()->id);

        if ($user_id) {
            $edu->where('user_id', $user_id);
        }
        if ($name) {
            $edu->where('name', $name);
        }
        if ($major) {
            $edu->where('major', $major);
        }
        if ($level) {
            $edu->where('level', $level);
        }
        if ($year) {
            $edu->where('year', $year);
        }
        if ($gpa) {
            $edu->where('gpa', $gpa);
        }
        if ($skill) {
            $edu->where('skill', $skill);
        }

        return ResponseFormatter::success(
            $edu->paginate($limit),
            'Data education berhasil diambil'
        );
    }

    public function create(Request $request)
    {
        $request->validate([

            'user_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'major' => 'required',
            'level' => 'required',
            'year' => 'required',
            'gpa' => 'required',
            'skill' => 'required',
        ]);

        $edu = Education::create([

            'user_id' => $request->user_id,
            'name' => $request->name,
            'major' => $request->major,
            'level' => $request->level,
            'year' => $request->year,
            'gpa' => $request->gpa,
            'skill' => $request->skill,

        ]);


        $edu = Education::with(['user'])->where('user_id', $edu->user_id)->first();


        return ResponseFormatter::success(
            $edu,
            'Berhasil'
        );
    }
}
