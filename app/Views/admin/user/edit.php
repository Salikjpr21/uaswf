<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" action="user/<?= $id ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field(); ?>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="nd">Nama depan</label>
                            <input type="text" id="nd" name="namadepan" placeholder="Namadepan" class="form-control" value="<?= $nama_depan ?>" />
                            <div class="invalid-feedback" id="errornd"></div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="nb">Nama belakang</label>
                            <input type="text" id="nb" name="namabelakang" placeholder="Namabelakang" class="form-control" value="<?= $nama_belakang ?>"/>
                            <div class="invalid-feedback" id="errornb"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="al">Alamat Rumah</label>
                        <textarea class="form-control" name="alamat" placeholder="Jl. Address no.69 rt4/20" id="al" rows="4"><?= $alamat ?></textarea>
                        <div class="invalid-feedback" id="erroral"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="tempatlahir">Tempat Lahir</label>
                            <input type="text" id="tl" name="tempatlahir" placeholder="Birthplace" class="form-control" value="<?= $tempat_lahir ?>"/>
                            <div class="invalid-feedback" id="errortl"></div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                            <input type="date" id="tanggallahir" name="tanggallahir" class="form-control" value="<?= $tanggal_lahir ?>"/>
                        </div>
                    </div>
                    <div class="row mb-4 mx-3">
                    Jenis Kelamin : <div class="form-check form-check-inline mb-4 mx-3 col">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault1" value="laki-laki" checked />
                        <label class="form-check-label" for="flexRadioDefault1"> Laki-laki </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3 col">
                        <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault2" value="perempuan" />
                        <label class="form-check-label" for="flexRadioDefault2"> Perempuan </label>
                    </div>
                    Civitas : <div class="form-check form-check-inline mb-4 mx-3 col">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault1" value="uns" />
                        <label class="form-check-label" for="flexRadioDefault1"> UNS </label>
                    </div>
                    <div class="form-check form-check-inline mb-4 mx-3 col">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault2" value="non" checked/>
                        <label class="form-check-label" for="flexRadioDefault2"> Non-UNS </label>
                    </div>
                    </div>
                    <div class=" mb-4">
                        <label class="form-label" for="tel">Telepon</label>
                        <input type="tel" id="tel" name="telepon" placeholder="081234567890" pattern="[0-9]{10-12}" class="form-control" value="<?= $telepon ?>"/> 
                        <div class="invalid-feedback" id="errortel"></div>
                    </div>
                    <div class=" mb-4">
                        <label class="form-label" for="em">Email</label>
                        <input type="email" id="em" name="email" placeholder="email@example.com" class="form-control" value="<?= $email ?>"/>
                        <div class="invalid-feedback" id="errorem"></div>
                    </div>
                    <div class=" mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="username" class="form-control" value="<?= $username ?>"/>
                        <div class="invalid-feedback" id="errorus"></div>
                    </div>
                    <div class=" mb-4">
                        <label class="form-label" for="pass">Password</label>
                        <input type="password" id="pass" name="password" placeholder="********" min-length="8" class="form-control"  />
                        <input type="hidden" id="passlama" name="passlama" value="<?= $password ?>" />
                        <div class="invalid-feedback" id="errorps"></div>
                    </div>
                    <div class=" mb-4">
                        <label class="form-label" for="pass">Ulangi Password</label>
                        <input type="password" id="pass_confirm" name="password_confirm" placeholder="********" min-length="8" class="form-control" />
                        <div class="invalid-feedback" id="errorpsc"></div>
                    </div>
                    Pas Foto : <div class="form-outline mb-4">
                        <input type="file" id="ava" name="avatar" class="form-control" />
                        <input type="hidden" id="avalama" name="avalama" value="<?= $avatar ?>" />
                        <div class="invalid-feedback" id="errorava"></div>
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
                beforeSend: function() {
                    $('#submit').attr('disable', 'disabled');
                    $('#submit').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#submit').removeAttr('disable');
                    $('#submit').html('Update Data');
                },

                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.namabelakang) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.namabelakang);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }

                        if (response.error.alamat) {
                            $('#al').addClass('is-invalid');
                            $('#erroral').html(response.error.alamat);
                        } else {
                            $('#al').removeClass('is-invalid');
                            $('#erroral').html('');
                        }

                        if (response.error.tempatlahir) {
                            $('#tl').addClass('is-invalid');
                            $('#errortl').html(response.error.tempatlahir);
                        } else {
                            $('#tl').removeClass('is-invalid');
                            $('#errortl').html('');
                        }

                        if (response.error.email) {
                            $('#em').addClass('is-invalid');
                            $('#errorem').html(response.error.email);
                        } else {
                            $('#em').removeClass('is-invalid');
                            $('#errorem').html('');
                        }

                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#errorus').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#errorus').html('');
                        }

                        if (response.error.password) {
                            $('#pass').addClass('is-invalid');
                            $('#errorps').html(response.error.password);
                        } else {
                            $('#pass').removeClass('is-invalid');
                            $('#errorps').html('');
                        }

                        if (response.error.password_confirm) {
                            $('#pass_confirm').addClass('is-invalid');
                            $('#errorpsc').html(response.error.password_confirm);
                        } else {
                            $('#pass_confirm').removeClass('is-invalid');
                            $('#errorpsc').html('');
                        }

                        if (response.error.telepon) {
                            $('#tel').addClass('is-invalid');
                            $('#errortel').html(response.error.telepon);
                        } else {
                            $('#tel').removeClass('is-invalid');
                            $('#errortel').html('');
                        }

                        if (response.error.avatar) {
                            $('#ava').addClass('is-invalid');
                            $('#errorava').html(response.error.avatar);
                        } else {
                            $('#ava').removeClass('is-invalid');
                            $('#errorava').html('');
                        }
                    } else {
                        var respon = JSON.parse(response);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        $('#editmodal').modal('hide');
                        tampilkan();
                    }
                },
            })
        })
        });
</script>