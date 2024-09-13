<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }
    if($_POST){
        $aciklama = $_POST["aciklama"];
        $resim1 = $_FILES["resim"]["name"];
        move_uploaded_file($_FILES["resim"]["tmp_name"], $resim1);
        $sorgu = $baglan->query("insert into resimyukleme (aciklama,resim) values ('$aciklama','../$resim1')");
                if ($sorgu){
                    echo 'Dosya başarıyla yüklendi.';
                }
    else{
                    echo 'Kayıt sırasında bir sorun oluştu!';
                }
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
     <br><br><br><br>
     <br><br><br><br>
     
    <form action="profil.php" method="post" name="resimyukle" enctype="multipart/form-data"> 
     <br><br><br><br>
Profil Fotoğrafınız:<input  type="file" name="resim"/><br/> <br><br>
<textarea style="width:500px ; height:100px ;" type="text" name="aciklama"></textarea><br/>
<input  type="submit" name="gonder" value="Kaydet"/>
</form>

</body>
</html>
