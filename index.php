<?php
include("yonetim/ayar.php");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kişisel Sayfa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="stils.css">
    </head>
    <body>
    <div id="hero">
<video autoplay loop muted>
  <source src="video2.mp4" type="video/mp4">
</video>
<div class="content">
  <div class="container"> 
        <aside id="menu">
        <div class="arka">
        <div class="temizle"></div>
        <div class="profill" style="width:10px;  height:10px ;" >
          <?php
          error_reporting(0);
            $sorgu = $baglan->query("select * from resimyukleme");
           $satir = $sorgu->fetch_object() ;
              $resim = substr($satir->resim,3);
              echo "<div class='profil'>
              <a href='$resim' rel='group2' title='$satir->aciklama'><img src='$resim' alt='$satir->aciklama'></a>
              </div>";
          ?>
          </div>
          <div class="temizle"></div>
          <br><br><br><br>
          <?php
            $sorgu = $baglan->query("select * from resimyukleme");
            $satir = $sorgu->fetch_object();
            echo $satir->aciklama;
          ?>
       <br><br><br><br><br>
<!--<h4>~~~- MENÜ -~~~</h4>-->
        <ul>
          <li><a href="#anasayfa">Ana Sayfa</a></li><hr>
          <li><a href="#hakkimizda">Hakkımda</a></li><hr>
          <li><a href="#projeler">Projelerim</a></li><hr>
          <li><a href="#iletisim">İletişim</a></li>
        </ul>
        </div>
      </aside>
      <main id="icerik">
        <section id="anasayfa">
       <b><i>   <h1 class="baslık1" >Kişisel Blog</h1></i></b>
          <h2 class="baslık2" >Anasayfa</h2>
          <hr>
          <div class="temizle"></div>
          <?php
            $sorgu = $baglan->query("select * from anasayfa");
            while ($satir = $sorgu->fetch_object()) {
              $resim = substr($satir->resim,3);
              echo "<div class='galeri'>
              <a href='$resim' class='resimler' rel='group2' title='$satir->baslik'><img src='$resim' alt='$satir->baslik'></a>
              </div>";
            }
          ?>
          <div class="temizle"></div>
        </section>
        
         <section id="hakkimizda">
          <h2>Hakkımda</h2>
          <hr>
          <div class="temizle"></div>
          <?php
            $sorgu = $baglan->query("select * from hakkimizda");
            $satir = $sorgu->fetch_object();
            echo $satir->aciklama;
          ?>
        </section>
        <section id="projeler">
          <h2>Projeler</h2>
          <hr>
          <div class="temizle"></div>
          <?php 
          $sorgu = $baglan->query("select * from projeler");
          $satir = $sorgu->fetch_object();
            echo $satir->aciklama;
          ?>
        </section>
        <section id="iletisim">
         <fieldset><legend class="fs" > <b>İletişim</b> </legend>
          <div class="temizle"></div>
          <form method="post" action="index.php" name="form">
            <label for="adsoyad">Ad Soyad</label>
            <input type="text" name="adsoyad" id="adsoyad" required>
            <label for="eposta">E-posta</label>
            <input type="email" name="eposta" id="eposta" required>
            <label for="mesaj">Mesaj</label>
            <textarea name="mesaj" id="mesaj" required></textarea>
            <button class="butoon" type="submit">Mesaj Gönder</button></fieldset> 
          </form>  </section>
          <?php
          if($_POST){
$ad=$_POST["adsoyad"];
$email=$_POST["eposta"];
$mesaj=$_POST["mesaj"];
$ekle="insert into iletisim (ad,email,mesaj)  VALUES ('".$ad."','".$email."','".$mesaj."')";
if ($baglan->query($ekle) ===TRUE)  
{  
  echo "<script>alert('Gönderim Başarılı!')</script>" ; 
  echo "<script> window.location.href='index.php'; </script>";
} }
?>
<section>  <hr>
<div class="yeni " style="text-align:center;"  >
<div class="temizle"></div>
<?php 
          $sorgu1 = $baglan->query("select * from linkler");
          $sorgu2 = $baglan->query("select * from linkler");
          $sorgu3 = $baglan->query("select * from linkler");
          $sorgu4 = $baglan->query("select * from linkler");
          $satir1 = $sorgu1->fetch_object();
          $satir2 = $sorgu2->fetch_object();
          $satir3 = $sorgu3->fetch_object();
          $satir4 = $sorgu4->fetch_object();
          /*echo $satir1->link1 ;
          echo $satir2->link2;
          echo $satir3->link3;*/
          ?>
                  <div class="yeni " style="text-align:center;"  >
        <a href="<?php  echo $satir1->link1?>" target="_blank"> 
        <img src="facebook.jpg" alt="facebook" width="50px" height="50px" ></a> 
        <a href="<?php  echo $satir2->link2?>" target="_blank">
        <img src="instagram.jpg" alt="instagram" width="50px" height="50px"  ></a> 
        <a href="<?php  echo $satir3->link3?>" target="_blank">
        <img src="linked.in.jpg" alt="linkedin" width="50px" height="50px" ></a> 
        <a href="<?php  echo $satir4->link4?>" target="_blank">
        <img src="GitHub-Mark.png" alt="github" width="50px" height="50px" ></a> </div>
</section>
</div>
</div>
</div>
</main>
    </body>
</html>