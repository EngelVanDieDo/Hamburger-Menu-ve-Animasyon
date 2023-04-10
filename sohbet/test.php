<!DOCTYPE html>
<html>
<head>
	<title>test sayfası</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
	<script type="text/javascript">
	$(function(){
		//$("p").hide(1000); //1 saniyede p gizle
		//$("p").show(3000); //3 saniyede p göster
		//$("p, span, .okan, #okan").hide(3000); //3 saniyede p ve span gizle - çoklu seçim
		//$(".okan").hide(3000); //3 saniyede classı okan olan divini gizle
		//$("#okan").hide(3000); //3 saniyede idsi okan olan divini gizle

		//$("p").css("color","red"); //p nesnesini kırmızı yap css tanımlama

		//BİRDEN FAZLA CSS BİLGİSİ EKLEME
		//$("p").css({
		//	"color" : "red",
		//	"background-color" : "black"
		//});

		//NİTELİK ATAMA
		//$("a").attr("href","https://okandiyebiri.com");

		//NİTELİK SİLME
		//$("a#link2").removeAttr("href");

		//ÇOKLU NİTELİK ATAMA
		//$("img").attr({
		//	"src" : "https://sitenisevsinler.com/uploads/fa64215795.jpg",
		//	"title" : "Resim başlık"
		//});

		//click İLE BUTONA TIKLANDIĞINDA YAZDIR
		//$(".okan").click(function(){
		//	var text = $(this).text();
		//	alert(text);
		//});

		//input name alma
		//$("input").click(function(){
		//	var val = $("input[name=test]").val();
		//	alert(val);
		//});

		//load
		//$("img#resim").hide(); //resimi gizledik
		//$("img#resim").load(function(){ //resim yüklenene kadar dedik
		//	$("p#resimuyari").hide(); // yüklendiktensonra uyarı yazısını sil
		//	$("img#resim").show(); //resimleri göster
		//});

		//Error Metodu
		//$("img").error(function(){
		//	$(this).attr("src","https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_960_720.png");
		//});

		//Buton Bir Kez Tıklanailsin
		//$("button").one("click", function(){
		//	$("span").toggle();
		//});
		$.getJSON("http://www.namazvaktim.net/json/sehirler/turkiye.json", function(name){
			alert(name.ankara);
		});



	});	

	</script>
</head>
<body>
<a href="">link</a>
<a id="link2" href="https://sitenisevsinler.com">link2</a>
<p>test paragraf</p>
<span>test span</span>
<div class="okan">Bu bir class içeren div bana tıkla</div>
<div id="okan">Bu bir id içeren div</div>
<img src="">
<input type="" name="test" value="değer">
<div class="jsonsonuc"></div>

<p id="resimuyari">Resim Yüklenecek Az Bekle</p>
<img id="resim" src="http://www.resimmotoru.com/data/thumbnails/939/anadolu_kestanesi.jpg">

<img src="http://www.resimmotoru.com/data/thumbnails/939/anadolu_kestanesi.jpg">
<img src="http://www.resimmotoru.com/data/thumbnails/939/andz-agaci.jpg">
<img src="http://www.resimmotoru.com/data/thumbnails/939/bozkavak_agaci.jpg">
<img src="http://www.resimmotoru.com/data/thumbnails/939/bozkavak_agaci.jpglk">

<button>Göster/gizle</button>
<span>deneme-</span>
</body>
</html>