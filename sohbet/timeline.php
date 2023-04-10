<?php
//error_reporting(0);
ob_start();
session_start();
require_once "class/BasicDB.php";
require_once "baglan.php";
require_once "class/class.upload.php";
#####RESİMLERİ GÖSTER#####
$listele = $db->from('resimler')
->join('uye', '%s.id = %s.uyeid')
->where('izin', 1)
->groupby('tarih')
->orderby('zaman','desc')
->run();
#####RESİMLERİ GÖSTER#####

#####DURUM PAYLAŞ#####
if(isset($_POST['ekle'])){

    $handle = new upload($_FILES['resim_url']);
    if ($handle->uploaded) {
        $handle->allowed   = array('image/*'); //Bu satır tüm resim uzantılarını kabul eder
        $handle->file_new_name_body   = 'uye_resim';
        //$handle->image_resize         = true;
        $handle->image_x              = 1000; //resmin standart genişliği
        //$handle->image_y              = 1000; //resmin standart yüksekliği
        $handle->image_ratio_crop     = true; //resimi orantılı hale getirir
        $handle->process('resimler');
        if ($handle->processed) {
        $handle->clean();
            } else {
            echo 'Hata Var : ' . $handle->error;
        }
    }
	date_default_timezone_set('Europe/Istanbul');
    $ekle = $db->insert('resimler')
    ->set(array(
        'resim_url' => $handle->file_dst_name == '' ? NULL : $handle->file_dst_name,
        'uyeid'   	=> $_SESSION["uyeid"],
        'tarih'		=> date('d.m.Y'),
        'saat'		=> date('H:i'),
        'aciklama'	=> $_POST['aciklama'] == '' ? NULL : $_POST['aciklama'],
        'izin'		=> 1,
        'zaman'		=> time()
    ));

    if ($ekle){

        header("Location:timeline.php");

    }else {

        echo 'Eklenemedi.';

    }
}
#####DURUM PAYLAŞ#####

#####DURUM GÜNCELLE#####
if (isset($_POST['paylasim'])){
$paylasim_durumu = $db->update('resimler')
->where('resim_id', $_POST["paylasim"])
->set(array(
 'izin' => 0
));
	if ($paylasim_durumu) {
		header('Location:timeline.php');
	}
}
if (isset($_POST['paylasimiki'])){
$paylasim_durumuiki = $db->update('resimler')
->where('resim_id', $_POST["paylasimiki"])
->set(array(
 'izin' => 1
 ));
	if ($paylasim_durumuiki) {
		header('Location:timeline.php');
	}
}
#####DURUM GÜNCELLE#####

