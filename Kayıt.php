<?php
include 'baglan.php';
if (isset($_POST['kayit'])) {
	$gelenusername=$_POST['gusername'];
	$gelenemail=$_POST['gemail'];

	$secim= "SELECT * FROM kisiler WHERE kullanici_adi='$gelenusername'";
	$secim2= "SELECT * FROM kisiler WHERE email='$gelenemail'";
	$calistir2=mysqli_query($baglan,$secim2);
	$calistir=mysqli_query($baglan,$secim);
	$kayitsayisi= mysqli_num_rows($calistir);
	$kayitsayisi2= mysqli_num_rows($calistir2);
	if ($kayitsayisi>0) {
		echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">HEY!</strong> Bu kullanıcı adı ile kayıtlı kişi bulunmakta.
        </div>

      </div>
	  </center>';
	}
	elseif ($kayitsayisi2>0) {
		echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">HEY!</strong> Bu kullanıcı adı ile kayıtlı kişi bulunmakta.
        </div>

      </div>
	  </center>';
	}
	else {
		if (empty($_POST['gusername'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Kullanıcı adın boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (strlen($_POST['gusername'])<4) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Kullanıcı adınız 4 karakterden az olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (strlen($_POST['gusername'])>50) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Kullanıcı adınız 50 karakterden büyük olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST['gusername'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>Kullanıcı adınızda özel harf bulunamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$username=$_POST['gusername'];
		}
		//username vbitti
		if (empty($_POST['gemail'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  E-Mail boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (!filter_var($_POST['gemail'], FILTER_VALIDATE_EMAIL)) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>   E-Mailizde özel harf olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (strlen($_POST['gemail'])>50) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>   E-Mailizde 50 harften uzun olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$email=$_POST['gemail'];
		}
		//gmail btiti
		if (empty($_POST['gsifre'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>Şifreniz boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (strlen($_POST['gsifre'])<6) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Şifreniz 4 karakterden az olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if (strlen($_POST['gsifre'])>50) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Şifreniz 50 harften uzun olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			
			$sifre=$_POST['gsifre'];
		}
		//sifre1 bitti
		if (empty($_POST['gsifre2'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Şifre tekrarı boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		elseif ($_POST['gsifre']!=$_POST['gsifre2']) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong>  Şifreler uyuşmuyor.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$sifretekrar=$_POST['gsifre2'];
		}
		//sol taraf bittii
		// if (strlen($_POST['gisim'])>3) {
		// 	echo '
		// 	<center>
		// 	<div class="col-sm-12">
		// 	<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
		// 	  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		// 	  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
		// 	  <strong class="font__weight-semibold">HEY!</strong> İsim 4 haneden uzun olmalı.
		// 	</div>
	
		//   </div>
		//   </center>';
		// }
		 if (empty($_POST['gisim'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> İsim boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$isim=$_POST['gisim'];
		}
		if (empty($_POST['gyas'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Yaş boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if($_POST['gyas']<=14){
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Yaşınız 15den küçük.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$yas=$_POST['gyas'];
		}
		if (empty($_POST['gboy'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Boy boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if ($_POST['gboy']<=1.55) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Boyunuz 1.60dan küçük.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$boy=$_POST['gboy'];
		}
		if (empty($_POST['gkilo'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Kilo boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		elseif ($_POST['gkilo']>69) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> Kilonuz 69dan büyük olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else {
			$kilo=$_POST['gkilo'];
		}
		if (empty($_POST['ginsta'])) {
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> İnstagram boş olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else if($_POST['ginsta']<5)
		{
			echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">HEY!</strong> İnstagram 5 harften az olamaz.
			</div>
	
		  </div>
		  </center>';
		}
		else{
			$insta=$_POST['ginsta'];
		}
		if (isset($username)&&isset($email)&&isset($sifre)&&isset($sifretekrar)&&isset($isim)&&isset($yas)&&isset($boy)&&isset($kilo)&&isset($insta)) {

			$ekle="INSERT INTO kisiler (kullanici_adi,email,sifre,isim,yas,insta,boy,kilo) VALUES ('$username','$email','$sifre','$isim','$yas','$insta','$boy','$kilo')";
			$calistirekle = mysqli_query($baglan,$ekle);
			$ekle2="INSERT INTO `uye` ( `uyeAdi`, `seoadi`, `sifre`, `rutbe`, `onay`, `krengi`, `yrengi`, `cinsiyet`, `hakkinda`, `profil_resmi`, `il`, `ilce`, `sure`) VALUES ( '$username', '$username', '$sifre', '0', '1', '#2c3e50', '#34495e', '2', '', NULL, 'İSTANBUL', 'ATAŞEHİR', '1679216330');";
			$calistirekle2=mysqli_query($baglan,$ekle2);
			if ($calistirekle) {
				echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">KAYIT BAŞARILI!</strong>Aramıza hoşgeldin.
			</div>
	
		  </div>
		  </center>';
		  header("Location: Giriş.php");
			}
			else {
				echo '
			<center>
			<div class="col-sm-12">
			<div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
			  <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
			  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
			  <strong class="font__weight-semibold">Kayıt başarısız!</strong>Aramıza hoşgelemedin.
			</div>
	
		  </div>
		  </center>';
			}
		}
		mysqli_close($baglan);
		
		
	}
	if(isset($_POST["hamz"])){
		echo "a";
	}
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0"/>
    <title>Document</title>
	   <link rel="stylesheet" type="text/css" href="style3.css">
	   <link rel="stylesheet" type="text/css" href="alert.css" >
<!-- 52 -->
 </head>
<body>
	<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form action="Kayıt.php" method="POST" class="login">
			<div class="login_txt">Sign Up<hr></div>
			
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="gusername" type="text" class="login__input" placeholder="User name">
				</div>
					<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="gemail" type="email" class="login__input" placeholder="Email">
				</div>
			
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="gsifre" type="password" class="login__input" placeholder="Password">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input  name="gsifre2"  type="password" class="login__input" placeholder="Approve">
				</div>
				 <button name="kayit" class="button login__submit">
					<span class="button__text">Sign Up </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
				
				<a href="Giriş.php"><button name="hamz" class="button login__submit"></a>
					<span class="button__text">Log In </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
			
				</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
	<div class="screenn">
		<div class="screen__content">
			<form action="Kayıt.php" method="POST" class="login">
			<div class="loginn_txt">Kişisel Bilgileriniz<hr></div>
			
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input  name="gisim"  type="text" class="login__input" placeholder="İsminiz">
				</div>
					<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="gyas" type="text" class="login__input" placeholder="Yaşınız">
				</div>
			
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="gboy"  type="text" class="login__input" placeholder="Boy">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input  name="gkilo"  type="text" class="login__input" placeholder="Kilo">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input  name="ginsta" type="text" class="login__input" placeholder="İnstagramınız">
				</div>
		
			</form>

		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shapee screen__background__shape11"></span>
		</div>		
	</div>
</div>
</body>
</html>

