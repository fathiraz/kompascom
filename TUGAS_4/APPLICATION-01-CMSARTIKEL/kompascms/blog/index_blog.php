<?php
session_start();
// deteksi kalo session udah keisi maka di redirect ke halaman admin nya
// deteksi di lakukan dengan cara mengecek apakah session sudah terisi apa belum
// jika sudah terisi maka kita tahu bahwa sudah login, jika belum maka tampilkan apa adanya tidak di redirect
if (isset($_SESSION['sesi'])) {
    echo "<meta http-equiv='refresh' content='0; url=admin/index.php'>";
}
?>
<div class="col-sm-9">
    <div class="col-sm-1"></div>
    <div class="col-sm-8">
        <?php
        include "include/koneksi.php";

        // kalo belom ada halaman maka di set menjadi kosong
        $hal = isset($_GET['hal']) ? $_GET['hal'] : "";

        // tentuin per halaman berapa record
        $perHal = 5;

        // nentuin batas per halaman
        $batas = $perHal;
        $batas = ($hal * 2) + $perHal;

        // nentuin jumlah recordnya berdasarkan query
        $query_jumlah_record_post = mysql_query("SELECT COUNT(*) as total FROM post");
        // ambil jumlah record dari database
        $jumlah_record_post = mysql_fetch_array($query_jumlah_record_post);
        // bagi jumlah record dengan jumlah perhalamannya
        $jumlah_halaman = ceil($jumlah_record_post['total'] / $perHal);

        // ngecek kalo halaman pertama atau kosong maka recordnya tampil 1-batas
        if ($hal == "") {
            $awal = 0;
            $sebelumnya = "";
            $setelahnya = " <div class='pull-right'>
                    <a href='?hal=" . ($hal + 2) . "' class='btn btn-danger'>SETELAH<span class='glyphicon glyphicon-chevron-right'></span></a>
                    </div>";
        } else if ($hal == 1) {
            $awal = 0;
            $sebelumnya = "";
            $setelahnya = " <div class='pull-right'>
                    <a href='?hal=" . ($hal + 1) . "' class='btn btn-danger'>SETELAH<span class='glyphicon glyphicon-chevron-right'></span></a>
                    </div>";
        } else if ($hal == $jumlah_halaman) {
            $awal = ($hal * $perHal) - $perHal;
            $sebelumnya = "<div class='pull-left'>
                    <a href='?hal=" . ($hal - 1) . "' class='btn btn-danger'><span class='glyphicon glyphicon-chevron-left'></span>SEBELUM</a>
                    </div>";
            $setelahnya = "";
        } else {
            $awal = ($hal * $perHal) - $perHal;
            $sebelumnya = "<div class='pull-left'>
                    <a href='?hal=" . ($hal - 1) . "' class='btn btn-danger'><span class='glyphicon glyphicon-chevron-left'></span>SEBELUM</a>
                    </div>";
            $setelahnya = "<div class='pull-right'>
                    <a href='?hal=" . ($hal + 1) . "' class='btn btn-danger'>SETELAH<span class='glyphicon glyphicon-chevron-right'></span></a>
                    </div>";
        }

        $querytampilblog = "SELECT * FROM post ORDER BY updated DESC LIMIT $awal, $perHal";
        $eksequerytampilblog = mysql_query($querytampilblog);
        while ($hasilblog = mysql_fetch_array($eksequerytampilblog)) {
            echo "<div><h2><strong><a href='?page=lihat_blog&id=$hasilblog[id]'>" . $hasilblog['judul'] . "</a></strong></h2></div>";
            echo "<div><i>$hasilblog[updated]</i></div>";
            echo "<br><div>" . substr($hasilblog['isi'], 0, 50) . "...</div><br>";
            echo "<div><a class='btn btn-primary' href='?page=lihat_blog&id=$hasilblog[id]'>Baca artikel <span class='glyphicon glyphicon-chevron-right'></span> </a></div>";
            echo "<br><br><hr>";
        }
        ?>
    </div>
    <div class="col-sm-3"></div>
</div>
<div class="col-sm-3">
    <div>
        <h4><strong>Postingan terakhir</strong></h4>
        <?php
        $querytampilterakhir = "SELECT * FROM post ORDER BY updated DESC LIMIT 0, 3";
        $eksequerytampilterakhir = mysql_query($querytampilterakhir);
        while ($hasilterakhir = mysql_fetch_array($eksequerytampilterakhir)) {
            echo "<div><a href='?page=lihat_blog&id=$hasilterakhir[id]'>" . $hasilterakhir['judul'] . "</a> <span class='glyphicon glyphicon-chevron-right'></span></div>";
            echo "<div><i>$hasilterakhir[updated]</i></div>";
            echo "<hr>";
        }
        ?>
    </div>
    <div>
        <h4><strong>Postingan terpopuler</strong></h4>

        <?php
        $querytampilpopuler = "SELECT * FROM post ORDER BY diakses DESC LIMIT 0, 3";
        $eksequerytampilpopuler = mysql_query($querytampilpopuler);
        while ($hasilpopuler = mysql_fetch_array($eksequerytampilpopuler)) {
            echo "<div><p class='bg-info'>$hasilpopuler[diakses] hits</p></div>";
            echo "<div><a href='?page=lihat_blog&id=$hasilpopuler[id]'>" . $hasilpopuler['judul'] . "</a> <span class='glyphicon glyphicon-chevron-right'></span></div>";
            echo "<div><i>$hasilpopuler[updated]</i></div>";
            echo "<hr>";
        }
        ?>

    </div>
    <div>
        <h4><strong>Kategori</strong></h4>

        <?php
        $querykategori = "SELECT * FROM kategori";
        $eksequerykategori = mysql_query($querykategori);
        while ($hasilkategori = mysql_fetch_array($eksequerykategori)) {
            echo "<div><a class='btn btn-default' href='?page=kategori_blog&kategori=" . $hasilkategori['kategori'] . "'>" . $hasilkategori['kategori'] . "</a></div><br>";
        }
        ?>

    </div>
</div>
<div class="col-sm-12">
    <div class="col-sm-2">
        <?php
        echo $sebelumnya;
        ?>
    </div>
    <div class="col-sm-8"></div>
    <div class="col-sm-2">
        <?php
        echo $setelahnya;
        ?>
    </div>
</div>