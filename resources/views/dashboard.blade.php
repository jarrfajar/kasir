<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row row-cols-auto">
                    <div class="col">
                        <div class="card bg-primary text-white" style="width: 11.5rem;">
                            <div class="card-body">
                                <h2 class="text-white">{{ $Jumlahkamar}}</h4>
                                <h6 class="text-white">Total Kamar</h5>
                                <a href="{{ route('kamar') }}" class="btn btn-light mt-3">Lihat Kamar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-success text-white" style="width: 11.5rem;">
                            <div class="card-body">
                                <h2 class="text-white">{{ $kamar}}</h4>
                                <h6 class="text-white">Kamar Tersedia</h5>
                                <a href="{{ route('check-in') }}" class="btn btn-light mt-3">Lihat Kamar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-danger text-white" style="width: 11.5rem;">
                            <div class="card-body">
                                <h2 class="text-white">{{ $kamarTersedia}}</h4>
                                <h6 class="text-white">Kamar Terpakai</h5>
                                <a href="{{ route('check-out') }}" class="btn btn-light mt-3">Lihat Kamar</a>
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Tamu Yang Sedang Menginap</h5>
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kamar</th>
                                        <th>Check In</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inHouse as $item => $key)
                                        @if ($key->tamu->status == 'check-in')
                                            <tr>
                                                <td>{{ $key->tamu->nama }}</td>
                                                <td>{{ $key->kamar_id }}</td>
                                                <td>{{ $key->check_in }} | {{ $key->check_in_jam }}</td>
                                                {{-- <td>{{ $key->tamu->status }}</td> --}}
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Tamu Yang Akan Check-Out Hari Ini</h5>
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kamar</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($check_out as $item => $key)
                                        @if ($key->tamu->status == 'check-in')
                                            <tr>
                                                <td >{{ $key->tamu->nama }}</td>
                                                <td>{{ $key->kamar_id }}</td>
                                                <td>{{ $key->check_out }} | {{ $key->check_out_jam }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
