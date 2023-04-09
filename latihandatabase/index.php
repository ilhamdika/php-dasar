<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//ambil data dari tabel mahasiswa/query data


//ambil data(fetch) mahasiswa dari object result
//mysqli_fetch_row() //mengembalikan array numeric (menggunakan angka)
//msqli_fetch_assoc() ///mengembalikan array asosiatif (menggunakan nama)
//mysqli_fetch_array() // mengembalikan array (boleh pakai angka dan nama) KELEMAHAN: DATA DOBEL
//mysqli_fetch_object() // cara penggunaan (var_dump($mhs->nama))

//while  ($mhs = mysqli_fetch_assoc($result)){
//var_dump($mhs);
//}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Admin</title>
</head>

<body>

	<h1>Daftar Mahasiswa</h1>


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
					<a href="">ubah</a>|
					<a href="">hapus</a>
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