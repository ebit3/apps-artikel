<?php

session_start();

// koneksi database
function koneksi()
{
    # code...

    $koneksi = mysqli_connect('localhost', 'root', '', 'dbs_artikel') or die(mysqli_error($koneksi));

    return $koneksi;
}


// add kategori
function add_kategori($data)
{
    # code...

    $conn = koneksi();

    $kategori = $data['kategori'];

    $sql = "INSERT INTO tb_kategori VALUES(NULL, '" . $kategori . "')";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:kategori.php');
    } else {

        echo "<script>alert('Tambah Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// show kategori
function show_kategori($query)
{
    # code...

    $conn = koneksi();

    $sql = mysqli_query($conn, $query);


    if (mysqli_num_rows($sql) === 1) {

        return mysqli_fetch_assoc($sql);
    } else {

        $rows = [];

        while ($row = mysqli_fetch_assoc($sql)) {
            # code...

            $rows[] = $row;
        }

        return $rows;
    }
}


// edit kategori
function edit_kategori($data)
{
    $conn = koneksi();

    $id = $data['id'];
    $kategori = $data['kategori'];

    $sql = "UPDATE tb_kategori SET kategori = '" . $kategori . "' WHERE id_kategori = '" . $id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:kategori.php');
    } else {

        echo "<script>alert('Edit Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// drop kategori
function drob_kategori($id)
{
    # code...

    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '" . $id . "' ");

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:kategori.php');
    } else {

        echo "<script>alert('Hapus Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// show pengguna
function show_user($query)
{
    # code...

    $conn = koneksi();

    $sql = mysqli_query($conn, $query);


    if (mysqli_num_rows($sql) === 1) {

        return mysqli_fetch_assoc($sql);
    } else {

        $rows = [];

        while ($row = mysqli_fetch_assoc($sql)) {
            # code...

            $rows[] = $row;
        }

        return $rows;
    }
}


// add user
function add_user($data)
{
    # code...

    $conn = koneksi();

    $nama = stripslashes($data['nama']);
    $user = stripslashes(strtolower($data['username']));
    $pass = mysqli_real_escape_string($conn, $data['password']);
    $role = $data['role'];

    $gambar = upload();

    if (!$gambar) {

        return false;
    }

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_user VALUES(NULL, '" . $nama . "', '" . $user . "', '" . $pass . "', '" . $gambar . "', '" . $role . "')";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:user.php');
    } else {

        echo "<script>alert('Tambah Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// funsi upload
function upload()
{
    # code...

    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];


    // gambar kosong
    if ($error == 4) {

        echo "<script>alert('Hapus Data Gagal');history.go(-1);</script>";

        return false;
    }


    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {

        echo "<script>alert('ekstensi gambar salah');history.go(-1);</script>";

        return false;
    }


    // cek type file
    if ($tipe_file !== 'image/jpeg' && $tipe_file !== 'image/png') {

        echo "<script>alert('Gambar anda salah');history.go(-1);</script>";

        return false;
    }


    // cek ukuran file
    if ($ukuran_file >= 4000000) {

        echo "<script>alert('Ukuran terlalu besar');history.go(-1);</script>";

        return false;
    }

    // berhasil
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    move_uploaded_file($tmp_file, 'images/' . $nama_file_baru);

    return $nama_file_baru;
}


// drop kategori
function drob_user($id)
{
    # code...

    $conn = koneksi();

    mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '" . $id . "' ");

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:user.php');
    } else {

        echo "<script>alert('Hapus Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}
