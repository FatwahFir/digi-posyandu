<div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Riwayat Check-Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tanggal Periksa</th>
                        <th>Posyandu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gizi as $item)
                        <tr>
                            <td>{{ $item->tgl_periksa }}</td>
                            <td><span class="badge bg-success">{{ $item->pasien->posyandu->nama_posyandu }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Close</button>
        </div>
</div>