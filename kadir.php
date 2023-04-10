    <?php
// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "", "uyelik");

// Hata mesajı kontrolü
if (mysqli_connect_errno()) {
    echo "Veritabanı bağlantısı başarısız: " . mysqli_connect_error();
    exit();
}

// Kayıtları sorgulama
$sorgu = "SELECT * FROM bulusma";
$sorgu2 = "SELECT * FROM kisiler";
$sonuc2 = mysqli_query($conn, $sorgu2);
$sonuc = mysqli_query($conn, $sorgu);
$satir2 = mysqli_fetch_assoc($sonuc2);

// Kayıtların listelenmesi
echo"<table class='table'>
<thead>
  <tr>
    <th scope='col'>İD</th>
    <th scope='col'>KULLANICI ADI</th>
    <th scope='col'>SAAT</th>
    <th scope='col'>SAAAAT</th>
    <th scope='col'>İNSTA</th>
    <th scope='col'>YAŞŞ</th>
    <th scope='col'>DUZENLE</th>
  </tr>
</thead>";
while ($satir = mysqli_fetch_assoc($sonuc)) {
 echo "   <tbody>
            <tr>
            <td scope='row'>".$satir['id']."</td>
            <td>".$satir['kullanici_adi']."</td>
            <td>".$satir['saat']."</td>
            <td>".$satir['saat2']."</td>
            <td>".$satir2['insta']."</td>
            <td>".$satir['durum']."</td>
            <td><a href='duzenle.php?id=".$satir['id']."'>Düzenle</a></td>
            </tr>";

}
// while ($satir = mysqli_fetch_assoc($sonuc)) {
//     echo "<tr><td>".$satir['id']."</td><td>".$satir['kullanici_adi']."</td><td>".$satir['saat']."</td><td>".$satir['saat2']."</td><td></td><td>".$satir2['yas']."</td><td></td><td>".$satir['insta']."</td><td><a href='duzenle.php?id=".$satir['id']."'>Düzenle</a></td></tr>";
// }
echo "</table>";

// Veritabanı bağlantısını kapatma
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    
</body>
</html>