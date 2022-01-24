<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ApplyController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apply = ApplyJob::with(['job', 'user', 'edu'])->paginate();

        return view('admin.apply.index', [
            'apply' => $apply
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ApplyJob $apply)
    {
        return view('admin.apply.detail', [
            'item' => $apply
        ]);
    }
    // public function show()
    // {
    //     $item=ApplyJob::all();
    //     return view('admin.apply.detail', compact('item'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apply $apply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyJob $apply)
    {
        $apply->delete();

        return redirect()->route('apply.index');
    }

    /**
     * @param Request $request
     * @param $id
     * @param $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id, $status)
    {
        $apply = ApplyJob::findOrFail($id);

        $apply->status = $status;
        $apply->save();


        return redirect()->route('apply.show', $id);
    }

    public function opencv($id)
    {
        $apply = ApplyJob::findOrFail($id);

        $path = public_path('storage/assets/file/' .  $apply->file);
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('storage/assets/file/' . $file));
    }
}
