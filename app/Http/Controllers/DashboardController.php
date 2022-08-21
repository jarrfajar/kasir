<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\CheckIn;
use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status', 'tersedia')->latest('updated_at')->count();
        $Jumlahkamar = Kamar::latest('updated_at')->count();
        $kamarTersedia = Kamar::where('status', 'terisi')->count();
        $inHouse = CheckIn::where('grandTotal', null)->latest('created_at')->get();
        $check_out = CheckIn::where('check_out', date('d-m-Y'))->where('grandTotal', null)->latest('created_at')->get();

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

        $d = Carbon::parse($start)->format('Y-m-d');
        $e = Carbon::parse($end)->format('Y-m-d');

        foreach (Auth::user()->roles as $item) {
            $role = $item->name;
        }
        if ($role == 'admin' || $role == 'owner') {
            $data = CheckIn::whereBetween('updated_at', [$d, $e])->where('deposit', '!=', null)->get();
        } else {
            $data = CheckIn::whereBetween('updated_at', [$d, $e])->where('deposit', '!=', null)->where('kasir', Auth::user()->name)->get();
        }

        return view('laporan', [
            'data' => $data,
            'start' => $start,
            'end' => $end,
        ]);
    }

    public function laporanExport()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
