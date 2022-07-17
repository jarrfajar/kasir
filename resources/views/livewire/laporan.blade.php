<div>
    <form action="">
        <div class="row">
            @csrf
            <div class="col-6">
                <input type="datetime-local" class="form-control bg-white" name="tanggal" id="tanggal" placeholder="Pilih Tanggal">
            </div>
            <div class="col">
                <button wire:click="getTable" class="btn btn-primary">Lihat Laporan</button>
                tes = {{ $price }}
            </div>
        </div>
        
    </form>
</div>
