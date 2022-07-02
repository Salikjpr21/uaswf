<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <metacharset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>LAB PTIK</title>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <form method="post" action="/daftar" id="forms">
                                        <!-- <form action="daftar" method="post" id="form" enctype="multipart/form-data"> -->
                                        <?= csrf_field(); ?>
                                        <h3 class="mb-5 text-uppercase">Student registration form</h3>

                                        <div class="row">
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="nama" name="nama" class="form-control form-control-lg" />
                                                    <div class="invalid-feedback" id="errorname"></div>
                                                    <label class="form-label" for="nama">Nama Lengkap</label>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="alamat" name="alamat" class="form-control form-control-lg" />
                                                    <div class="invalid-feedback" id="erroralamat"></div>
                                                    <label class="form-label" for="alamat">Alamat</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                                    <div class="invalid-feedback" id="erroremail"></div>
                                                    <label class="form-label" for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Jenis Kelamin: </h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" />
                                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" />
                                                <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label class="form-label" for="civitas">Civitas </label>
                                                <select class="select" name="civitas">
                                                    <option value="UNS">UNS</option>
                                                    <option value="NON-UNS">Non-UNS</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                            <div class="invalid-feedback" id="errorusername"></div>
                                            <label class="form-label" for="username">Username</label>
                                        </div>

                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <div class="invalid-feedback" id="errorpassword"></div>
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control" id="repassword" name="repassword">
                                            <div class="invalid-feedback" id="errorrepassword"></div>
                                            <label for="password" class="col-sm-2 col-form-label">Re-password</label>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="avatar" class="col-sm-2 col-form-label">Profil</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control form-control-sm" id="avatar" name="avatar">
                                                <div class="invalid-feedback" id="erroravatar"></div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            <a href='<?= base_url('/') ?>' class="btn btn-light btn-lg">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#forms').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.error) {
                                if (response.error.nama) {
                                    $('#nama').addClass('is-invalid');
                                    $('#errornama').html(response.error.nama);
                                } else {
                                    $('#nama').removeClass('is-invalid');
                                    $('#errornama').html('');
                                }

                                if (response.error.username) {
                                    $('#username').addClass('is-invalid');
                                    $('#errorusername').html(response.error.username);
                                } else {
                                    $('#username').removeClass('is-invalid');
                                    $('#errorusername').html('');
                                }

                                if (response.error.alamat) {
                                    $('#alamat').addClass('is-invalid');
                                    $('#erroralamat').html(response.error.alamat);
                                } else {
                                    $('#alamat').removeClass('is-invalid');
                                    $('#alamat').html('');
                                }

                                if (response.error.email) {
                                    $('#email').addClass('is-invalid');
                                    $('#erroremail').html(response.error.email);
                                } else {
                                    $('#email').removeClass('is-invalid');
                                    $('#erroremail').html('');
                                }

                                if (response.error.password) {
                                    $('#password').addClass('is-invalid');
                                    $('#errorpassword').html(response.error.password);
                                } else {
                                    $('#password').removeClass('is-invalid');
                                    $('#errorpassword').html('');
                                }

                                if (response.error.repassword) {
                                    $('#repassword').addClass('is-invalid');
                                    $('#errorrepassword').html(response.error.repassword);
                                } else {
                                    $('#repassword').removeClass('is-invalid');
                                    $('#errorrepassword').html('');
                                }

                                if (response.error.avatar) {
                                    $('#avatar').addClass('is-invalid');
                                    $('#erroravatar').html(response.error.avatar);
                                } else {
                                    $('#avatar').removeClass('is-invalid');
                                    $('#erroravatar').html('');
                                }
                            } else {
                                // session()->setFlashdata('pesan', 'Data diri anda berhasil ditambahkan');
                                window.location.href = '/masuk';

                            }
                        }
                    });
                });
            });
        </script>
    </section>
</body>

</html>