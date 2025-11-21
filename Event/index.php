<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/all.css">    
</head>

<body style="background-color:#232954">
    <?php
    include_once("../navbar.php");
    ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>Event Tersedia</b>
                        <a href="form_tambah.php" class="float-end btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Tambah event</a>
                    </div>
                    <div class="card-body" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <?php
                            include_once("../koneksi.php");

                            $qry = "SELECT * FROM event";

                            $tampil = mysqli_query($koneksi, $qry);

                            $nomor = 1;
                            foreach ($tampil as $data) {
                                ?>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <th scope="row"><?= $nomor++ ?></th>
                                        <td><?= $data['nama_event'] ?></td>
                                        <td><?= $data['lokasi'] ?></td>
                                        <td><?= $data['tanggal_event'] ?></td>
                                        <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id_event'] ?>"><i class="fa-solid fa-globe"></i></button>
                                        <a href="form_edit.php?id_event=<?=$data['id_event']?>" class="btn btn-info btn-sm"><i class="fa-solid fa-folder-plus"></i></a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $data['id_event'] ?>"><i class="fa-solid fa-folder-minus"></i></button>

                                        <!--Modal Detail-->
                                        <div class="modal fade" id="exampleModal<?= $data['id_event'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Detail
                                                                <?= $data['nama_event'] ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Nama event</td>
                                                                        <th scope="row"><?= $data['nama_event'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Lokasi</td>
                                                                        <th scope="row"><?= $data['lokasi'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal</td>
                                                                        <th scope="row"><?= $data['tanggal_event'] ?></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah Peserta</td>
                                                                        <th scope="row"><?= $data['jumlah_peserta'] ?></th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--Modal Hapus-->
                                            <div class="modal fade" id="modalhapus<?= $data['id_event'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin Data Dengan Nama <?= $data['nama_event'] ?> Ingin Dihapus?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="proseshapus.php?id=<?=$data['id_event']?>" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                    </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>
            <script src="../js/all.js"></script>
</body>

</html>