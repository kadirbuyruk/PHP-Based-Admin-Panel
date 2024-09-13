<?php
    session_start();
    include ("ayar.php");
    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stil.css"/>
    <title>Yönetim Paneli Ana Sayfa</title>
</head>
<body>
<h2 style="text-align:center;"> Menüden Seçim Yapınız  </h2>

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
    </div>
    <span class="sitelink">Siteye gitmek için
  <span  > <a target="_blank" class="tıkla" href="http://localhost/muhammet/index.php">tıklayınız</a></span> </span>
  <br><br><br>


</body>
</html>