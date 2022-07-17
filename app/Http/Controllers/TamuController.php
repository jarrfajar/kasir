<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    //     $this->middleware('verified');
    // }
    
    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        return view('tamu.index',[
            'tamu' => Tamu::latest('created_at')->get(),
        ]);
    }

    public function create()
    {
        return view('tamu.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'status' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kab_kota' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'rt_rw' => 'required',
            'kel_desa' => 'required',
            'kecamatan' => 'required',
            'warga_negara' => 'required',
            'nomor' => 'required',
        ]);

        Tamu::create($attr);

        return redirect()->route('tamu')->with('success','Tamu Berhasil Ditambahkan');
    }

    public function update($id) {
        $tamu = Tamu::findOrFail($id);
        return view('tamu.update',[
            'tamu' => $tamu,
        ]);
    }

    public function edit(Request $request, $id) {
        $tamu = Tamu::findOrFail($id);
        $attr = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kab_kota' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'rt_rw' => 'required',
            'kel_desa' => 'required',
            'kecamatan' => 'required',
            'warga_negara' => 'required',
            'nomor' => 'required',
        ]);
        $tamu->update($attr);
        return redirect()->route('tamu')->with('update','Data Tamu Berhasil Diubah');
    }

    public function inHouse()
    {
        return view('tamu.inHouse',[
            'tamu' => CheckIn::where('grandTotal',null)->latest('created_at')->get(),
        ]);
    }

}
