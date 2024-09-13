<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");
    }

    if ($_POST) {
        $link1 = $_POST["link1"];
        $link2 = $_POST["link2"];
        $link3 = $_POST["link3"];
        $link4 = $_POST["link4"];
        $sorgu = $baglan->query("delete from linkler");
        $sorgu = $baglan->query("insert into linkler (link1,link2,link3,link4) VALUES ('".$link1."','".$link2."','".$link3."','".$link4."')");
        echo "<script> window.location.href='linkler.php'; </script>";
    }
    $sorgu = $baglan->query("select * from linkler");
    $satir = $sorgu->fetch_object();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stil.css"/>
    <title>Yönetim Paneli Hakkımızda</title>
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
    
        <?php
error_reporting(0);
?>
    <form action="" method="post">
        <b>facebook:</b><br>
        <input value="https://" style="width:20%;height:20px;" name="link1"><?php echo $satir1->link1; ?></input><br><br>
        <b>instagram:</b><br>
        <input value="https://" style="width:20%;height:20px;" name="link2"><?php echo $satir2->link2; ?></input><br><br>
        <b>linked-in:</b><br>
        <input value="https://" style="width:20%;height:20px;" name="link3"><?php echo $satir3->link3; ?></input><br><br>
        <b>Github:</b><br>
        <input value="https://" style="width:20%;height:20px;" name="link4"><?php echo $satir4->$link4; ?></input><br><br>
        <input type="submit" value="Kaydet">
    </form>

    

</body>
</html>