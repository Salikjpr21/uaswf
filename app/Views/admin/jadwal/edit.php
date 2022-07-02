<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit Jadwal</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" action="jadwal/<?= $id ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <?= csrf_field(); ?>
                     Verif : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="verif" id="flexRadioDefault1" value="true"  />
                        <label class="form-check-label" for="flexRadioDefault1"> Verifikasi </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="verif" id="flexRadioDefault2" value="false" checked />
                        <label class="form-check-label" for="flexRadioDefault2"> Belum Verifikasi </label>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mb-4">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.error) {
                        if (response.error.jenis_lab) {
                            $('#jenis_lab').addClass('is-invalid');
                            $('#errorlb').html(response.error.jenis_lab);
                        } else {
                            $('#jenis_lab').removeClass('is-invalid');
                            $('#errorlb').html('');
                        }
                        if (response.error.nama_peminjam) {
                            $('#nama_peminjam').addClass('is-invalid');
                            $('#errornam').html(response.error.nama_peminjam);
                        } else {
                            $('#nama_peminjam').removeClass('is-invalid');
                            $('#errornam').html('');
                        }
                        if (response.error.civitas) {
                            $('#civitas').addClass('is-invalid');
                            $('#errorciv').html(response.error.civitas);
                        } else {
                            $('#civitas').removeClass('is-invalid');
                            $('#errorciv').html('');
                        }
                        if (response.error.awal_pinjam) {
                            $('#awal_pinjam').addClass('is-invalid');
                            $('#errorawp').html(response.error.awal_pinjam);
                        } else {
                            $('#awal_pinjam').removeClass('is-invalid');
                            $('#errorawp').html('');
                        }
                        if (response.error.akhir_pinjam) {
                            $('#akhir_pinjam').addClass('is-invalid');
                            $('#errorakp').html(response.error.akhir_pinjam);
                        } else {
                            $('#akhir_pinjam').removeClass('is-invalid');
                            $('#errorakp').html('');
                        } 
                        if (response.error.akhir_pinjam) {
                            $('#bukti').addClass('is-invalid');
                            $('#errorbuk').html(response.error.bukti);
                        } else {
                            $('#bukti').removeClass('is-invalid');
                            $('#errorbuk').html('');
                        } 
                        
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        $('#anggotamodal').modal('hide');
                        tampilData();
                    }
                }
            });
        });
    });
</script>