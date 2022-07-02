<?php echo $this->extend('template/layout'); ?>

<?php echo $this->section('kontainer'); ?>
<!--Main layout-->
<main style="margin-top: 58px">
    <div class="container pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Hello, <?= $nama ?> !</strong></h5>
                </div>
                <div class="card-body">
                    <h1>Tambah Peminjaman</h1>
                    <form action="insert" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        Jenis Lab : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenislab" id="flexRadioDefault1" value="multimedia" checked />
                        <label class="form-check-label" for="flexRadioDefault1"> Multimedia Studio </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenislab" id="flexRadioDefault2" value="jaringan" />
                        <label class="form-check-label" for="flexRadioDefault2"> Computer Network and Instrumentation </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="jenislab" id="flexRadioDefault3" value="rpl" />
                        <label class="form-check-label" for="flexRadioDefault3"> Software Engineering </label>
                    </div>
                    <div></div>
                    <div class=" mb-4">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Aji Santoso" class="form-control" />
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                        <label class="form-label" for="awal_pinjam">Awal Pinjam</label>
                            <input type="datetime-local" id="awal_pinjam" name="awal_pinjam" class="form-control" />
                        </div>
                        <div class="col">
                            <label class="form-label" for="akhir_pinjam">Akhir Pinjam</label>
                            <input type="datetime-local" id="akhir_pinjam" name="akhir_pinjam" class="form-control" />
                        </div>
                    </div>
                    
                    Civitas : <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault1" value="uns" checked />
                        <label class="form-check-label" for="flexRadioDefault1"> UNS </label>
                    </div>

                    <div class="form-check form-check-inline mb-4 mx-3">
                        <input class="form-check-input" type="radio" name="civitas" id="flexRadioDefault2" value="non" />
                        <label class="form-check-label" for="flexRadioDefault2"> Non-UNS </label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-4">Tambah Data</button>
                    </form>
                </div>

            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
</main>

<?php echo $this->endSection();
?>