#####DURUM SİL#####
if($_POST) {
$resimbul = $db->from('resimler')
->join('uye', '%s.id = %s.uyeid')
->where('resim_id', $_POST["id"])
->first();
$sil = $db->delete('resimler')
->join('uye', '%s.id = %s.uyeid')
->where('resim_id', $_POST["id"])
->done();
@unlink("resimler/".$resimbul["resim_url"]);//resim silmek için yeterli
}
#####DURUM SİL#####
?>
<?php if (@$_SESSION["oturum"]) { ?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Durum Paylaş</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//fonts.googleapis.com/css?family=Hammersmith+One|Kalam" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" language="javascript" src="sweetalert/sweetalert.min.js"></script>
    	<link rel="stylesheet" href="sweetalert/sweetalert.css">		
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.lazyload.js"></script>
		<script type="text/javascript" src="js/hamburger.js"></script>
		<link rel="stylesheet" type="text/css" href="css/paylasimlar.css">
		<link rel="stylesheet" type="text/css" href="css/input.css">
		<link rel="stylesheet" type="text/css" href="css/hamburger.css">
		<script type="text/javascript">
			$(function(){
				$(".uyari").hide();
				$(".paylas").click(function(){
					$(".gizle").slideUp(2000);
					$(".uyari").show();
				});
				$(".uyari").click(function(){
					$(".uyari").hide();
					$(".gizle").show();
				});

			});

			$(function(){
			$("img.lazy").lazyload({
			    effect : "fadeIn"
			});

			});

			$(document).ready(function(){
				setTimeout(function(){
						$("div#kaybol").fadeOut("slow", function () {
						$("div#kaybol").remove();
				});
			}, 15000);
			});		

			$(document).ready(function(){
			    $(".sil").on("click",function(){ //Gönderme butonunun clasını yakaladım silme butonu
			        
			        var id = jQuery(this).prevAll('input[name="id"]').val();
			        
			        var Data = "id="+id;
			        //alert(Data);

			        swal({
			          title: "Emin misiniz?",
			          text: "<strong style='text-transform:capitalize;'><?=$_SESSION["uyeAdi"]?>, devam ederseniz bu resim tamamen silinecek!</strong>",
			          html: true,
			          type: "warning",
			          showCancelButton: true,
			          confirmButtonColor: "#e74c3c",
			          confirmButtonText: "Evet, silinsin!",
			          cancelButtonText: "Hayır, vazgeç!",
			          closeOnConfirm: false,
			          closeOnCancel: false
			        },
			        function(isConfirm){
			          if (isConfirm) {
			            $.ajax({
			                type: "POST",
			                url: "",//silme işlemi başka sayfada olacaksa dosya adı gir
			                data: Data,

			            });

			            swal({
			                title: "Silindi!", 
			                text: "<strong >Başarıyla Silindi.</strong>", 
			                type: "success",
			                html: true,
			                timer: 2000},
			               function(){ 
			                   location.reload();
			               }
			            );

			          } else {

			            swal({
			              title: "İptal",
			              text: "<strong>Silme İşlemi İptal Edildi.</strong>",
			              type: "error",
			              html: true,
			              timer: 3000
			            });            
			          }
			        });        
			    });
			})  
		</script>
	</head>
	<body>
    <div id="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                       Sohbet
                    </a>
                </li>
                <li>
                    <a href="index.php">Anasayfa</a>
                </li>
                <li>
                    <a href="timeline.php">Durum Paylaş</a>
                </li>
                <?php echo $_SESSION['rutbe'] == 1 ? '<li><a href="panel.php">Yönetim Paneli</a></li>' : ''; ?>
                <li>
                    <a href="cikis.php">Çıkış</a>
                </li>                
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
			<div class="container">
		    	<div class="row" id="paylas">
		    		<div class="gizle">
		    			<form enctype="multipart/form-data" method="post" action="">
			    		<div class="form-group col-lg-2 text-center">
							<label class="file">
							    <input type="file" name="resim_url">
							    <span class="file">
							        <i class="fa fa-picture-o" aria-hidden="true"></i> Fotoğraf Seç!
							    </span>
							</label>
			    		</div>

			    		<div class="form-group col-lg-8">
			    			<textarea type="text" name="aciklama" rows="1" class="form-control" placeholder="Ne düşünüyorsun, <?=$_SESSION['uyeAdi'] ?>?"></textarea>
		    			</div>
			    		<div class="form-group col-lg-2">
			    			<input type="submit" name="ekle" class="btn btn-info btn-block paylas" value="Paylaş">
			    		</div>
			    		</form>
			    	</div>
			    	<div class="alert alert-success uyari" style="margin:0px;">
					  <strong>Paylaşılıyor!</strong> Yüklenmesi biraz zaman alabilir.
					</div>
		    	</div>

		        <div class="col-lg-12">
		            <div class="row">
		                <div class="timeline timeline-line-dotted">
							<?php if ($listele){foreach ( $listele as $res ){?>
						    <span class="timeline-label">
		                    	<span class="label label-primary"><?=$res["tarih"]?></span>
		                	</span>
							<?php
							$icerik = $db->from('resimler')
							->join('uye', '%s.id = %s.uyeid', 'left')
							->orderby('zaman', 'desc')
							->find_in_set('tarih', $res["tarih"])
							->run();
							//print_r($icerik);
							foreach ($icerik as $i) { ?>
							<?php if (($i["izin"] == 1) or ($i["id"] == $_SESSION["uyeid"])) { ?>
		                    <div class="timeline-item">
		                        <div class="timeline-point timeline-point-<?= $i['resim_url'] == '' ? 'default' : 'danger'?>">
		                        	<?= $i['resim_url'] == '' ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-file-image-o"></i>'?>
		                        </div>

		                        <div class="timeline-event <?=$i['izin'] == '1' ? '' : 'timeline-event-warning' ?>">
		                            <div class="timeline-heading">
		                            	<span style="background-color:<?=$i["krengi"] ?>;padding:5px;padding-bottom:7px;border-radius:4px">
		                                <a href="<?=$i["uyeAdi"]?>" id="kadi" style="color:white;text-decoration:none">
		                                <span class="badge" style="background-color:white;border-radius:10px">
		                                <?=$i["rutbe"] == 1 ? '<span style="color:'.$i["krengi"].'" class="glyphicon glyphicon-star"></span>' : '<span style="color:'.$i["krengi"].'" class="glyphicon glyphicon-plus"></span>' ?>
		                                </span>
		                                <?=$i["uyeAdi"]?>
		                                <?=$i["cinsiyet"] == 1 ? '<i class="fa fa-mars"></i>' : '<i class="fa fa-venus"></i>' ?>
		                                </span>
		                                
		                                </a>
		                            </div>
		                            <div class="timeline-body">
		                                <?= $i['aciklama'] == null ? '' : '<p>'.$i['aciklama'].'</p><br>'?>
		                                <?= $i['resim_url'] == null ? '' : '<img class="img img-responsive img-rounded lazy" data-original="resim-gizle.php?goster='.$i["resim_url"].'">'?>
		                            </div>

		                            <div class="timeline-footer">
		                            <ul>
		                            	<li><i class="fa fa-clock-o"></i> <?=$i["saat"]?></li>

		                            	<?= $i['resim_url'] == '' ? '' : '<li><a href="resimler/'.$i["resim_url"].'" download>  <span class="fa fa-download"></span> İndir</a></li>'?>

		                                <?php if ($i["uyeid"] == $_SESSION["uyeid"]) { ?>
		                                <li>
				                		<form action="" onsubmit="return false;">
					                		<input type="hidden" name="id" id="id" value="<?=$i["resim_id"]?>">
					                		<a type="submit" class="sil"><span class="fa fa-window-close"></span> Sil</a>
				                		</form>
				                		</li>
				                		<?php } ?>

				                		<?php if ($i["uyeid"] == $_SESSION["uyeid"]) { ?>

				                		<?php if ($i["izin"] == 0) { ?>
				                		<li>
										<form action="" method="post">
				                		<input type="hidden" name="paylasimiki" value="<?=$i["resim_id"]?>">
				                		<button type="submit"><span class="fa fa-lock"></span> Gizli</button>
				                		</form>
				                		</li>
				                		<?php } ?>

				                		<?php if ($i["izin"] == 1) { ?> 
				                		<li>
				                		<form action="" method="post">
				                		<input type="hidden" name="paylasim" value="<?=$i["resim_id"]?>">
				                		<button type="submit"><span class="fa fa-unlock"></span> Herkese Açık</button>
				                		</form>
				                		</li>
				                		<?php } ?>

				                		<?php } ?>                		
		                            </ul>
		                            </div>
		                        </div>
		                    </div>
		                    <?php } ?>
							<?php }	} }	?>
		                    <span class="timeline-label">
		                        <a href="#" class="btn btn-default" title="More...">
		                            <i class="fa fa-fw fa-history"></i>
		                        </a>
		                    </span>
		                </div>
		            </div>
		        </div>
		    </div>
        </div><!-- /#page-content-wrapper -->
    </div><!-- /#wrapper -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
<?php }else { //oturum yoksa yönlendir
	header('Location:index.php');
}
?>