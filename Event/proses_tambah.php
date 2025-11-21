<?php
    #1. Meng-koneksikan ke PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil value dari Form Tambah
    $nama_event = $_POST['nama_event'];
    $lokasi = $_POST['lokasi'];
    $tanggal_event = $_POST['tanggal_event'];
    $jumlah_peserta = $_POST['jumlah_peserta'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO event (nama_event,lokasi,tanggal_event,jumlah_peserta) 
    VALUES ('$nama_event', '$lokasi', '$tanggal_event', '$jumlah_peserta')";

    $tambah = mysqli_query($koneksi, $query);


    if($tambah){
        header("location:index.php");
    } else {
        echo "Gagal menambahkan event";
    }

?>