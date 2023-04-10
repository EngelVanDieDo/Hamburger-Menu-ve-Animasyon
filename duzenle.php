<?php
// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "", "uyelik");

// Hata mesajı kontrolü
if (mysqli_connect_errno()) {
    echo "Veritabanı bağlantısı başarısız: " . mysqli_connect_error();
    exit();
}

// Kaydın ID'si alınır
$id = $_GET['id'];

// Kaydın sorgulanması
$sorgu = "SELECT * FROM bulusma WHERE id=$id";
$sonuc = mysqli_query($conn, $sorgu);

// Form oluşturma
echo "<form action='' method='post'>";
echo "<table>";
while ($satir = mysqli_fetch_assoc($sonuc)) {
    echo "<tr><td>ID:</td><td><input type='text' name='id' value='".$satir['id']."' readonly></td></tr>";
    echo "<tr><td>Ad:</td><td><input type='text' name='kullanici_adi' value='".$satir['kullanici_adi']."'></td></tr>";
    echo "<tr><td>Yaş:</td><td><input type='text' name='insta' value='".$satir['insta']."'></td></tr>";
    echo "<tr><td>Soyad:</td><td><input type='text' name='saat' value='".$satir['saat']."'></td></tr>";
    echo "<tr><td>Yaş:</td><td><input type='text' name='saat2' value='".$satir['saat2']."'></td></tr>";
    echo "<tr><td>Yaş:</td><td><input type='text' name='durum' value='".$satir['durum']."'></td></tr>";
    }
    echo "</table>";
    echo "<input type='submit' name='duzenle' value='Kaydet'>";
    echo "</form>";
    
    // Form verilerinin kaydedilmesi
    if (isset($_POST['duzenle'])) {
    // $id = $_POST['id'];
    // $ad = $_POST['ad'];
    // $soyad = $_POST['soyad'];
    // $yas = $_POST['yas'];
    $durum=$_POST['durum'];
    $sorgu = "UPDATE bulusma SET durum='$durum' WHERE id=$id";
    if (mysqli_query($conn, $sorgu)) {
        echo "Kayıt başarıyla güncellendi.";
    } else {
        echo "Kayıt güncelleme hatası: " . mysqli_error($conn);
    }
    
    }
    // Kaydın güncellenmesi
// $sorgu = "UPDATE kisiler SET kullanici_adi='$ad', saat='$soyad', durum='$yas' WHERE id=$id";



?>