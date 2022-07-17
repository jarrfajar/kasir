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
                <h5>Pilih kamar yang terpakai</h5>
            </div>
            <div class="card-body">
                <div class="row row-cols-auto">
                    @foreach ($kamar as $item)
                        <div class="col">
                            <div class="card bg-danger text-white" style="width: 11.5rem;">
                                <div class="card-body">
                                    <h3 class="text-white">Kamar {{ $item->kode_kamar }}</h3>
                                    <h6 class="text-white">{{ $item->tipe_kamar->tipe_kamar }}</h5>
                                    <a href="{{ route('check-out.detail',$item->kode_kamar) }}" class="btn btn-light mt-3">Pilih Kamar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
