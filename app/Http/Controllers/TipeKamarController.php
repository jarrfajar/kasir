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
        
        return view('tipe-kamar.update', compact('tipe_kamar'));
    }

    public function edit(Request $request, $id)
    {
        $tipe_kamar = TipeKamar::findOrFail($id);
        $attr = $request->validate([
            'tipe_kamar' => 'required',
            'harga' => 'required',
            'jam' => 'required',
        ]);
        $tipe_kamar->update($attr);
        return redirect()->route('tipe-kamar')->with('success', 'Tipe Kamar berhasil diubah');
    }
}

