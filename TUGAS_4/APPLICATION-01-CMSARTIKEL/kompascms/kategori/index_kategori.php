<div class="col-sm-6">
  <div>
    <h1>Daftar Kategori</h1><br>
  </div>
  <div align="right">
    <a class='btn btn-info' href="?page=input_kategori">Tambah kategori</a>
  </div>
      <div class="table-responsive">
      <br>
        <table class="table table-hover table-striped center">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php
include "../include/koneksi.php";
$query_daftar_kategori = mysql_query("SELECT * FROM kategori");
$nomer = 1;
while ($daftar_kategori = mysql_fetch_array($query_daftar_kategori)) {
    echo "<tr>";
    echo "<td>" . $nomer++ . "</td>";
    echo "<td>" . $daftar_kategori['kategori'] . "</td>";
    echo "<td><a href='?page=edit_kategori&id=$daftar_kategori[id]' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a></td>";
    echo "<td><a href='?page=hapus_kategori&id=$daftar_kategori[id]' class='btn btn-danger'><span class='glyphicon glyphicon-edit'></span></a></td>";
    echo "</tr>";
}
?>
          </tbody>
        </table>
      </div>
</div>
<div class="col-sm-6">
</div>