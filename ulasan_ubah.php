<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <!-- menyimpan data ke database -->
                <form action="" method="POST">
                    <?php
                        $id=$_GET['id']; 
                        if(isset($_POST['submit'])) {
                            $id_buku = $_POST["id_buku"];
                            $id_user = $_SESSION['user']['id_user'];
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];
                            $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku', ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id");                            
                            if($query) {
                                echo '<script>alert("Ubah data berhasil"); </script>';
                            } else {
                                echo '<script> alert("Ubah data gagal");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <!-- menampilkan nama kategori -->
                    <div class="row">
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <!-- <input type="text" class="form-control" name="kategori"> -->
                                 <select name="id_buku" class="form-control">
                                    <?php 
                                        $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                        while ($buku = mysqli_fetch_array($buk)) :
                                    ?>
                                    <option <?php if($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value="<?= $buku['id_buku']; ?>">
                                        <?= $buku['judul']; ?>
                                    </option>
                                    <?php endwhile; ?>    
                                 </select>
                            </div>
                        </div>
                        <!-- menampilkan judul buku -->
                        <div class="row mb-3">
                            <div class="col-md-2">Ulasan</div>
                            <div class="col-md-8">
                                <textarea name="ulasan" rows="5" class="form-control"><?= $data['ulasan']; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Rating</div>
                            <div class="col-md-8">
                            <select name="rating" id="">
                                <?php 
                                    for($i = 1; $i<=10; $i++) :
                                ?>
                                    <option <?php if($data['id_buku'] == $i) echo 'selected' ?>><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <!-- button submit -->
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                                            
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>