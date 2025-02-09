<h1 class="mt-4">Daftar Buku</h1>
<div class="row">
    <div class="col-md-12">
        <?php 
        if ($_SESSION['user']['level'] !='peminjam') :
        ?>
            <a href="?page=buku_tambah" class="btn btn-primary">Tambah Data</a>
        <?php endif;?>
        <!-- tabel list buku -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>ISBN</th>
                <th>Jumlah</th>                
                <th>Sinopsis</th>
                <?php 
                if ($_SESSION['user']['level'] !='peminjam') :
                ?>
                <th>Aksi</th>
                <?php endif; ?>
            </tr>
            <?php 
                $i=1;
                $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                while ($data = mysqli_fetch_array($query)) :
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['kategori']; ?></td>
                <td><img src="upload/<?= $data['gambar']; ?>" width="80px" alt=""></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['penulis']; ?></td>
                <td><?= $data['penerbit']; ?></td>
                <td><?= $data['tahun_terbit']; ?></td>
                <td><?= $data['isbn']; ?></td>
                <td><?= $data['jumlah']; ?></td>
                <td><?= $data['sinopsis']; ?></td>
                <?php 
                if ($_SESSION['user']['level'] !='peminjam') :
                ?>
                <td>
                    <a href="?page=buku_ubah&&id=<?= $data['id_buku']?>" class="btn btn-info">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin menghapus data ini')" href="?page=buku_hapus&&id=<?= $data['id_buku']?>" class="btn btn-danger">Hapus</a>
                </td>
                <?php endif; ?>
            </tr>

            <?php endwhile; ?>            
            
        </table>
    </div>
</div>