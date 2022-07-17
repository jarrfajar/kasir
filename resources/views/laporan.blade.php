<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan</h3>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('laporan.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <input type="datetime-local" class="form-control bg-white" name="tanggal" id="tanggal" placeholder="Pilih Tanggal">
                            @error('tanggal')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" >Lihat Laporan</button>
                        </div>
                    </div>
                </form>
                {{-- @livewire('laporan') --}}
            </div>
        </div>
        @isset($data)
            <div class="card" id="tableLaporan">
                <div class="card-body">
                    <h5>Laporan Transaksi Tanggal <h6>{{ $start }} - {{ $end }}</h6></h5>
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kamar</th>
                                        <th>Tipe Kamar</th>
                                        <th>Paket</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->check_in }}</td>
                                            <td>{{ $item->kamar_id }}</td>
                                            <td>{{ $item->tipe_kamar }}</td>
                                            <td>{{ $item->paket }}</td>
                                            <td>{{ $item->harga }}</td>
                                            @if ($item->diskon != null)
                                                <td class="fw-bold text-center">{{ $item->diskon }} %</td>
                                            @else
                                            <td class="fw-bold text-center">-</td>
                                            @endif
                                            <td class="fw-bold">{{ $item->grandTotal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end me-5">
                                <b><h5 id="val"></h5></b>
                            </div>
                        </div>
                    <h5></h5>
                </div>
            </div>
        @endisset
    </section>
    @push('scripts')
        <script>
            flatpickr("#tanggal", {
                mode: "range",
                dateFormat: "d-m-Y",
            });

            window.addEventListener('load', function() {
                var table = document.getElementById("table1"),
                sumVal = 0;
                for (var i = 1; i < table.rows.length; i++) {
                    sumVal = sumVal + convertToAngka(table.rows[i].cells[6].innerHTML);
                }

                document.getElementById("val").innerHTML = "SubTotal = " + convertToRupiah(sumVal);

                function convertToAngka(rupiah)
                {
                    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
                }

                function convertToRupiah(angka)
                {
                    var rupiah = '';		
                    var angkarev = angka.toString().split('').reverse().join('');
                    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                    return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
                }
            })

        </script>
    @endpush
</x-app-layout>
