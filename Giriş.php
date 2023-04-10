<?php
include 'baglan.php';

if (isset($_POST['giris'])) {
	$username=$_POST['gelenusername'];
	$sifre=$_POST['gelensifre'];
	if(isset($username)&&isset($sifre))
    {
	$secim= "SELECT * FROM kisiler WHERE kullanici_adi='$username'";
	$secim2= "SELECT * FROM kisiler WHERE email='$username'";
	$calistir2=mysqli_query($baglan,$secim2);
	$calistir=mysqli_query($baglan,$secim);
	$kayitsayisi= mysqli_num_rows($calistir);
	$kayitsayisi2= mysqli_num_rows($calistir2);

	
	if ($kayitsayisi>0) {
		$ilgilikayit = mysqli_fetch_assoc($calistir);
		$sifree=$ilgilikayit["sifre"];

		if ($sifre==$sifree){
			session_start();
                    $_SESSION["kullaniciadi"]=$ilgilikayit["kullanici_adi"];
                    $_SESSION["email"]=$ilgilikayit["email"];
                    $_SESSION["sifre"]=$ilgilikayit["sifre"];
                    $_SESSION["boy"]=$ilgilikayit["boy"];
                    $_SESSION["kilo"]=$ilgilikayit["kilo"];
                    $_SESSION["yas"]=$ilgilikayit["yas"];
                    $_SESSION["insta"]=$ilgilikayit["insta"];
					$_SESSION["isim"]=$ilgilikayit["isim"];


					
                    header("Location:index.php");
			
		}
		else {
			echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>Girdiğin değerleri kontrol et
        </div>

      </div>
	  </center>';
		}
	}
	else if ($kayitsayisi2>0) {
		$ilgilikayit2 = mysqli_fetch_assoc($calistir2);
		$sifree2=$ilgilikayit2["sifre"];
		if ($sifre==$sifree2) {
			session_start();
			$_SESSION["kullaniciadi"]=$ilgilikayit["kullanici_adi"];
			$_SESSION["email"]=$ilgilikayit["email"];
			$_SESSION["sifre"]=$ilgilikayit["sifre"];
			$_SESSION["boy"]=$ilgilikayit["boy"];
			$_SESSION["kilo"]=$ilgilikayit["kilo"];
			$_SESSION["yas"]=$ilgilikayit["yas"];
			$_SESSION["insta"]=$ilgilikayit["insta"];
			$_SESSION["isim"]=$ilgilikayit["isim"];
                    header("Location:index.php");
			
		}
		else {
			echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>Girdiğin değerleri kontrol et
        </div>

      </div>
	  </center>';
		}
	}
	else {
		echo '
		<center>
		<div class="col-sm-12">
        <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert" role="alert" data-brk-library="component__alert">
          <i class="start-icon  fa fa-info-circle faa-shake animated"></i>
		  <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
          <strong class="font__weight-semibold">Başarısız! </strong>Kullanıcı adını kontrol et
        </div>

      </div>
	  </center>';
	}
	
}
}
if (isset($_POST['kayit'])) {
	header("Location: Kayıt.php");
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0"/>
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="alert.css" >
	   <link rel="stylesheet" type="text/css" href="style2.css">
	   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

 </head>
<body>
	<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form action="Giriş.php" method="POST" class="login">
			<div class="login_txt">Log In<hr></div>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="gelenusername" type="text" class="login__input" placeholder="User name / Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="gelensifre" type="password" class="login__input" placeholder="Password">
				</div>
				<button name="giris" class="button login__submit">
					<span class="button__text">Log In </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
                    <button name="kayit" class="button login__submit">
					<span class="button__text">Sign Up </span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				
				<div class="social-icons">
					<a href="www.google.com" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>

