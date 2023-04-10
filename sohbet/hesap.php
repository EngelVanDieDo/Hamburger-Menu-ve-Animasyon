<?php
error_reporting(0);
session_start();
include "class/BasicDB.php";
include "baglan.php";
include "class/class.upload.php";
include "fonksiyon.php";

if (seo($_GET["kadi"])) {
$bul = $db->from('uye')
->where('seoadi', seo($_GET["kadi"]))
->first();
//print_r($bul);
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $_GET["kadi"] ?> Profili</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//fonts.googleapis.com/css?family=Hammersmith+One|Kalam" rel="stylesheet">
		<script type="text/javascript" language="javascript" src="sweetalert/sweetalert.min.js"></script>
    	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	    <style type="text/css">
			@import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
			body {background-color: #2980b9; margin-top:20px;}
			.sweet-alert button.cancel{
	  		background-color: #3498db;
	  		color: white;
			}         
		</style>

	</head>
	<body>
	<div class="container">
	<?php
	if ($bul['seoadi'] !== seo($_GET["kadi"])) {
		echo '<div class="alert alert-success">
  <strong>Üzgünüm!</strong> '.seo($_GET["kadi"]).' adında bir kullanıcımız yok. '.seo($_GET["kadi"]).' ismiyle kayıt olmak <a href="uye-ol.php">ister misiniz?</a>
</div>';
	}else {	?>
		<div class="col-lg-8 col-lg-offset-2">
			<div style="padding:10px; background-color: #ecf0f1">
			  <img style="-webkit-filter: blur(5px);filter: blur(5px);" class="img-responsive" src="<?=$bul['profil_resmi'] == NULL ? 'http://via.placeholder.com/710x210' : 'kapak/'.$bul['profil_resmi'] ?>" alt="Card image cap">

			  <img style="display: block; position: absolute; top: 25%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%)" class="img-responsive img-circle img-thumbnail" src="<?=$bul['profil_resmi'] == NULL ? 'http://via.placeholder.com/100x100' : 'profil/'.$bul['profil_resmi'] ?>">
			  <div class="card-block" style="margin:15px;">
			    <h3 class="card-title" style="text-transform:capitalize;"><?=$bul['uyeAdi']?></h3>
			    <p class="card-text"> <?=$bul['hakkinda'] == NULL ? 'Hakkınızda bişeyler <a href="profil.php">yazabilirsiniz.</a>' : $bul['hakkinda'] ?></p>
			  </div>
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item"><strong>Yetki Düzeyi:</strong> <?=$bul['rutbe'] == 1 ? 'Yönetici' : 'Üye' ?></li>
			    <li class="list-group-item"><strong>Cinsiyeti:</strong> <?=$bul['cinsiyet'] == 1 ? 'Erkek' : 'Bayan' ?></li>
			    <li class="list-group-item"><strong>Üyelik:</strong> <?=$bul['onay'] == 1 ? 'Onaylı Üye' : 'Onaylanmamış Üye' ?></li>
			    <li class="list-group-item"><strong>Yaşadığı Yer:</strong> <?=$bul['il'] .' / '. $bul['ilce']?></li>
			  </ul>
			  <div class="card-block text-center">
			  	<a href="index.php" class="btn btn-info"><i class="fa fa-comments-o"></i></a>
			    <a href="#" class="btn btn-danger"><i class="fa fa-heart" aria-hidden="true"></i></a>
			    <a href="#" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i></a>

			  </div>
			</div>
		</div>
	<?php } ?>
	</div>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
<?php
}else{
	header('Location:index.php');
}
?>