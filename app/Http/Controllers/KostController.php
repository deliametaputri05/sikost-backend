<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KostRequest;
use App\Models\Kost;
use Illuminate\Support\Facades\Auth;

class KostController extends Controller
{
    public function index()
    {
        $kost = Kost::paginate();
        return view('admin.kost.index', ['kost' => $kost]);
    }

    public function create()
    {
        return view('admin.kost.create');
    }

    public function store(KostRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['picturePath'] = $request->file('picturePath')->store('assets/company', 'public');

        Kost::create($data);

        return redirect()->route('kost.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Kost $kost)
    {
        return view('admin.kost.edit', [
            'item' => $kost
        ]);
    }

    public function update(KostRequest $request, Kost $kost)
    {
        $data = $request->all();

        if ($request->file('picturePath')) {
            $data['picturePath'] = $request->file('picturePath')->store('assets/company', 'public');
        }
        if ($request->file(null)) {
        }

        $kost->update($data);

        return redirect()->route('kost.index');
    }

    public function destroy(Kost $kost)
    {
        $kost->delete();

        return redirect()->route('kost.index');
    }
}
