<?php 
if(isset($_POST['id'])){
$fakulte_id = $_POST['id'];

include 'mysqlconfig.php';

$baglanti = @mysql_connect($server, $user, $pass);
mysql_set_charset('utf8', $baglanti);
$veritabani = @mysql_select_db($db, $baglanti);
$bolumler = mysql_query("SELECT * FROM bolumler WHERE fakulte_id = $fakulte_id ");

while ($row = mysql_fetch_assoc($bolumler)) {
    echo '<option value="'.$row['bolum_id'].'">'.$row['bolum_adi']."</option>";
}
}

?>