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


function tambah($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    //non aktifkan user meng input code html (htmlspecialchars)
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if (!$gambar){
        return false;
    }

    $query = "INSERT INTO mahasiswa values ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4){
        echo "<script>
        alert('pilih gambar dulu')

        </script>";
        return false;
    }   

    // cek apakah yang di upload gambar
    $ekstensiGambarValid =['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('bukan gambar wleee')

        </script>";
    }

    //cek jika ukuranya terlalu besar
    if ($ukuranFile >100000000){
        echo "<script>
        alert('terlalu besar')

        </script>";
    }

    //lolos pengecekan, gambar siap di upload
    // bikin nama baru untuk gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;



    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFileBaru;


}


function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");


    return mysqli_affected_rows($conn);
}



function ubah($data){
    global $conn;
    $id= $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES ['gambar']['error']=== 4){
        $gambar = $gambarLama;
        }else {
            $gambar = upload();
        }
  
    

    $query = "UPDATE mahasiswa SET 
            nrp= '$nrp',
            nama = '$nama',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id=$id
            ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}


function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$keyword%' OR 
    nrp LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR 
    jurusan LIKE '%$keyword%'
    ";
    return query($query);
}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data ["password"]);
    $password2 = mysqli_real_escape_string($conn,$data ["password2"]);




    //cek username ada yang sama


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username ada yang sama');
        </script>";
        return false;
    }

    //cek konfirmasi
    if ($password !== $password2){
        echo "<script>
            alert('password tidak sama');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);



    //tambahkan user baru ke data base
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}






?>