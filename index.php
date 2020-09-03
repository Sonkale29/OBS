<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
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
</script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="form-group">
    <label for="Fakülte">Fakülte Seçin</label>
  
	<select onchange="fakultefonk();" id="fakulteid" class="form-control">

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
	</form>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="form-group">
    <label for="Bolum">Bölüm Seçin</label>
	<select onchange="" id="bolumid" class="form-control">
	</select>
	</form>
	</div>
</div>
</div>

<div id="deneme">
</div>
</body>
</html>