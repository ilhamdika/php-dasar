<?php

//require untuk menghubungkan ke file php lain

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

//DESC untuk mengurutkan sesuai dari id di database dari besar ke kecil
//ASC untuk mengurutkan sesuai dari id di database dari kecil ke besar


//tombol cari di klik
if (isset($_POST["cari"])) {
	$mahasiswa = cari ($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Admin</title>
</head>

<body>

	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php">tambah data mahasiswa</a>

<br>
<form action="" method="post">
	
	  <!-- 
	  autofocus= untuk jika membuka website form input langsung aktif
	  place holder= untuk memberi tanda/tulisan di dalam form
	  auto complete= untuk mematikan history pada form yang pernah di inputkan
	   -->
	<input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword" autocomplete="off">
	<button type="submit" name="cari">Cari</button>

</form>
 <br>
	<table border="1" cellpadding="10" cellspacing="0">

		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i = 1 ?>
		<?php foreach ($mahasiswa as $row) : ?>

			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="ubah.php?id=<?php echo	$row["id"]; ?>">ubah</a>|
					<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm ('yakin?')">hapus</a>
				</td>
				<td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
				<td><?php echo $row["nrp"]; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>

			</tr>
			<?php $i++; ?>
		<?php endforeach;  ?>
	</table>




</body>

</html>