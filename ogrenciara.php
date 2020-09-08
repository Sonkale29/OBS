<?php
if(isset($_GET['q'])){
	
$query = trim($_GET['q']);
$i = 1;
include 'mysqlconfig.php';

$baglanti = @mysql_connect($server, $user, $pass);
mysql_set_charset('utf8', $baglanti);
$veritabani = @mysql_select_db($db, $baglanti);
$ogrenciler = mysql_query("SELECT * FROM ogrenciler WHERE ogrenci_adi LIKE '%$query%'");
echo '<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
	  <th scope="col">Öğrenci Numarası</th>
      <th scope="col">Adı Soyadı</th>
      <th scope="col">Sınıfı</th>
	  <th scope="col">TC Kimlik Numarası</th>
	  <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>';
while ($row = mysql_fetch_assoc($ogrenciler)) {
	
    echo '<tr>';
	echo '<th scope="row">'.$i.'</th>';
	echo '<td>'.$row['ogrenci_numara'].'</td>';
	echo '<td>'.$row['ogrenci_adi'].'</td>';
	echo '<td>'.$row['sinif'].'</td>';
	echo '<td>'.$row['tc_numara'].'</td>';
	echo '<td><button class="btn" value="'.$row['id'].'"><i class="fa fa-refresh"></i></button> <button class="btn"  value="'.$row['id'].'"><i class="fa fa-trash"></i></button></td>';
	$i++;
}
}