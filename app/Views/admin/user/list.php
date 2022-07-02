<a href="#" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Anggota</a>

<table id="datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Username</th>
            <th>Email</th>
            <th>Civitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><img src="/images/avatar/<?= $item['avatar'] ?>" alt="" width="100px"></td>
                <td><?= $item['username'] ?></td>
                <td><?= $item['email'] ?></td>
                <td> <?php
                        if ($item['civitas']  == 'non') {
                            echo ('NON-UNS');
                        } else {
                            echo ('UNS');
                        }
                        ?></td>
                <td>
                    <a href="user/<?= $item['id'] ?>" class="btn btn-info">Detail</a>
                    <a href="#" id="edit" onclick="edit(<?= $item['id'] ?>)" class="btn btn-warning">Edit</a>
                    <a href="#" id="hapus" onclick="hapus(<?= $item['id'] ?>)" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $('#tambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('/admin/user/form') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#anggotamodal').modal('show');
            }
        });
    });

    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<script>
    function edit(id) {
        $.ajax({
            url: "<?= base_url('/admin/user/form') ?>/" + id,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#editmodal').modal('show');
            }
        });
    };
</script>

<script>
    function hapus(id) {
        Swal.fire({
            title: 'Hapus Data',
            text: "Apakah Anda yakin akan menghapus data dengan ID=" + id + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('/admin/user') ?>" + "/" + id,
                    success: function(response) {
                        var respon = JSON.parse(response);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: respon.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                        tampilkan();
                    }
                });
            }
        });
    }
</script>