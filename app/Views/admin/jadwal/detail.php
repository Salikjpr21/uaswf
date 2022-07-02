<?= $this->extend('template/layout'); ?>

<?= $this->section('kontainer'); ?>
<main style="margin-top: 58px">
    <div class="container-fluid pt-4">
        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Hello, <?= $nama ?> !</strong></h5>
                </div>
                <div class="card-body">
                    <h1>peminjaman <?= $item['id'] ?></h1>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Jenis Lab</td>
                                    <td> <?= $item['jenis_lab'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Peminjam</td>
                                    <td> <?= $item['nama_peminjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Civitas</td>
                                    <td> <?php 
                                    if($item['civitas']  == 'uns')
                                    {
                                        echo('UNS');
                                    } else
                                    {
                                        echo('NON-UNS');
                                    }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Awal Pinjam</td>
                                    <td> <?= $item['awal_pinjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Akhir Pinjam</td>
                                    <td> <?= $item['akhir_pinjam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Verifikasi Admin</td>
                                    <td> <?php 
                                    if($item['verif']  == 'false')
                                    {
                                        echo('Belum Diverikasi');
                                    } else
                                    {
                                        echo('Sudah Diverifikasi');
                                    }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Terdaftar Sejak</td>
                                    <td> <?= $item['created_at'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 ">
                                    Bukti Pembayaran :
                                    <br>
                                    <img src="/images/bukti/<?= $item['bukti'] ?>" alt="" width="100%">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- Section: Main chart -->

    </div>
</main>

<?= $this->endSection(); ?>