<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }
    $islem= isset($_GET['islem']) ? $_GET['islem'] : '';
   // $islem = $_GET["islem"];

    if ($islem == "sil") {
        $id = $_GET["id"];
        $sorgu = $baglan->query("DELETE FROM anasayfa where (id='$id')");
        /*echo "<script> window.location.href='anasayfa.php'; </script>";*/
    }

    if ($islem == "ekle") {
        $baslik = $_POST["baslik"];
        $resim = "img/".$_FILES["resim"]["name"];
        move_uploaded_file($_FILES["resim"]["tmp_name"], $resim);
        $sorgu = $baglan->query("insert into anasayfa (baslik,resim) values ('$baslik','../$resim')");
        echo "<script> window.location.href='anasayfa.php'; </script>";
    }

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
<link rel="stylesheet" href="stil.css"/>
    <title>Yönetim Paneli ANASAYFA</title>
</head>
<body  style="text-align:center;">
 <h1>Yönetim Paneli</h1>
 <br>
    <div style="text-align:center;" class="menu" >
    <ul>
<li><a href="giris.php">GİRİŞ</a></li>
<li> <a href="anasayfa.php">ANASAYFA</a></li>
<li><a href="hakkimizda.php">HAKKIMDA</a></li>
<li> <a href="projeler.php">PROJELER</a></li>
<li> <a href="linkler.php">LİNKLER</a></li>
<li> <a href="mesajlar.php">MESAJLAR</a></li>
<li> <a href="profil.php">PROFİL</a></li>



<li> <a href="cikis.php" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin misiniz?')) return false;">ÇIKIŞ</a></li>
    </ul>
     
    </div>
    <br><br><br>
    <table width="100%" border="1">
        <tr class="baslıklar" align="center">
            <th>Sıra No</th>
            <th>Sil</th>
        </tr>
        <?php
            $sirano= 0;
            $sorgu = $baglan->query("select * from anasayfa");
            while ($satir = $sorgu->fetch_object()) {
                $sirano++;
                echo "<tr align='center'>
                <td>$sirano</td>
                <td><a href='anasayfa.php?islem=sil&id=$satir->id'>Sil</td>
                </tr>";
            }
        ?>
    </table>
    <br><br>
    <form action="anasayfa.php?islem=ekle" enctype="multipart/form-data" method="post">
        <b>Başlık:</b><input type="text" size="20" name="baslik"> 
        <b>Resim:</b><input type="file" name="resim"> 
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>
