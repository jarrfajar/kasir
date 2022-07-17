<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\Kamar;
use App\Models\Price;
use App\Models\Tamu;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckInController extends Controller
{
    public function index()
    {
        return view('check-in.index',[
            'checkIns' => CheckIn::all(),
            'kamar' => Kamar::where('status','tersedia')->orderBy('kode_kamar', 'ASC')->get(),
        ]);
    }

    public function create($id)
    {
        $data = TipeKamar::all();
        $inv = 'INV'.'-'.date('Ymd').'-'.str_pad(CheckIn::count()+1, 4, '0', STR_PAD_LEFT);
        $tipe = Kamar::where('kode_kamar', $id)->first();

        $price = Price::where('tipe_kamar_id', $tipe->tipe_kamar_id)->first();

        return view('check-in.create',[
            'kamar' => $id,
            'data'=>$data,
            'tamu' => Tamu::where('status', '!=', 'check-in')->latest()->get(),
            'inv' => $inv,
            'date' => date('d-m-Y'),
            'time' => date('H:i'),
            'tipe' => $tipe,
            'price' => $price,
        ]);
    }

    public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(Price::where('tipe_kamar_id', $id)->get());
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'tamu_id' => 'required',
            'kamar_id' => 'required',
            'tipe_kamar' => 'required',
            'paket' => 'required',
            'harga' => 'required',
            'invoice' => 'required',
            'check_in' => 'required',
            'check_in_jam' => 'required',
            'check_out' => 'required',
            'check_out_jam' => 'required',
            // 'deposit' => 'required',
        ]);

        CheckIn::create($attr);
        Kamar::where('kode_kamar',$request->kamar_id)->update(['status' => 'terisi']);
        Tamu::where('id',$request->tamu_id)->update(['status' => 'check-in']);

        return redirect()->route('check-in')->with('success', 'Check In berhasil ditambahkan');
    }

    public function checkOut()
    {
        return view('check-in.checkOut',[
            'checkIns' => CheckIn::all(),
            'kamar' => Kamar::where('status','terisi')->orderBy('id', 'ASC')->get(),
        ]); 
    }

    public function checkOutDetail($id)
    {
        $data = TipeKamar::all();
        $tipe = Kamar::where('kode_kamar', $id)->first();

        $price = Price::where('tipe_kamar_id', $tipe->tipe_kamar_id)->first();

        $tamu = CheckIn::where('kamar_id', $id)->first();

        // menghitung jumlah selish hari
        $to = Carbon::parse($tamu->check_in);
        $from = Carbon::parse($tamu->check_out);
        $diff = $to->diffInDays($from);

        // menghitung harga selih hari
        if ($tamu->paket == 'Paket Permalam') {
            // convert_to_angka 
            $harga = Str::after($tamu->harga , 'Rp ');
            $harga1 = Str::remove('.', $harga);
            $harga2 = $harga1 * $diff;
            // convert_to_rupiah 
            $total = 'Rp '.strrev(implode('.',str_split(strrev(strval($harga2)),3)));
        }else if ($tamu->paket == 'Paket 4 jam'){
            $total = $tamu->harga;
        }

        return view('check-in.checkOutDetail',[
            'kamar' => $id,
            'data'=>$data,
            'tamu' => $tamu,
            'tipe' => $tipe,
            'price' => $price,
            'total' => $total,
            'qty' => $diff,
        ]);
    }

    public function checkOutStore(Request $request)
    {
        CheckIn::where('kamar_id',$request->kamar_id)->update([
            'deposit' => $request->deposit,
            'grandTotal' => $request->grandTotal,
            'diskon' => $request->diskon,
        ]);
        Kamar::where('kode_kamar',$request->kamar_id)->update(['status' => 'tersedia']);
        Tamu::where('id',$request->tamuId)->update(['status' => 'check-out']);

        return redirect()->route('check-out')->with('success', 'Check Out berhasil');
    }
}
