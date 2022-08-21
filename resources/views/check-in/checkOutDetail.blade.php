<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
            CHECK OUT
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
                <h5>Nomor Kamar : {{ $kamar }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('check-out.store', $tamu->id) }}" name="formHarga" method="post">
                    @csrf
                    <div class="row" id="area">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h6># INVOICE</h5>
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="kamar_id" id="kamar_id"
                                                    value="{{ $kamar }}">
                                                <input type="hidden" name="idTamu" value="{{ $tamu->id }}">
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
                                                    value="{{ $tamu->tamu->nama }}" name="tamu_id" id="tamu_id"
                                                    readonly>
                                                <input type="hidden" class="form-control" value="{{ $tamu->tamu->id }}"
                                                    name="tamuId" readonly>
                                                @error('tamu_id')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row mt-3">
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
                                            <input type="text" class="form-control" value="{{ $tamu->paket }}"
                                                name="paket" id="paket" readonly>
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
                                            <p>Harga / Malam : <b>{{ $price->malam }}</b> <br> Harga / 4 Jam :
                                                <b>{{ $price->jam }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($tamu->paket == 'Paket Permalam')
                            <input type="hidden" name="harga" value="{{ $price->malam }}">
                        @elseif($tamu->paket == 'Paket 4 jam')
                            <input type="hidden" name="harga" value="{{ $price->jam }}">
                        @endif
                        <div class="col">
                            <h6>Tanggal / Waktu Check In</h5>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
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
                                                    <input type="text" class="form-control"
                                                        value="{{ $tamu->check_out }}" name="check_out"
                                                        id="check_out" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        value="{{ $tamu->check_out_jam }}" name="check_out_jam"
                                                        id="check_out_jam" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="kasir" id="kasir"
                                        value="{{ Auth::user()->name }}">
                                    <h6 class="mt-3">Total</h5>
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" name="total"
                                                            id="total" value="{{ $total }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="mt-3">Qty</h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="qty"
                                                                id="qty"
                                                                value="{{ $qty != '0' ? $qty . ' hari' : '4 Jam' }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="mt-3">Diskon %</h5>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    name="diskon" id="diskon"
                                                                    placeholder="Masukkan jumlah persen"
                                                                    onkeyup="OnChange(this.value)"
                                                                    onKeyPress="return isNumberKey(event)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="mt-3">Sub Total</h5>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" type-currency="IDR"
                                                                        class="form-control" value=""
                                                                        name="grandTotal" id="grandTotal" readonly>
                                                                    <input type="hidden" name="deposit"
                                                                        id="waktuCheckOut">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="mt-3">PPN</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            value="15%" name="ppn"
                                                                            id="ppn" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <input type="text" name="hargaAsli" id="hargaAsli"> --}}
                                                        <h6 class="mt-3">Grand Total</h5>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <input type="text" class="form-control"
                                                                                name="hargaAsli" id="hargaAsli"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr class="mt-4">
                                                            <h6 class="mt-3">Jumlah Uang</h5>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <input type="text"
                                                                                    type-currency="IDR"
                                                                                    class="form-control"
                                                                                    name="jumlahUang" id="jumlahUang"
                                                                                    onkeyup="myKembalian(this.value)"
                                                                                    onKeyPress="return isNumberKey(event)">
                                                                                @error('jumlahUang')
                                                                                    <div class="text-danger">
                                                                                        {{ $message }}
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="mt-3">Kembalian</h5>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input type="text"
                                                                                        type-currency="IDR"
                                                                                        class="form-control"
                                                                                        name="kembalian"
                                                                                        id="kembalian" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="kasir"
                                                                        id="kasir"
                                                                        value="{{ Auth::user()->name }}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="d-flex justify-content-end">
                                                                                <a href="{{ route('check-in') }}"
                                                                                    class="btn btn-warning mt-5">Batal</a>
                                                                                <a href="#"
                                                                                    class="btn btn-success mx-2 mt-5"
                                                                                    onclick="isDisable()"
                                                                                    name='cetakResi' id="cetakResi"><i
                                                                                        class="fa-solid fa-print"></i>
                                                                                    Cetak
                                                                                    Resi</a>
                                                                                <button class="btn btn-primary mt-5"
                                                                                    id="checkOut" name="checkOut"
                                                                                    value="checkOut">Check Out</button>
                                                                                {{-- <a href="#"
                                                                                    class="btn btn-success"
                                                                                    onclick="print()">Print
                                                                                </a> --}}
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
        <script src="{{ asset('/js/qz-tray.js') }}"></script>
        <script>
            window.addEventListener("load", function() {
                document.getElementById("checkOut").disabled = true;
            })

            function isDisable() {
                document.getElementById("checkOut").removeAttribute("disabled");
            }

            function convertToRupiah(angka) {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for (var i = 0; i < angkarev.length; i++)
                    if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
            }

            function convertToAngka(rupiah) {
                return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
            }
            const date = new Date();

            // dikon input only allow number 1-100 javascript
            let amount = document.getElementById('diskon');
            amount.addEventListener('input', function() {
                const n = amount.value.replace('%', '');
                if (n >= 0 && n <= 100) {
                    amount.value = amount.value.replace('%', '')
                } else {
                    amount.value = n.slice(0, -1)
                }
            })

            getTotal = document.getElementById('total').value;
            document.getElementById('grandTotal').value = getTotal;

            gTotal = document.getElementById('grandTotal').value;
            jumlahUang = document.getElementById('jumlahUang').value;

            ppn = 0.15;
            hargaPpn = ppn * convertToAngka(gTotal);
            hargaAsli = hargaPpn + convertToAngka(getTotal);
            document.getElementById('hargaAsli').value = convertToRupiah(hargaAsli);


            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let second = date.getSeconds();
            let currentDate = `${day}-${month}-${year} ${hours}:${minutes}:${second}`;
            document.getElementById('waktuCheckOut').value = currentDate;


            // diskon
            function OnChange(value) {
                total = document.formHarga.total.value;
                convertTotal = convertToAngka(total);
                hasilConvertTotal = parseInt(convertTotal);


                diskon = document.formHarga.diskon.value;
                persen = parseInt(diskon);

                var hasil = hasilConvertTotal * (persen / 100);
                grandTotal = hasilConvertTotal - parseInt(hasil);

                convertGrandTotal = convertToRupiah(grandTotal);
                if (convertGrandTotal == 'Rp NaN') {
                    document.formHarga.grandTotal.value = getTotal;
                } else {
                    document.formHarga.grandTotal.value = convertGrandTotal;
                }

                // ppn dan grandtotal
                var a = 0.15
                var b = document.formHarga.grandTotal.value;
                var ppn = convertToAngka(b)
                var subTotal = convertToAngka(convertGrandTotal)
                var hargaAsli = a * ppn + subTotal;

                if (convertToRupiah(hargaAsli) == 'Rp NaN') {
                    ppn = 0.15;
                    hargaPpn = ppn * convertToAngka(gTotal);
                    hargaAsli = hargaPpn + convertToAngka(getTotal);
                    document.getElementById('hargaAsli').value = convertToRupiah(hargaAsli);
                } else {
                    document.formHarga.hargaAsli.value = convertToRupiah(hargaAsli);
                }
            }

            // Kembalian
            function myKembalian(value) {
                jumlahUang = document.formHarga.jumlahUang.value;
                converJumlahUang = parseInt(convertToAngka(jumlahUang));

                hargaAsli = document.formHarga.hargaAsli.value;
                convertGTotal = parseInt(convertToAngka(hargaAsli));

                kembalian = converJumlahUang - convertGTotal;
                convertKembalian = convertToRupiah(kembalian);

                document.formHarga.kembalian.value = convertKembalian;
            }

            function print() {
                qz.websocket
                    .connect()
                    .then(() => {
                        return qz.printers.find('POS-80C');
                    })
                    .then((found) => {
                        var config = qz.configs.create(found);
                        // print nota
                        var waktu = document.getElementById('waktuCheckOut').value;
                        var kamar_id = document.getElementById('kamar_id').value;
                        var nama = document.getElementById('tamu_id').value;
                        var invoice = document.getElementById('invoice').value;
                        var tipe_kamar = document.getElementById('tipe_kamar').value;
                        var paket = document.getElementById('paket').value;
                        var check_in = document.getElementById('check_in').value;
                        var check_in_jam = document.getElementById('check_in_jam').value;
                        var check_out = document.getElementById('check_out').value;
                        var check_out_jam = document.getElementById('check_out_jam').value;
                        var total = document.getElementById('total').value;
                        var qty = document.getElementById('qty').value;
                        var kasir = document.getElementById('kasir').value;
                        var diskon = document.getElementById('diskon').value;
                        var subTotal = document.getElementById('grandTotal').value;
                        var subTotal = document.getElementById('grandTotal').value;
                        var ppn = document.getElementById('ppn').value;
                        var hargaAsli = document.getElementById('hargaAsli').value;
                        var jumlahUang = document.getElementById('jumlahUang').value;
                        var kembalian = document.getElementById('kembalian').value;

                        var data = [{
                            type: "html",
                            format: "plain", // or 'plain' if the data is raw HTML
                            data: `
                                <p style="text-align: center">RECEIPT EXAMPLE
                                    <br>${waktu}
                                    <br>${kasir}
                                </p>
                                <hr style="border-top:2px dotted;">
                                <table style="width: 250px;">
                                    <tr>
                                        <td style="text-align: center;" colspan="2">${invoice}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td style="text-align: right;">${nama}</td>
                                    </tr>
                                    <tr>
                                        <td>No.Kamar</td>
                                        <td style="text-align: right;">${kamar_id}</td>
                                    </tr>
                                    <tr>
                                        <td>Tipe Kamar</td>
                                        <td style="text-align: right;">${tipe_kamar}</td>
                                    </tr>
                                    <tr>
                                        <td>Paket</td>
                                        <td style="text-align: right;">${paket}</td>
                                    </tr>
                                    <tr>
                                        <td>Check in</td>
                                        <td style="text-align: right;">${check_in}.${check_in_jam}</td>
                                    </tr>
                                    <tr>
                                        <td>Check out</td>
                                        <td style="text-align: right;">${check_out}.${check_out_jam}</td>
                                    </tr>
                                    <tr>
                                        <td>Qty</td>
                                        <td style="text-align: right;">${qty}</td>
                                    </tr>
                                </table>
                                <hr style="border-top:2px dotted;">
                                <table style="width: 250px;">                                    
                                    <tr>
                                        <td>Total</td>
                                        <td style="text-align: right;">${total}</td>
                                    </tr>
                                    <tr>
                                        <td>Diskon</td>
                                        <td style="text-align: right;">${diskon}%</td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Total</td>
                                        <td style="text-align: right;">${subTotal}</td>
                                    </tr>
                                    <tr>
                                        <td>Ppn</td>
                                        <td style="text-align: right;">${ppn}</td>
                                    </tr>
                                    <tr>
                                        <td>Grand-Total</td>
                                        <td style="text-align: right;">${hargaAsli}</td>
                                    </tr>
                                </table>
                                <hr style="border-top:2px dotted;">
                                <table style="width: 250px;">
                                    <tr>
                                        <td>Tunai</td>
                                        <td style="text-align: right;">${jumlahUang}</td>
                                    </tr>
                                    <tr>
                                        <td>Kembalian</td>
                                        <td style="text-align: right;">${kembalian}</td>
                                    </tr>
                                </table>
                                `,
                        }, ];
                        return qz.print(config, data);
                    })
                    .catch((e) => {
                        alert(e);
                    });
            }
        </script>
    @endpush
</x-app-layout>
