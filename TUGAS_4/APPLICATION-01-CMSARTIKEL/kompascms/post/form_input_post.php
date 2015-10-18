<div class="col-sm-8">
    <div>
        <h1>Tambah Post</h1><br>
    </div>
    <div align='right'>
        <a class='btn btn-info' href='?page=post'>Lihat post</a>
    </div>
    <br>

    <form action="../post/cek_form_input_post.php" class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul</label>

            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
            </div>
        </div>


        <div class="form-group">
            <label for="kategori" class="col-sm-2 control-label">Kategori</label>

            <div class="col-sm-7">
                <select name="kategori" tabindex="1" class="form-control">
                    <option value="">Pilih salah satu kategori</option>
                    <?php
                    include "../include/koneksi.php";
                    $query_daftar_kategori = mysql_query("SELECT * FROM kategori");
                    while ($daftar_kategori = mysql_fetch_array($query_daftar_kategori)) {
                        echo "<option value='" . $daftar_kategori['kategori'] . "'>" . $daftar_kategori['kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-3" align="center">
                <a class="btn btn-info" href="?page=input_kategori">Tambah kategori</a>
            </div>
        </div>


        <div class="form-group">
            <label for="Isi" class="col-sm-2 control-label">Isi</label>

            <div class="col-sm-10">
                <textarea class="ckeditor" cols="10" rows="40" name="isi"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value='post' class="btn btn-primary"></button>
            </div>
        </div>
    </form>
</div>
<div class="col-sm-4">
</div>