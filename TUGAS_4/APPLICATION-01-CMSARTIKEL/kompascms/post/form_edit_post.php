<?php
include "../include/koneksi.php";
$query_edit_post = mysql_query("SELECT * FROM post WHERE id=" . $_GET['id']);

if ($hasil_edit_post = mysql_fetch_array($query_edit_post)) {

    echo "<div class='col-sm-8'>
<div>
  <h1>Edit Post</h1><br>
</div>
<div align='right'>
  <a class='btn btn-info' href='?page=post'>Lihat post</a>
</div>
<br>
<form action='../post/cek_form_edit_post.php' class='form-horizontal' role='form' method='POST'>
<input type='hidden' name='id' value='" . $_GET['id'] . "'>
  <div class='form-group'>
    <label for='judul' class='col-sm-2 control-label'>Judul</label>
    <div class='col-sm-10'>
      <input type='text' name='judul' class='form-control' placeholder='Judul' required value='$hasil_edit_post[judul]'>
    </div>
  </div>


  <div class='form-group'>
    <label for='kategori' class='col-sm-2 control-label'>Kategori</label>
    <div class='col-sm-7'>
      <select name='kategori' tabindex='1' class='form-control'>";

    $querykategori = (mysql_query("SELECT * FROM kategori"));
    while ($kat = mysql_fetch_array($querykategori)) {
        if ($kat['kategori'] == $hasil_edit_post['kategori']) {
            echo "<option value='" . $kat['kategori'] . "' selected>" . $kat['kategori'] . "</option>";
        } else {
            echo "<option value='" . $kat['kategori'] . "'>" . $kat['kategori'] . "</option>";
        }
    }

    echo "</select>
    </div>
    <div class='col-sm-3' align='center'>
      <a class='btn btn-info' href='?page=input_kategori'>Tambah kategori</a>
    </div>
  </div>


  <div class='form-group'>
    <label for='Isi' class='col-sm-2 control-label'>Isi</label>
    <div class='col-sm-10'>
      <textarea class='ckeditor' cols='10' rows='40' name='isi'>$hasil_edit_post[isi]</textarea>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <input type='submit' name='submit' value='edit' class='btn btn-primary'></button>
    </div>
  </div>
</form>
</div>
<div class='col-sm-4'>
</div>";
}
?>