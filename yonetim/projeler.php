<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }

    if ($_POST) {
        $aciklama = $_POST["aciklama"];
        $sorgu = $baglan->query("delete from projeler");
        $sorgu = $baglan->query("insert into projeler (aciklama) values ('$aciklama')");
        echo "<script> window.location.href='projeler.php'; </script>";
    }

    $sorgu = $baglan->query("select * from projeler");
    $satir = $sorgu->fetch_object();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stil.css"/>
    <title>Yönetim Paneli Projelerimiz</title>
</head>
<body style="text-align:center;">
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
    <form action="" method="post">
        <b>İçerik:</b> <br><br>
        <textarea style="width:80%;height:300px;" name="aciklama"><?php echo $satir->aciklama; ?></textarea><br><br>
        <input type="submit" value="Kaydet">
    </form>

    

</body>
</html>