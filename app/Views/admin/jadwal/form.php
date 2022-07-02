<div class="modal fade" id="anggotamodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah Peminjaman</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" action="<?=base_url('jadwal/insertAjax')?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    Jenis Lab : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenis_lab" id="flexRadioDefault1" value="multimedia" checked />
                        <label class="form-check-label" for="flexRadioDefault1"> Multimedia Studio </label>
                        <div class="invalid-feedback" id="errorlb"></div>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenis_lab" id="flexRadioDefault2" value="jaringan" />
                        <label class="form-check-label" for="flexRadioDefault2"> Computer Network and Instrumentation </label>
                        <div class="invalid-feedback" id="errorlb"></div>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenis_lab" id="flexRadioDefault3" value="rpl" />
                        <label class="form-check-label" for="flexRadioDefault3"> Software Engineering </label>
                        <div class="invalid-feedback" id="errorlb"></div>
                    </div>
                    <div></div>
                    <div class=" mb-4">
                        <label class="form-label" for="nama_peminjam">Nama Lengkap</label>
                        <input type="text" id="nama_peminjam" name="nama_peminjam" placeholder="Aji Santoso" class="form-control" />
                        <div class="invalid-feedback" id="errornam"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                        <label class="form-label" for="awal_pinjam">Awal Pinjam</label>
                            <input type="datetime-local" id="awal_pinjam" name="awal_pinjam" class="form-control"  min="<?= date('Y-m-d')?>T07:00" max="<?= date('Y-m-d')?>T21:00" />
                            <div class="invalid-feedback" id="errorawp"></div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="akhir_pinjam">Akhir Pinjam</label>
                            <input type="datetime-local" id="akhir_pinjam" name="akhir_pinjam" class="form-control"  min="<?= date('Y-m-d')?>T07:00" max="<?= date('Y-m-d')?>T21:00"/>
                            <div class="invalid-feedback" id="errorakp"></div>
                        </div>
                    </div>
                    
                    Civitas : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault1" value="uns" checked />
                        <label class="form-check-label" for="flexRadioDefault1"> UNS </label>
                        <div class="invalid-feedback" id="errorciv"></div>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault2" value="non" />
                        <label class="form-check-label" for="flexRadioDefault2"> Non-UNS </label>
                        <div class="invalid-feedback" id="errorciv"></div>
                    </div>
                    <?php
                    if (session()->get('loggedIn')) : ?>
                     Verif : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="verif" id="flexRadioDefault1" value="true"  />
                        <label class="form-check-label" for="flexRadioDefault1"> UNS </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="verif" id="flexRadioDefault2" value="false" checked />
                        <label class="form-check-label" for="flexRadioDefault2"> Non-UNS </label>
                    </div>
                    <?php endif; ?>
                    <br>
                    Bukti Pembayaran: <div class="form-outline mb-4">
                        <input type="file" id="bukti" name="bukti" class="form-control" />
                        <div class="invalid-feedback" id="errorbuk"></div>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary mb-4">Tambah Data</button>
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