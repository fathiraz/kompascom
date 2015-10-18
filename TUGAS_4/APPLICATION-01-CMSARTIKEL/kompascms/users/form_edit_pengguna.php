<?php
include "../include/koneksi.php";
$query_daftar_pengguna = mysql_query("SELECT * FROM pengguna WHERE id=" . $_GET['id']);
while ($daftar_pengguna = mysql_fetch_array($query_daftar_pengguna)) {
    $nama = $daftar_pengguna['nama'];
    $username = $daftar_pengguna['username'];
    $password = $daftar_pengguna['password'];
    $konfirmasipassword = "";
    echo "
<div class='col-sm-6'>
<div>
  <h1>Edit Pengguna</h1><br>
</div>
<br>
<form action='../users/cek_form_edit_pengguna.php' class='form-horizontal' role='form' method='POST'>
  <input type='hidden' name='id' value='" . $_GET['id'] . "'>
  <div class='form-group'>
    <label for='nama' class='col-sm-3 control-label'>Nama</label>
    <div class='col-sm-9'>
      <input type='text' name='nama' class='form-control' placeholder='Nama' value='$nama' required>
    </div>
  </div>
  <div class='form-group'>
    <label for='username' class='col-sm-3 control-label'>Username</label>
    <div class='col-sm-9'>
      <input type='text' name='user' class='form-control' placeholder='Username' value='$username' required>
    </div>
  </div>
  <div class='form-group'>
    <label for='password' class='col-sm-3 control-label'>Password</label>
    <div class='col-sm-9'>
      <input type='password' name='pass' class='form-control' placeholder='Password' value='' required>
    </div>
  </div>
  <div class='form-group'>
    <label for='konfirmasipassword' class='col-sm-3 control-label'>Konfirmasi Password</label>
    <div class='col-sm-9'>
      <input type='password' name='konfirmasipass' class='form-control' placeholder='Konfirmasi Password' value='' required>
  </div>
  </div>
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <input type='submit' name='submit' value='edit' class='btn btn-primary'></button>
      <a href='../admin' class='btn btn-default'>Kembali</a>
    </div>
  </div>
</form>
</div>
<div class='col-sm-6'>
</div>
";
}
?>