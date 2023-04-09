<?php
require 'functions.php';


//ambil data di url
$id= $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs=  query("SELECT * FROM mahasiswa WHERE id = $id" )[0];


//cek apakah sudah ditekan
if ( isset($_POST["submit"]) ){


	//cek data di ubah atau tidak
	if (ubah($_POST) > 0){
		echo "
		<script>
			alert ('Data berhasil diubah');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert ('Data gagal diubah');
			document.location.href = 'index.php';
		</script>
		";

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah data</title>
</head>
<body>
	<h1>Ubah data</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nrp"> NRP :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"];  ?>">
			</li>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama" value="<?= $mhs["nama"];  ?>">
			</li>
			<li>
				<label for="email"> Email :</label>
				<input type="text" name="email" id="email" value="<?= $mhs["email"];  ?>">
			</li>
			<li>
				<label for="jurusan"> Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"];  ?>">
			</li>
			<li>
				<label for="gambar"> Gambar :</label>
				<img src="img/<?= $mhs['gambar']; ?> " width= "100"><br>
				<input type="file" name="gambar" id="gambar"  ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah</button>
			</li>
		</ul>

	</form>



</body>
</html>