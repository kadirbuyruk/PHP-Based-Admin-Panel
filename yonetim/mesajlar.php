<?php
    session_start();
    include("ayar.php");
    $islem= isset($_GET['islem']) ? $_GET['islem'] : '';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stil.css"/>
    <title>Yönetim Paneli Hakkımızda</title>
</head>
<body >
<h1 style="text-align:center;">Yönetim Paneli</h1>
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
        <br><hr><br><br>
    </div>
    

<body>
<table border="1" align="center" width="500" >
<tr>
<td>Sıra </td>
<td>Ad</td>
<td>Email</td>
<td>Mesaj</td>
<td>Tarih</td>
<td>Sil</td>

</tr>
<?php 
$sirano=0;
$kayit = $baglan->query("select * from  iletisim");
if($kayit->num_rows>0){
while ($yaz=$kayit->fetch_assoc()){
    $sirano++;
echo '<tr>';
echo '<td>'.$sirano.'</td>';
echo '<td>'.$yaz['ad'].'</td>';
echo '<td>'.$yaz['email'].'</td>';
echo '<td>'.$yaz['mesaj'].'</td>';
echo '<td>'.$yaz['tarih'].'</td>';
echo '<td> <a href="mesajlar.php?islem=sil&id='.$yaz['id'].'">Sil</a> </td>';
echo '</tr>';
}

}
if ($islem == "sil") {
    $id = $_GET["id"];
    $kayit = $baglan->query("DELETE FROM iletisim where (id='$id')");
    echo "<script> window.location.href='mesajlar.php'; </script>";
}
 ?>
</table>
 
</body>
    
    

        </body>
</html>