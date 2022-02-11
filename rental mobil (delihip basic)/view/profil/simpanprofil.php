<?php
	include_once("../../function.php");
?>
<?php
              session_start();
              if (!isset($_SESSION["email"]))
                header("Location: ../login/login.php?error=4");
              ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../../style.css">
    <title>Penyimpanan Data Profil Delichip</title>
  </head>
  <body>
  <?php
if(isset($_POST["simpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$namapelanggan  =$db->escape_string($_POST["namapelanggan"]);
		$email		=$db->escape_string($_POST["email"]);
		$password =$db->escape_string($_POST["password"]);

        $nopelanggan=$_SESSION["no_pelanggan"];
		// Susun query insert
		$sql="UPDATE pelanggan SET nama_pelanggan='$namapelanggan',email='$email',password='$password' WHERE no_pelanggan='$nopelanggan'";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				<br>
				<br>
				<center>
<div class="card" style="width: 25rem;">
<center>
<h5 class="card-header">Update Profil Sudah Berhasil</h5>
  <div class="card-footer ">
  <a class="btn btn-primary" href="../profil.php" role="button">OKE</a>
  </div>
</center>
  
</div>
</center>
<?php
}
} 
else {
?>
<p>Data gagal disimpan karena nomor mungkin sudah ada.<br></p>
<a href="javascript:history.back()"><button>Kembali</button></a>
<?php
}
} else
echo "database error";
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>