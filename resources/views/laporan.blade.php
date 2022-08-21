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
                            <input type="datetime-local" class="form-control bg-white" name="tanggal" id="tanggal"
                                placeholder="Pilih Tanggal">
                            @error('tanggal')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <button class="btn btn-primary">Lihat Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @isset($data)
            <div class="card" id="tableLaporan">
                <div class="card-body">
                    <h5>Laporan Transaksi Tanggal <h6 id="tglLaporan">{{ $start }} - {{ $end }}</h6>
                    </h5>
                    <div class="table-responsive">
                        {{-- <table class="table table-responsive " id="table1"> --}}
                        <table class="table table-striped nowrap" id="mytable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>kasir</th>
                                    <th>Nama</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Keluar</th>
                                    <th>Kamar</th>
                                    <th>Tipe</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Diskon</th>
                                    <th>Sub Total</th>
                                    <th>PPN</th>
                                    <th>Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->kasir }}</td>
                                        <td>{{ $item->tamu->nama }}</td>
                                        <td>{{ $item->check_in }} | {{ $item->check_in_jam }}</td>
                                        <td>{{ $item->check_out }} | {{ $item->check_out_jam }}</td>
                                        <td>{{ $item->deposit }}</td>
                                        <td class="text-center">{{ $item->kamar_id }}</td>
                                        <td>{{ $item->tipe_kamar }}</td>
                                        <td>{{ $item->paket }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td class="fw-bold">{{ $item->total }}</td>
                                        @if ($item->diskon != null)
                                            <td class="fw-bold text-center">{{ $item->diskon }} %</td>
                                        @else
                                            <td class="fw-bold text-center">-</td>
                                        @endif
                                        <td class="fw-bold">{{ $item->subTotal }}</td>
                                        <td class="fw-bold">15%</td>
                                        <td class="fw-bold">{{ $item->grandTotal }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <h5></h5>
                </div>
            </div>
        @endisset
    </section>
    @push('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    @endpush
    @push('scripts')
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


        <script>
            flatpickr("#tanggal", {
                mode: "range",
                dateFormat: "d-m-Y",
            });

            window.addEventListener('load', function() {
                // grand total
                var table = document.getElementById("mytable"),
                    sumVal = 0;
                for (var i = 1; i < table.rows.length; i++) {
                    sumVal = sumVal + convertToAngka(table.rows[i].cells[15].innerHTML);
                }
                // grand total
                var footer = table.createTFoot();
                var row = footer.insertRow(0);
                var cell = row.insertCell(0);
                cell.colSpan = 16;
                cell.classList.add("text-end");
                cell.innerHTML = "Grand Total = " + convertToRupiah(sumVal);

                function convertToAngka(rupiah) {
                    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
                }

                function convertToRupiah(angka) {
                    var rupiah = '';
                    var angkarev = angka.toString().split('').reverse().join('');
                    for (var i = 0; i < angkarev.length; i++)
                        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
                    return 'Rp ' + rupiah.split('', rupiah.length - 1).reverse().join('');
                }

            })
            $(document).ready(function() {
                var table = $('#mytable').DataTable({
                    // lengthChange: false,
                    autoWidth: true,
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'excelHtml5',
                            className: 'btn-success',
                            footer: true,
                            title: 'Laporan Transaksi ' + $("#tglLaporan").text()
                        }
                    ]
                });

                table.buttons().container()
                    .appendTo('#mytable_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
</x-app-layout>
