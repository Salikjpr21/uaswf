<a href="#" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Peminjaman</a>

<table id="datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Lab</th>
            <th>Nama Peminjam</th>
            <th>Awal Pinjam</th>
            <th>Akhir Pinjam</th>
            <th>Verifikasi Admin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['jenis_lab'] ?></td>
                <td><?= $item['nama_peminjam'] ?></td>
                <td><?= $item['awal_pinjam'] ?></td>
                <td><?= $item['akhir_pinjam'] ?></td>
                <td> <?php 
                                    if($item['verif']  == 'true')
                                    {
                                        echo('Sudah Diverifikasi Admin');
                                    } else
                                    {
                                        echo('Belum Diverifikasi Admin');
                                    }
                                        ?></td>
                <td>
                    <a href="jadwal/<?= $item['id'] ?>" class="btn btn-info">Detail</a>
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
            url: "<?= base_url('/admin/jadwal/form') ?>",
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
            url: "<?= base_url('/admin/jadwal/form') ?>/" + id,
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
        title:'Hapus Data',
        text: "Apakah Anda yakin akan menghapus data dengan ID="+id+"?",
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
                url: "<?= base_url('/admin/jadwal') ?>" +"/"+id,
                success: function(response) {
                    var respon = JSON.parse(response);
                    Swal.fire({
                        title: 'Berhasil!',
                        text: respon.sukses,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    tampilData();
                }
            });
        }
    });
}
</script>
