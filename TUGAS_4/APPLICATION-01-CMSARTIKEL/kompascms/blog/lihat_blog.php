<div class="col-sm-9">
    <div class="col-sm-1"></div>
    <div class="col-sm-8">
        <?php
        include "include/koneksi.php";

        $querytampilblog = "SELECT * FROM post WHERE id=" . $_GET['id'];
        $eksequerytampilblog = mysql_query($querytampilblog);

        while ($hasilblog = mysql_fetch_array($eksequerytampilblog)) {
            echo "<div><h2><strong>" . $hasilblog['judul'] . "</strong></h2></div>";
            echo "<div><i>$hasilblog[updated]</i></div>";
            echo "<br><div>" . $hasilblog['isi'] . "...</div><br>";
            echo "<br><br><hr>";
            $diakses = $hasilblog['diakses'];
            $jam = $hasilblog['updated'];
        }

        // buat update viewsnya
        $queryupdateakses = "UPDATE post SET diakses=" . ($diakses + 1) . ", updated='$jam' WHERE id=" . $_GET['id'];
        $eksequeryupdateakses = mysql_query($queryupdateakses);
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