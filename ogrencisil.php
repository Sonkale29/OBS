<?php
if(isset($_POST['id'])){
	if($_POST['id'] == 0){
	exit;
	}
$ogrenciid = $_POST['id'];
include 'mysqlconfig.php';

$baglanti = @mysql_connect($server, $user, $pass);
mysql_set_charset('utf8', $baglanti);
$veritabani = @mysql_select_db($db, $baglanti);
$ogrencisil = mysql_query("DELETE FROM ogrenciler WHERE id=$ogrenciid");

}
?>