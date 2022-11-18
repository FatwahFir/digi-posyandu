<div class="modal-content">
    <form id="formAction" action="{{ $posyandu->id ? route('posyandu.update', $posyandu->id) : route('posyandu.store') }}" method="POST">
        @csrf
        @if ($posyandu->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">{{ $posyandu->id ? 'Edit' : 'Tambah' }} Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_posyandu" class="form-label">Nama Posyandu</label>
                <input type="text" placeholder="Nama posyandu.." value="{{ $posyandu->nama_posyandu }}"  name="nama_posyandu" class="form-control" id="nama_posyandu">
            </div>
            <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input type="text" placeholder="RW.." value="{{ $posyandu->rw }}"  name="rw" class="form-control" id="rw">
            </div>
            <label>Desa</label>
            <select class="form-select mb-3" aria-label="Default select example" name="id_desa">
                <option value="">--</option>
                @foreach ($desa as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $posyandu->id_desa ? 'selected' : '' }} >{{ $data->nama_desa }}</option>
                @endforeach
            </select>
            <label>Puskesmas</label>
            <select class="form-select mb-3" aria-label="Default select example" name="id_puskesmas">
                <option value="">--</option>
                @foreach ($puskesmas as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $posyandu->id_puskesmas ? 'selected' : '' }} >{{ $data->nama_puskesmas }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">{{ $posyandu->id ? 'Simpan perubahan' : 'Simpan' }}</button>
        </div>
    </form>
</div>