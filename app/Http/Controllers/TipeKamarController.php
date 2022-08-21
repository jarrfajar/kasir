<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipeKamarController extends Controller
{
    // public function index()
    // {
    //     $tipe_kamar = Price::latest('created_at')->get();
    //     return view('tipe-kamar.index', compact('tipe_kamar'));
    // }
    public function index()
    {
        $tipe_kamar = TipeKamar::latest('created_at')->get();
        return view('tipe-kamar.index', compact('tipe_kamar'));
    }

    public function create()
    {
        return view('tipe-kamar.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'tipe_kamar' => 'required|unique:tipe_kamars',
            'harga' => 'required',
            'jam' => 'required',
        ]);

        TipeKamar::create([
            'tipe_kamar' => $attr['tipe_kamar'],
        ]);
        Price::create([
            'tipe_kamar_id' => TipeKamar::latest()->first()->id,
            'malam' => $attr['harga'],
            'jam' => $attr['jam'],
        ]);

        return redirect()->route('tipe-kamar')->with('success', 'Tipe Kamar berhasil ditambahkan');
    }

    public function update($id)
    {
        $tipe_kamar = TipeKamar::findOrFail($id);
        $price = Price::where('tipe_kamar_id', $id)->first();
        
        return view('tipe-kamar.update', ['tipe_kamar' => $tipe_kamar, 'price' => $price]);
    }

    public function edit(Request $request, $id)
    {
        $tipe_kamar = TipeKamar::findOrFail($id);
        $request->validate([
            'tipe_kamar' => 'required',
            'malam' => 'required',
            'jam' => 'required',
        ]);

        $tipe_kamar->update([
            'tipe_kamar' => $request->tipe_kamar,
        ]);

        $price = Price::where('tipe_kamar_id', $id)->first();
        $price->update([
            'malam' => $request->malam,
            'jam' => $request->jam,
        ]);
        return redirect()->route('tipe-kamar')->with('update', 'Tipe Kamar berhasil diubah');
    }

    public function destroy($id)
    {
        $tipe_kamar = TipeKamar::findOrFail($id);
        $tipe_kamar->delete();
        return redirect()->route('tipe-kamar')->with('success', 'Tipe Kamar berhasil dihapus');
    }
}

