<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Price;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        $tipe_kamar = TipeKamar::all();
        return view('kamar.create', compact('tipe_kamar'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'kode_kamar' => 'required|unique:kamars',
            'tipe_kamar_id' => 'required',
            'status' => 'required',
        ]);
        Kamar::create($attr);
        return redirect()->route('kamar')->with('success', 'Kamar berhasil ditambahkan');
    }

    // public function edit($id)
    // {
    //     $kamar = Kamar::findOrFail($id);
    //     $tipe_kamar = TipeKamar::all();
    //     return view('kamar.edit', compact('kamar', 'tipe_kamar'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $attr = $request->validate([
    //         'kode_kamar' => 'required',
    //         'tipe_kamar_id' => 'required',
    //         'status' => 'required',
    //     ]);
    //     Kamar::whereId($id)->update($attr);
    //     return redirect()->route('kamar')->with('success', 'Kamar berhasil diubah');
    // }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar')->with('success', 'Kamar berhasil dihapus');
    }
}
