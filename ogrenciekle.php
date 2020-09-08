<?php
if(isset($_POST['name'])){
	$ogrenciad = $_POST['name'];
	$fakulteid = $_POST['fakulteid'];
	switch ($fakulteid) {
		case 1:
		$fakulteadi = "İLAHİYAT FAKÜLTESİ";
		break;
		case 2:
		$fakulteadi = "MÜHENDİSLİK FAKÜLTESİ";
		break;
		case 3:
		$fakulteadi = "İLETİŞİM FAKÜLTESİ";
		break;
		case 4:
		$fakulteadi = "TIP FAKÜLTESİ";
		break;
		case 5:
		$fakulteadi = "HUKUK FAKÜLTESİ";
		break;
		case 6:
		$fakulteadi = "EĞİTİM FAKÜLTESİ";
		break;
		case 7:
		$fakulteadi = "GÜZEL SANATLAR FAKÜLTESİ";
		break;
}
	$bolumid = $_POST['bolumid'][0];
	switch ($bolumid) {
		case 1:
		$bolumadi = "FELSEFE VE DİN BİLİMLERİ";
		break;
		case 2:
		$bolumadi = "TEMEL İSLAM BİLİMLERİ";
		break;
		case 3:
		$bolumadi = "ÇEVRE MÜHENDİSLİĞİ";
		break;
		case 4:
		$bolumadi = "BİLGİSAYAR MÜHENDİSLİĞİ";
		break;
		case 5:
		$bolumadi = "GAZETECİLİK";
		break;
		case 6:
		$bolumadi = "RADYO TELEVİZYON VE SİNEMA";
		break;
		case 7:
		$bolumadi = "TIP";
		break;
		case 8:
		$bolumadi = "HUKUK";
		break;
		case 9:
		$bolumadi = "ADALET";
		break;
		case 10:
		$bolumadi = "SINIF ÖĞRETMENLİĞİ";
		break;
		case 11:
		$bolumadi = "MATEMATİK ÖĞRETMENLİĞİ";
		break;
		case 12:
		$bolumadi = "RESİM";
		break;
		case 13:
		$bolumadi = "MÜZİK";
		break;
}
	$tcnum = $_POST['tcnum'];
	$ogrnum = $_POST['okulno'];
	$sinif = $_POST['sinif'];
	include 'mysqlconfig.php';

	$baglanti = @mysql_connect($server, $user, $pass);
	mysql_set_charset('utf8', $baglanti);
	$veritabani = @mysql_select_db($db, $baglanti);
	$ogrenciekle = mysql_query("INSERT INTO ogrenciler (id, fakulte_id, fakulte_adi, ogrenci_numara, ogrenci_adi, tc_numara, sinif, bolum_id, bolum_adi) VALUES (NULL, '$fakulteid', '$fakulteadi', '$ogrnum', '$ogrenciad', '$tcnum', '$sinif', '$bolumid', '$bolumadi')");
	if (!$ogrenciekle) {
    die('ÖĞRENCİ EKLENEMEDİ. HATA KODU: ' . mysql_error());
}

	echo '<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
  <style>
.my-auto {
 margin-top: auto;
margin-bottom: auto;
}
</style>
  </style>
  </head>
  <body>
  <div class="row h-100">
   <div class="col-sm-12 my-auto">
     <div class="">ÖĞRENCİ BAŞARIYLA EKLENDİ</div>
   </div>
</div>
  <div>
  <button type="button" class="btn btn-primary btn-lg" onclick="window.close()">Sayfayı Kapat</button>
  </div>
  </div>
  </body>
</html>';
	exit;
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
function fakultefonk() {
   var fakulteidsi = $('#fakulteid option:selected').val()

    $.ajax({
        type: "POST",
        url: "bolumlist.php",
        data: "id=" + fakulteidsi,
		success: function (data) {
            $("#bolumid").html(data);
        },
    });
}

function reset() {
  document.getElementById("ogrenciekle").reset();
}

if(document.getElementById('ogrencibut').clicked == true)
{
   alert("button was clicked");
}
</script>
</head>
<body>

<div class="container">
<form id="ogrenciekle" action="./ogrenciekle.php" method="post">
	<div class="col">
	   <label for="adsoyad">Ad Soyad</label>
      <input name="name" type="text" class="form-control col-md-6"  required />
	</div>
	<div class="col">
	   <label for="fakulte">Fakültesi</label>
    	<select onchange="fakultefonk();" id="fakulteid" class="form-control" name="fakulteid" required />
		<option value=""></option>
<?php
include 'mysqlconfig.php';

$baglanti = @mysql_connect($server, $user, $pass);
mysql_set_charset('utf8', $baglanti);
$veritabani = @mysql_select_db($db, $baglanti);
$fakulteler = mysql_query('SELECT fakulte_adi, id FROM fakulteler');
while ($row = mysql_fetch_assoc($fakulteler)) {
    echo '<option value="'.$row['id'].'">'.$row['fakulte_adi']."</option>";
}
?>
	</select>
    </div>
	<div class="col">
	   <label for="bolum">Bölümü</label>
		<select name="bolumid" id="bolumid" class="form-control" required />
		</select>
    </div>
	<div class="col">
	   <label for="tckimlik">TC Kimlik</label>
      <input type="number" class="form-control col-md-6" id="tcnum" name="tcnum" placeholder="" required />
    </div>
	<div class="col">
	   <label for="okulno">Okul Numarası</label>
      <input type="number" class="form-control col-md-6" id="okulno" name="okulno" placeholder="" required />
    </div>
	<div class="col">
	   <label for="sinif">Sınıf</label>
      <select name="sinif" id="sinif" class="form-control col-md-3" required />
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  </select>
    </div>
	<div class="col-md-3 offset-md-9">
    <button type="submit" id="ogrencibut"class="btn btn-primary">Ekle</button><button type="button" class="btn btn-primary" onclick="reset()">Temizle</button>
	</div>
</form>
</div>

</body>
</html>