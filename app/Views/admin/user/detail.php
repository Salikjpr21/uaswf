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
                    <h1>Biodata <?= $item['username'] ?></h1>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td> <?= $item['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td> <?= $item['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td> <?= $item['tempat_lahir'] . '/' . $item['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <?= $item['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td> <?= $item['telepon'] ?></td>
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
                                    <td>Terdaftar Sejak</td>
                                    <td> <?= $item['created_at'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-8 offset-md-2 ">
                                    <img src="/images/avatar/<?= $item['avatar'] ?>" alt="" width="100%">
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