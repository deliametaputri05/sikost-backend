<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ApplyController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $job_id = $request->input('job');
        $letter = $request->input('letter');
        $status = $request->input('status');
        $file = $request->input('file');



        if ($id) {
            $apply = ApplyJob::with(['job.company', 'user'])->find($id);

            if ($apply) {
                return ResponseFormatter::success(
                    $apply,
                    'Data transaksi berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data transaksi tidak ada',
                    404
                );
            }
        }

        $apply = ApplyJob::with(['job.company', 'user'])->where('user_id', Auth::user()->id);

        if ($job_id) {
            $apply->where('job_id', $job_id);
        }
        if ($status) {
            $apply->where('status', $status);
        }
        if ($letter) {
            $apply->where('letter', $letter);
        }
        if ($file) {
            $apply->where('file', $file);
        }

        return ResponseFormatter::success(
            $apply->paginate($limit),
            'Data list lamar pekerjaan berhasil diambil'
        );
    }

    public function update(Request $request, $id)
    {
        $apply = ApplyJob::findOrFail($id);

        $apply->update($request->all());

        return ResponseFormatter::success($apply, 'Apply Job berhasil diperbarui');
    }

    public function uploadFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(['error' => $validator->errors()], 'Update file fails', 401);
        }

        if ($request->file('file')) {
            $file = $request->file->store('assets/cv', 'public');

            $apply = Auth::apply();
            $apply->file = $file;
            $apply->update();

            return ResponseFormatter::success([$file], 'File successfully uploaded');
        }
    }




    public function submit(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
            'file' => 'required',
            'letter' => 'required',
            'status' => 'required',
        ]);
        $path = "public/assets/file";
        $namePhoto = "";

        if ($request->file('file')) {
            $file = $request->file('file');
            $namePhoto = $file->getClientOriginalName();
            $file->storeAs($path, $namePhoto);
        }
        $apply = ApplyJob::create([

            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'file' => $namePhoto,
            'letter' => $request->letter,
            'status' => $request->status,

        ]);


        $apply = ApplyJob::with(['job', 'user'])->where('job_id', $apply->job_id)->first();
        $apply->file = URL::to($path . '/' . $namePhoto);
        // dd($apply);


        return ResponseFormatter::success(
            $apply,
            'Berhasil'
        );
    }

    function upload(Request $request)
    {
        $result = $request->file('file')->store('assets/file', 'public');
        // $path = 
        return ["result" => $result];
    }
}
