<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            UBAH CHECK IN
        </h3>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session()->get('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5>Nomor Kamar : {{ $tamu->kamar_id }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tamu.extendUpdate', $tamu->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h6># INVOICE</h5>
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="kamar_id" value="{{ $tamu->kamar_id }}">
                                                <input type="text" class="form-control" value="{{ $tamu->invoice }}"
                                                    name="invoice" id="invoice" readonly>
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
                                                <input type="text" class="form-control"
                                                    value="{{ $tamu->tamu->nama }}" readonly>
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
                                            <p> <a href="{{ route('tamu.create') }}"><b class="text-warning">Klik
                                                        disini</b></a> Jika tamu yang dimaksud tidak ditemukan untuk
                                                ditambahkan pada daftar tamu</p>
                                            <p>Harga / Malam : <b>{{ $price->malam }}</b> <br> Harga / 4 Jam :
                                                <b>{{ $price->jam }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row mb-3">
                                <div class="col">
                                    <h6>Tipe Kamar<span class="gcolor"></span> </h6>
                                    <input type="text" class="form-control"
                                        value="{{ $price->tipe_kamar->tipe_kamar }}" name="tipe_kamar" id="tipe_kamar"
                                        placeholder="{{ $price->tipe_kamar->tipe_kamar }}" readonly>
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
                                            <select class="form-select" name="harga" id="harga"
                                                onchange="fakultas()" aria-label="Default select example">
                                                @if ($tamu->paket == 'Paket Permalam')
                                                    <option selected value="{{ $price->malam }}">Paket Permalam
                                                    </option>
                                                @else
                                                    <option selected value="{{ $price->jam }}">Paket 4 jam</option>
                                                    <option value="{{ $price->malam }}">Paket Permalam</option>
                                                @endif
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
                                                {{-- <input type="text" class="form-control bg-white" name="check_in"
                                                    id="check_in" placeholder="Pilih Tanggal"
                                                    value="{{ $tamu->check_in }}" readonly> --}}
                                                <input type="text" class="form-control"
                                                    value="{{ $tamu->check_in }}" name="check_in" id="check_in"
                                                    readonly>
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
                                                <input type="text" class="form-control"
                                                    value="{{ $tamu->check_in_jam }}" name="check_in_jam"
                                                    id="check_in_jam" readonly>
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
                                                    <input type="text" class="form-control bg-white" name="check_out"
                                                        id="paket_check_out" placeholder="Pilih Tanggal"
                                                        value="{{ $tamu->check_out }}" readonly>
                                                    <input type="hidden" id="paket_check_out_hidden"
                                                        value="{{ $tamu->check_out }}">
                                                    @error('check_out')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        value="{{ $tamu->check_out_jam }}" name="check_out_jam"
                                                        id="check_out_jam" readonly>
                                                    <input type="hidden" id="check_out_jam_hidden"
                                                        value="{{ $tamu->check_out_jam }}">
                                                    @error('check_out_jam')
                                                        <div class="text-danger">
                                                            {{ 'Nomor kamar harus diisi' }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('check-in') }}"
                                                    class="btn btn-warning mt-5 mx-2">Batal</a>
                                                <button class="btn btn-primary mt-5">Update</button>
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

            window.addEventListener('load', function() {
                var data = document.getElementById('harga')
                var text = data.options[data.selectedIndex].text;
                document.getElementById('paket').value = text;
                if (text == 'Paket Permalam') {
                    var minDate = new Date();
                    minDate.setDate(minDate.getDate() + 1);
                    flatpickr("#paket_check_out", {
                        dateFormat: "d-m-Y",
                        minDate: minDate
                    });
                }
            })
        </script>
        <script type="text/javascript">
            function fakultas() {
                var data = document.getElementById('harga')
                var text = data.options[data.selectedIndex].text;
                document.getElementById('paket').value = text;

                if (text == 'Paket Permalam') {
                    var minDate = new Date();
                    minDate.setDate(minDate.getDate() + 1);
                    flatpickr("#paket_check_out", {
                        dateFormat: "d-m-Y",
                        minDate: minDate
                    });
                    let test = document.getElementById('check_in_jam').value;
                    document.getElementById('check_out_jam').value = test;
                    document.getElementById('paket_check_out').value = '';
                }

                if (text == 'Paket 4 jam') {
                    var calendar = flatpickr("#paket_check_out");
                    calendar.destroy();
                    let checkOutJam = document.getElementById('paket_check_out_hidden').value;
                    document.getElementById('paket_check_out').value = checkOutJam;
                    let checkInJam = document.getElementById('check_out_jam_hidden').value;
                    document.getElementById('check_out_jam').value = checkInJam;
                }
            }
        </script>
    @endpush
</x-app-layout>
