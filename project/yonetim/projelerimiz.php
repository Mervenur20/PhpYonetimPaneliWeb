<?php
    session_start();
    include("ayar.php");

    if ($_SESSION["giris"]  != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb") {
        header("Location: cikis.php");

    }

    if ($_POST) {
        $aciklama = $_POST["aciklama"];
        $sorgu = $baglan->query("delete from projelerimiz");
        $sorgu = $baglan->query("insert into projelerimiz (aciklama) values ('$aciklama')");
            echo "<script> wwindow.location.href='projelerimiz.php'; </script>";
        
    }
    
    $sorgu = $baglan->query("select * from projelerimiz");
    $satir = $sorgu->fetch_object();
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yönetim Paneli Projelerimiz</title>
</head>
<body>
    

    <div style="text-align:center;">
        <a href="anasayfa.php">ANA SAYFA</a> - <a href="portfolyo.php">PORTFOLYO></a> - <a
        href="hakkimizda.php">HAKKIMIZDA</a> - <a href="hizmetlerimiz.php">HİZMETLERİMİZ></a> - 
        <a href="projelerimiz.php">PROJELERİMİZ</a> - <a href="cikis.php" onclick="if (!confirm
        ('Çıkış Yapmak İstediğinize Emin misiniz?')) return false;">ÇIKIŞ></a> 
        <br><hr><br><br>
    </div>

    <form action="" method="post">
        <b>İçerik:</b><br><br>
        <textarea style="width:80%;height:300px;" name="aciklama"><?php echo $satir->aciklama; ?></textarea><br><br>
        <input type="submit" value="Kaydet">
    </form>

</body>
</html>