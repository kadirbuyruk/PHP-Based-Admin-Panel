<?php
    session_start();
    session_destroy();
    setcookie("kullanici","",time()-1);
    echo "<script> window.location.href='index.php'; </script>";
?>

<!doctype html>
<html>
<link rel="stylesheet" href="stil.css"/>

</html>