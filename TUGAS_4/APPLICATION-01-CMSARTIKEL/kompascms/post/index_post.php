<div class="col-sm-8">
    <div>
        <h1>Daftar Post</h1><br>
    </div>
    <div align="right">
        <a class='btn btn-info' href="?page=input_post">Tambah post</a>
    </div>
    <?php
    include "../include/koneksi.php";

    $hal = isset($_GET['hal']) ? $_GET['hal'] : "";

    // tentuin per halaman berapa record
    $perHal = 10;

    // nentuin batas per halaman
    $batas = $perHal;
    $batas = ($hal * 2) + $perHal;
    ?>
    <div class="table-responsive">
        <br>
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal publikasi</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            </thead>
            <tbody>

            <?php

            // ngecek kalo halaman pertama atau kosong maka recordnya tampil 1-batas
            if ($hal == "" || $hal == 1) {
                $awal = 0;
            } else {
                $awal = ($hal * $perHal) - $perHal;
            }

            // tampilin hasil sesuai get halaman
            $query = mysql_query("SELECT * FROM post ORDER BY updated DESC LIMIT $awal, $perHal");
            while ($hasil = mysql_fetch_array($query)) {
                echo "<tr>";
                echo "<td><a href='?page=edit_post&id=$hasil[id]'>$hasil[judul]</a>
    </td>";
                echo "<td>$hasil[updated]</td>";
                echo "<td><a href='?page=edit_post&id=$hasil[id]' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a></td>";
                echo "<td><a href='?page=hapus_post&id=$hasil[id]' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a></td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </div>

    <div align="center">
        <?php

        // menghitung dulu record yang ada di database
        $query_jumlah_record_post = mysql_query("SELECT COUNT(*) as total FROM post");
        $jumlah_record_post = mysql_fetch_array($query_jumlah_record_post);
        $jumlah_halaman = ceil($jumlah_record_post['total'] / $perHal);

        // ngecek kalo halaman pertama atau kosong maka recordnya tampil 1-batas
        if ($hal == "") {
            $awal = 0;
            $sebelumnya = "<li class='disabled'><a>&laquo;</a></li>";
            $setelahnya = "<li><a href='?page=post&hal=" . ($hal + 1) . "'>&raquo;</a></li>";
        } else if ($hal == 1) {
            $awal = 0;
            $sebelumnya = "<li class='disabled'><a>&laquo;</a></li>";
            $setelahnya = "<li><a href='?page=post&hal=" . ($hal + 1) . "'>&raquo;</a></li>";
        } else if ($hal == $jumlah_halaman) {
            $awal = ($hal * $perHal) - $perHal;
            $sebelumnya = "<li><a href='?page=post&hal=" . ($hal - 1) . "'>&laquo;</a></li>";
            $setelahnya = "<li class='disabled'><a>&raquo;</a></li>";
        } else {
            $awal = ($hal * $perHal) - $perHal;
            $sebelumnya = "<li><a href='?page=post&hal=" . ($hal - 1) . "'>&laquo;</a></li>";
            $setelahnya = "<li><a href='?page=post&hal=" . ($hal + 1) . "'>&raquo;</a></li>";
        }

        // ceil digunakan untuk membulatkan
        echo "<ul class='pagination'>";
        echo $sebelumnya;
        // perulangan buat ngasih pagination
        for ($i = 1; $i <= $jumlah_halaman; $i++) {
            if ($i == $hal) {
                echo "<li class='active'><a href='?page=post&hal=$i'>$i</a></li>";
            } else {
                echo "<li><a href='?page=post&hal=$i'>$i</a></li>";
            }
        }
        echo $setelahnya;
        ?>
        </ul>
    </div>

</div>
<div class="col-sm-4">
</div>