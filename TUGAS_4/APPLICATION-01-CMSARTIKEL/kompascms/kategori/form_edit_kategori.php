<?php
include "../include/koneksi.php";
$query_daftar_kategori = mysql_query("SELECT * FROM kategori WHERE id=" . $_GET['id']);
while ($daftar_kategori = mysql_fetch_array($query_daftar_kategori)) {
  echo "<div class='col-sm-6'>
<div>
  <h1>Edit Kategori</h1><br>
</div>
<div align='right'>
  <a class='btn btn-info' href='?page=kategori'>Lihat kategori</a>
</div>
<br>
<form action='../kategori/cek_form_edit_kategori.php' class='form-horizontal' role='form' method='POST'>
<input type='hidden' name='id' value='" . $_GET['id'] . "'>
  <div class='form-group'>
    <label for='kategori' class='col-sm-3 control-label'>Kategori</label>
    <div class='col-sm-9'>
      <input type='text' name='kategori' class='form-control' placeholder='Kategori' value='$daftar_kategori[kategori]' required>
    </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <input type='submit' name='submit' class='btn btn-primary'></button>
    </div>
  </div>
</form>
</div>
<div class='col-sm-6'>
</div>";
}
?>