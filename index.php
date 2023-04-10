<?php
include 'baglan.php';

session_start();
$username=$_SESSION["kullaniciadi"];
$isim=$_SESSION["isim"];
$yas=$_SESSION["yas"];
$boy=$_SESSION["boy"];
$kilo=$_SESSION["kilo"];
$insta=$_SESSION["insta"];

if (isset($_SESSION["kullaniciadi"]))
{
   
}
else {
  header("Location: Kayıt.php");
}

if (isset($_POST['saat1'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=16.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat1
if (isset($_POST['saat2'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=17.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat2
if (isset($_POST['saat3'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=18.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat3 bitti
if (isset($_POST['saat4'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=19.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat4
if (isset($_POST['saat5'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=20.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat5
if (isset($_POST['saat6'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=21.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat6
if (isset($_POST['saat7'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=7.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat7
if (isset($_POST['saat6'])) {
	$secim= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
  $calistir=mysqli_query($baglan,$secim);
  $kayitsayisi= mysqli_num_rows($calistir);
  if ($kayitsayisi>0) {
    echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>1den fazla buluşma alamazzsın
        </div>
      </div>
	  </center>';
  }
  else {
    $saat=00.00;  
   $saat2=30;
   $username=$_SESSION["kullaniciadi"];
   
   $ekle="INSERT INTO bulusma (kullanici_adi,insta,saat,saat2,durum) VALUES ('$username','$insta','$saat','$saat2','beklemede')";
  $calistirekle = mysqli_query($baglan,$ekle);
  echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarılı! </strong> buluşma isteğiniz gönderildi
        </div>
      </div>
	  </center>';
  }
}
//saat8
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0"/>
    <title>Document</title>
	   <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" href="alert.css">
 </head>
 <body><div class="içerik">
 <!--Menü açılabilmesi için icon-->
<input type="checkbox" id="menu-toggle" >

    <div class="header" id="gt">
        <label class="hamburger-menu" for="menu-toggle">
            <span></span>
        </label>
        <label for="menu-toggle" class="backdrop"></label>
		<div class="user-icon">
  <img src="user.png" alt="User Icon">
  <div class="info-box">
  
  <ul>
  <li>
   İsminiz:  <?php  echo "<p>".$_SESSION["isim"]."</p>"; ?>
  </li>
    <li>
	Yaşınız: <?php  echo "<p>".$_SESSION["yas"]."</p>"; ?>
  </li>
    <li>
	Boy: <?php  echo "<p>".$_SESSION["boy"]."</p>"; ?>
  </li>
    <li>
    Kilo:  <?php  echo "<p>".$_SESSION["kilo"]."</p>"; ?>
  </li>
     <li>
    İnstanız: <?php  echo "<p>".$_SESSION["insta"]."</p>"; ?>
  </li>
  <div class="çizgi">---------------------------------</div>
     <li>
    Durum: <?php 
    $durumkontrol= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
    $durumcalistir=mysqli_query($baglan,$durumkontrol);
    $durumsayi= mysqli_num_rows($durumcalistir);
    if ($durumsayi>0) {
      $durum= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
      $calistir=mysqli_query($baglan,$durum);
      $ilgilikayit = mysqli_fetch_assoc($calistir);
      $durum2=$ilgilikayit["durum"];
      echo $durum2;

    }
    else {
      echo 'bulusma isteği bulunmadı';
    }
    ?>
  </li>
  <li>Saat: <?php
$durumkontrol= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
    $durumcalistir=mysqli_query($baglan,$durumkontrol);
    $durumsayi= mysqli_num_rows($durumcalistir);
    if ($durumsayi>0) {
      $durum= "SELECT * FROM bulusma WHERE kullanici_adi='$username'";
      $calistir=mysqli_query($baglan,$durum);
      $ilgilikayit = mysqli_fetch_assoc($calistir);
      $durum2=$ilgilikayit["saat"];
      $durum3=$ilgilikayit["saat2"];
      echo $durum2,":",$durum3;

    }
    else {
      echo 'bulusma isteği bulunmadı';
    }
  ?>
    

</li>
<!-- 
  //<?php
  // $durumsaat=$ilgilikayit["saat"];
 // $durumsaat2=$ilgilikayit["saat2"];
  //echo $durumsaat,":",$durumsaat2;
  ?>
 -->
  </ul>
  </div>
</div>
    </div>
	<!--Ortadaki Yazılar-->
	<div class="animate-text"><a>Merabalar <?php echo $username=$_SESSION["kullaniciadi"];
  ?>,Kadirle Buluşma Sitesine Hoşgeldiniz,<br>Daha fazla detay için aşşağıya kaydırınız.</a></div>
<div class="hiza"><img src="down-arrow (1).png"alt="ewgw"></div>
<!--Yan menü-->
<nav class="menu">
<!--Eklediğin her listeye bu kodu eklemeyi unutma!(onclick="removeChecked()")-->
    <ul>
        <li>
            <a onclick="scrollToElement(event),removeChecked();">Hakkımda</a>
        </li>
        <li>
           <a onclick="scrollToElement1(event),removeChecked();">Buluşma<br>Saatleri</a>
        </li>
		<li>
    <a onclick="baglan(),removeChecked();">Sohbete git </a>
		</li>
    
		<li>

		</li>
		<li>

		</li>
		<li>

		</li>
		<li>
	
		</li>
		<li>

		</li>
		<li>

		</li>
		<li>
	
		</li>
		<li>

		</li>
		<li>

		</li>
		<li>
    <?php     echo "<a href='cikis.php' style='color:red; background-color:yellow:border:1px solid red; padding: 5px 5px;'>Cıkıs yap </a>"; ?>

		</li>
		
    </ul>

	<a onclick="activeChecked()"><div class="altbutton" onclick="activeChecked()"><label class="hamburger-menu" onclick="activeChecked()" >
            <span></span>
        </label></div></a>
</nav>
<form action="index.php" method="POST">

<div class="ayırıcı" id="ayır">
<div class="it1">
<button name="saat1" class="item11"><span>21:55</span></button>
<button  name="saat2" class="item1"><span>21:55</span></button>
<button  name="saat3" class="item1"><span>21:55 </span></button>
<button  name="saat4" class="item1"><span>21:55 </span></button>
</div>
<div class="it2">
<button  name="saat5" class="item22"><span>21:55 </span></button>
<button  name="saat6" class="item2"><span>21:55 </span></button>
<button  name="saat7" class="item2"><span>21:55 </span></button>
<button  name="saat8" class="item2"><span>21:55 </span></button>
</div>
</div>
</form>
<div class="dsads" id="cardid"><div class="card-swiper">
</div>
  <div class="card-groups">
    <div class="card-group" data-index="0" data-status="active">
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
    </div>
    <div class="card-group" data-index="1" data-status="unknown">
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
    </div>
    <div class="card-group" data-index="2" data-status="unknown">
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
      <div class="little-card card">

      </div>
      <div class="big-card card">

      </div>
    </div>
  </div>
  <div class="card-swiper-buttons">
    <button id="hate-button" onclick="handleHateClick()">
 <img class="imghz"src="x-button.png"alt="ewgw">
    </button>
    <button id="love-button" onclick="handleLoveClick()">
     <img class="imghz"src="heart.png"alt="ewgw">
    </button>
  </div>
</div>

</div>
 </body>
 <!--Dark mode-->
 <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
 <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
<script src="script.js"></script>
</html>