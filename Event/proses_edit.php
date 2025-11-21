<?php
    #1. Meng-koneksikan ke PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil value dari Form Tambah
    $id_event = $_POST["id_event"];
    $nama_event = $_POST['nama_event'];
    $lokasi = $_POST['lokasi'];
    $tanggal_event = $_POST['tanggal_event'];
    $jumlah_peserta = $_POST['jumlah_peserta'];

    #3. Query Insert (proses tambah data)
    $query = "UPDATE event SET nama_event='$nama_event', lokasi='$lokasi', tanggal_event='$tanggal_event', jumlah_peserta='$jumlah_peserta' 
    WHERE id_event='$id_event'";

    $tambah = mysqli_query($koneksi, $query);


    if($tambah){
        header("location:index.php");
    } else {
        echo "Gagal mengubah event";
    }

?>