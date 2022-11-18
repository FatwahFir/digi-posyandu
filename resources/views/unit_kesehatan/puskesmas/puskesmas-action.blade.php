<div class="modal-content">
    <form id="formAction" action="{{ $puskesmas->id ? route('puskesmas.update', $puskesmas->id) : route('puskesmas.store') }}" method="POST">
        @csrf
        @if ($puskesmas->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">{{ $puskesmas->id ? 'Edit' : 'Tambah' }} Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_puskesmas" class="form-label">Nama Puskesmas</label>
                <input type="text" placeholder="Nama puskesmas.." value="{{ $puskesmas->nama_puskesmas }}"  name="nama_puskesmas" class="form-control" id="nama_puskesmas">
            </div>
            <label>Kecamatan</label>
            <select class="form-select mb-3" aria-label="Default select example" name="id_kecamatan">
                <option value="">--</option>
                @foreach ($kecamatan as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $puskesmas->id_kecamatan ? 'selected' : '' }} >{{ $data->nama_kecamatan }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label></label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $puskesmas->alamat }}</textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">{{ $puskesmas->id ? 'Simpan perubahan' : 'Simpan' }}</button>
        </div>
    </form>
</div>