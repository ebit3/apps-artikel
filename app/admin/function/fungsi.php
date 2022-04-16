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

        echo "berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// show kategori
function show_kategori($query)
{
    # code...

    $conn = koneksi();
}
