<?php
//koneksi ke databse
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query){
	global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
    	$rows[] = $row;
    }
    return $rows;
}


function data($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    $nrp = $data["nrp"];
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    $query = "INSERT INTO mahasiswa values ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


?>