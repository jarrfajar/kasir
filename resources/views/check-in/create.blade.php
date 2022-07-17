<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            CHECK IN
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
                <form action="{{ route('check-in.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h6># INVOICE</h5>
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="kamar_id" value="{{ $kamar }}">
                                                <input type="text" class="form-control" value="{{ $inv }}" name="invoice" id="invoice" readonly>
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
                                                <select class="choices form-select" name="tamu_id" id="tamu_id" aria-label="Default select example">
                                                    <option disabled selected>-PilihTamu-</option>
                                                    <optgroup label="Pilih Tamu">
                                                        @foreach ($tamu as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                           </div>
                           <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body">
                                            <div class="card-title">
                                              Suite.
                                            </div>
                                            <p> <a href="{{ route('tamu.create') }}"><b class="text-warning">Klik disini</b></a> Jika tamu yang dimaksud tidak ditemukan untuk ditambahkan pada daftar tamu</p>
                                            <p>Harga / Malam : <b>{{ $price->malam }}</b> <br> Harga / 4 Jam : <b>{{ $price->jam }}</b></p>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3">
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
                                            <select class="form-select" name="harga" id="harga" onchange="fakultas()" aria-label="Default select example">
                                                <option disabled selected>-Pilih Paket-</option>
                                                <option value="{{ $price->malam }}">Paket Permalam</option>
                                                <option value="{{ $price->jam }}">Paket 4 jam</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="paket" id="paket">
                            </div>
                            <h6>Tanggal / Waktu Check In</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="datetime-local" class="form-control bg-white" name="check_in" id="check_in" placeholder="Pilih Tanggal" readonly>
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
                                            <input type="text" class="form-control" value="{{ $time }}" name="check_in_jam" id="check_in_jam" readonly>
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
                                            <input type="datetime-local" class="form-control bg-white" name="check_out" id="paket_check_out" placeholder="Pilih Tanggal">
                                            @error('check_out')
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
                                            <input type="text" class="form-control" value="{{ $time }}" name="check_out_jam" id="check_out_jam" readonly>
                                            @error('check_out_jam')
                                                <div class="text-danger">
                                                    {{ 'Nomor kamar harus diisi' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                           </div>
                           {{-- <h6 class="mt-3">Deposit</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" type-currency="IDR" class="form-control" value="{{ old('deposit') }}" name="deposit" id="deposit" placeholder="Jumlah Deposit">
                                            @error('deposit')
                                                <div class="text-danger">
                                                    {{ 'Paket Permalam wajib diisi' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                           </div> --}}
                           <div class="row">
                               <div class="col-12">
                                   <div class="d-flex justify-content-end">
                                       <a href="{{ route('check-in') }}" class="btn btn-warning mt-5 mx-2">Batal</a>
                                       <button class="btn btn-primary mt-5">Check In</button>
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
            // document.getElementById('check_out_jam').value='13:00'
            flatpickr("#check_in", {
              dateFormat: "d-m-Y",
              defaultDate: new Date(),
              enable: [new Date()],
            });

            flatpickr("#paket_check_out", {
              dateFormat: "d-m-Y",
            });
          </script>
        <script type="text/javascript">
            function fakultas(){
                var data = document.getElementById('harga')
                var text=data.options[data.selectedIndex].text;
                document.getElementById('paket').value=text;       
                                
                if(text=='Paket 4 jam'){
                    flatpickr("#paket_check_out", {
                        dateFormat: "d-m-Y",
                        defaultDate: new Date(),
                        enable: [new Date()],
                    });
                    var today = new Date();
                    today.setHours(today.getHours() + 4);
                    let date = today.toString().slice(16,21);
                    document.getElementById('check_out_jam').value=date
                } 
                if(text=='Paket Permalam'){
                    flatpickr("#paket_check_out", {
                        dateFormat: "d-m-Y",
                        minDate: "today"
                    });
                    var chekJam = document.getElementById('check_in_jam').value;
                    document.getElementById('check_out_jam').value=chekJam
                } 
            }
        </script>
    @endpush
</x-app-layout>
