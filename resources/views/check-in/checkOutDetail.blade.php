<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            CHECK OUT
        </h3>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('update')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5>Nomor Kamar :  {{ $kamar }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('check-out.store', $tamu->id) }}" name="formHarga" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h6># INVOICE</h5>
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="kamar_id" value="{{ $kamar }}">
                                                <input type="text" class="form-control" value="{{ $tamu->invoice }}" name="invoice" id="invoice" readonly>
                                                @error('invoice')
                                                    <div class="text-danger">
                                                        {{ 'Nomor kamar harus diisi' }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                                <div class="col">
                                    <h6>Nama Tamu</h5>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" value="{{ $tamu->tamu->nama }}" name="tamu_id" id="tamu_id" readonly>
                                                <input type="hidden" class="form-control" value="{{ $tamu->tamu->id }}" name="tamuId" readonly>
                                            </div>
                                        </div>
                                </div>
                           </div>
                           <div class="row mt-3">
                                <div class="col">
                                    <h6>Tipe Kamar<span class="gcolor"></span> </h6>
                                    <input type="text" class="form-control" value="{{ $price->tipe_kamar->tipe_kamar }}"  name="tipe_kamar" id="tipe_kamar" placeholder="{{ $price->tipe_kamar->tipe_kamar }}" readonly>
                                    @error('tipe_kamar')
                                        <div class="text-danger">
                                            {{ 'Nomor kamar harus diisi' }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <h6>Paket</h6>
                                    <div class="form-s2">
                                        <div>
                                            <input type="text" class="form-control" value="{{ $tamu->paket }}"  name="paket" id="paket" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <b>{{ $price->tipe_kamar->tipe_kamar }}</b>
                                            </div>
                                            <p>Harga / Malam : <b>{{ $price->malam }}</b> <br> Harga / 4 Jam : <b>{{ $price->jam }}</b></p>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h6>Tanggal / Waktu Check In</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{ $tamu->check_in }}" name="check_in" id="check_in" placeholder="Nomor kamar" readonly>
                                            @error('check_in')
                                                <div class="text-danger">
                                                    {{ 'Nomor kamar harus diisi' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{ $tamu->check_out_jam }}" name="check_in_jam" id="check_in_jam" readonly>
                                            @error('check_in_jam')
                                                <div class="text-danger">
                                                    {{ 'Nomor kamar harus diisi' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <h6 class="mt-3">Tanggal / Waktu Check Out</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{ $tamu->check_out }}"  name="check_out" id="check_out" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" value="{{ $tamu->check_out_jam }}" name="check_out_jam" id="check_out_jam" readonly>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <h6 class="mt-3">Total</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="total" id="total" value="{{ $total }}" readonly>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <h6 class="mt-3">Qty</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="qty" id="qty" value="{{ ($qty != '0') ? $qty.' hari' : '4 Jam' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <h6 class="mt-3">Diskon %</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="diskon" id="diskon" placeholder="Masukkan jumlah persen" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <h6 class="mt-3">Grand Total</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" type-currency="IDR" class="form-control" value="" name="grandTotal" id="grandTotal" readonly>
                                            <input type="hidden" name="deposit" id="waktuCheckOut">
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="row">
                               <div class="col-12">
                                   <div class="d-flex justify-content-end">
                                       <a href="{{ route('check-in') }}" class="btn btn-warning mt-5">Batal</a>
                                       <a href="{{ route('check-in') }}"  target="_blank" class="btn btn-success mx-2 mt-5" onclick="isDisable()"><i class="fa-solid fa-print"></i> Cetak Resi</a>
                                       <button class="btn btn-primary mt-5" id="checkOut">Check Out</button>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            window.addEventListener("load", function() {
                document.getElementById("checkOut").setAttribute("disabled"); 
            })

            function isDisable() {
                document.getElementById("checkOut").removeAttribute("disabled"); 
            }

            function convertToRupiah(angka)
            {
                var rupiah = '';		
                var angkarev = angka.toString().split('').reverse().join('');
                for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
            }
            
            function convertToAngka(rupiah)
            {
                return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
            }
            const date = new Date();

            // document.getElementById('diskon').value='0';

            getTotal = document.getElementById('total').value;
            document.getElementById('grandTotal').value=getTotal;

            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let second = date.getSeconds();
            let currentDate = `${day}-${month}-${year} ${hours}:${minutes}:${second}`;
            document.getElementById('waktuCheckOut').value=currentDate;



            function OnChange(value){
                total = document.formHarga.total.value;
                convertTotal = convertToAngka(total);
                hasilConvertTotal = parseInt(convertTotal);
                

                diskon = document.formHarga.diskon.value;
                persen = parseInt(diskon);

                var hasil = hasilConvertTotal * (persen/100); 
                grandTotal = hasilConvertTotal - parseInt(hasil);

                convertGrandTotal = convertToRupiah(grandTotal);
                if (convertGrandTotal == 'Rp NaN') {
                    document.formHarga.grandTotal.value=getTotal;
                }else {
                    document.formHarga.grandTotal.value = convertGrandTotal;
                }
                
            }
        </script>
    @endpush
</x-app-layout>
