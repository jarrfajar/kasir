<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status','tersedia')->latest('updated_at')->count();
        $Jumlahkamar = Kamar::latest('updated_at')->count();
        $kamarTersedia = Kamar::where('status','terisi')->count();
        $inHouse = CheckIn::where('grandTotal',null)->latest('created_at')->get();
        $check_out = CheckIn::where('check_out', date('d-m-Y'))->latest('created_at')->get();

        return view('dashboard', [
            'kamar' => $kamar,
            'kamarTersedia' => $kamarTersedia,
            'inHouse' => $inHouse,
            'check_out' => $check_out,
            'Jumlahkamar' => $Jumlahkamar,
        ]);
    }

    public function laporan()
    {
        return view('laporan');
    }

    public function laporanStore(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
        ]);
        $tanggal = $request->tanggal;
        $start = Str::of($tanggal)->before(' to');
        $end = Str::of($tanggal)->after('to ');
        $data = CheckIn::whereBetween('check_out',[$start,$end])->where('deposit', '!=', null)->get();
		

        return view('laporan', [
            'data' => $data,
            'start' => $start,
            'end' => $end,
        ]);
    }
    
    
}
