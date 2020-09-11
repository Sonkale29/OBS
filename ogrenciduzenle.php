<?php
if(isset($_POST['id'])){
	$ogrenciid = $_POST['id'];
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
	$ogrenciekle = mysql_query("UPDATE ogrenciler SET id='$ogrenciid', fakulte_id='$fakulteid', fakulte_adi='$fakulteadi', ogrenci_numara='$ogrnum', ogrenci_adi= '$ogrenciad', tc_numara= '$tcnum', sinif= '$sinif', bolum_id='$bolumid' ,bolum_adi='$bolumadi' WHERE id = $ogrenciid");
	if (!$ogrenciekle) {
    die('ÖĞRENCİ EKLENEMEDİ. HATA KODU: ' . mysql_error());
	}
	
	exit;
}

if(isset($_GET['id'])){
	$ogrenciidsi = $_GET['id'];
	include 'mysqlconfig.php';

	$baglanti = @mysql_connect($server, $user, $pass);
	mysql_set_charset('utf8', $baglanti);
	$veritabani = @mysql_select_db($db, $baglanti);
	$ogrencibul = mysql_query("SELECT * FROM ogrenciler WHERE id = $ogrenciidsi ");
	while ($row = mysql_fetch_assoc($ogrencibul)) {
		$ogrenciid = $row['id'];
		$fakulteid = $row['fakulte_id'];
		$fakulteadi = $row['fakulte_adi'];
		$ogrencinum = $row['ogrenci_numara'];
		$ogrenciadi = $row['ogrenci_adi'];
		$tcnum = $row['tc_numara'];
		$sinif = $row['sinif'];
		$bolumid = $row['bolum_id'];
		$bolumadi = $row['bolum_adi'];
	}
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

</script>
</head>
<body>

<div class="container">
<form id="ogrenciekle" action="./ogrenciduzenle.php" method="post">
	<div class="col">
	   <label for="adsoyad">Ad Soyad</label>
      <input name="name" type="text" class="form-control col-md-6" value="<?php echo $ogrenciadi;?>" required />
	</div>
	<div class="col">
	   <label for="fakulte">Fakültesi</label>
    	<select onchange="fakultefonk();" id="fakulteid" class="form-control" name="fakulteid" required />
		<option value=""></option>
<?php

$fakulteler = mysql_query('SELECT fakulte_adi, id FROM fakulteler');
while ($row = mysql_fetch_assoc($fakulteler)) {
	if($fakulteid == $row['id']){
    echo '<option value="'.$row['id'].'" selected>'.$row['fakulte_adi']."</option>";
	}
	else{
		echo '<option value="'.$row['id'].'">'.$row['fakulte_adi']."</option>";
	}
}
?>
	</select>
    </div>
	<div class="col">
	   <label for="bolum">Bölümü</label>
		<select name="bolumid" id="bolumid" class="form-control" required />
		<option value=""></option>
<?php

$bolumler = mysql_query("SELECT * FROM bolumler WHERE fakulte_id = $fakulteid ");
while ($row = mysql_fetch_assoc($bolumler)) {
	if($bolumid == $row['bolum_id']){
    echo '<option value="'.$row['bolum_id'].','.$fakulteid.'" selected>'.$row['bolum_adi']."</option>";
	}
	else{
		 echo '<option value="'.$row['bolum_id'].','.$fakulteid.'">'.$row['bolum_adi']."</option>";
	}
}
?>
		</select>
    </div>
	<div class="col">
	   <label for="tckimlik">TC Kimlik</label>
      <input type="number" class="form-control col-md-6" id="tcnum" name="tcnum" value="<?php echo $tcnum;?>" required />
    </div>
	<div class="col">
	   <label for="okulno">Okul Numarası</label>
      <input type="number" class="form-control col-md-6" id="okulno" name="okulno" value="<?php echo $ogrencinum;?>" required />
    </div>
	<div class="col">
	   <label for="sinif">Sınıf</label>
      <select name="sinif" id="sinif" class="form-control col-md-3" required />
<?php
for($i=1; $i<5; $i++){
	if($sinif == $i){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else{
	echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
	  </select>
    </div>
	  <input type="hidden" id="id" name="id" value="<?php echo $ogrenciid;?>">

	<div class="col-md-3 offset-md-9">
    <button type="submit" id="ogrencibut"class="btn btn-primary">Ekle</button><button type="button" class="btn btn-primary" onclick="reset()">Temizle</button>
	</div>
</form>
</div>

</body>
</html>