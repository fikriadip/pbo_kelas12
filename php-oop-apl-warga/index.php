<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php // include folder (mylib_warga/warga.lib.php)
        include("mylib_warga/myDb.php");

        $db = new DbWarga();
        $data_warga = $db->show();
        // print_r($data_warga);

        if (isset($_POST['simpan_data'])) {
            $noktp = $_POST["no_ktp"];
            $nama = $_POST["nama_lengkap"];
            $alamat = $_POST["alamat_lengkap"];
            $nohp = $_POST["no_hp"];
            $tempatlahir = $_POST["tempat_lahir"];

            $querysimpan = $db->add_data($noktp,$nama,$alamat,$nohp,$tempatlahir);
            // print_r($_POST);

            // Fikri
            if ($querysimpan) {
                $pesansimpan = true;
                echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
            } else {
                $pesangagalsimpan = error;
            }
            
        }

        if (isset($_POST["simpan_update"])) {
            $id = $_POST["id"];
            $nomor_ktp = $_POST["no_ktp"];
            $nama = $_POST["nama_lengkap"];
            $alamat = $_POST["alamat_lengkap"];
            $nomor_hp = $_POST["no_hp"];
            $tempatlahir = $_POST["tempat_lahir"];
            $queryupdate = $db->update_data($id,$nomor_ktp,$nama,$alamat,$nomor_hp,$tempatlahir);
            
            if ($queryupdate) {
                $pesanupdate = true;
                echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
            } else {
                $pesangagalupdate = false;
                // echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
            } 
        }

        if (isset($_GET["delete"])) {
            // echo "Data dengan ID :".$_GET["delete"]." akan dihapus"; 
            $idwarga = $_GET["delete"];
            $queryhapus = $db->delete($idwarga);
            if ($queryhapus) {
                $pesandelete = "Data Berhasil Dihapus";
                echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
            } else {
                $pesandelete = "Data Gagal Dihapus";
                echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
            }
            
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <div class="card shadow-sm mt-4">
                    <div class="card-header">
                        <h2 class="bg-light text-center">DATA WARGA</h2>
                    </div>
                    <div class="card-body">
                        <a href="tambah_warga.php" class="btn btn-primary mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-person-plus-fill" viewBox="0 1 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg> Tambah Data Warga</a>

                        <?php if(isset($pesansimpan)) : ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                            </svg>
                            <div class="fw-bold">
                                Data Berhasil Tersimpan
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($pesangagalsimpan)) : ?>

                        <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="fw-bold">
                                Data Gagal Tersimpan
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($pesanupdate)) : ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                            </svg>
                            <div class="fw-bold">
                                Data Berhasil Di Update
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(isset($pesangagalupdate)) : ?>

                        <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>
                            <div class="fw-bold">
                                Anda Tidak Melakukan Update Data
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>

                        <?php if (isset($_GET["delete"])) { ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#check-circle-fill" />
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                            </svg>
                            <div class="fw-bold">
                                <?= $pesandelete; ?>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tr class="text-center bg-dark text-white">
                                    <th>No</th>
                                    <th>No KTP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Tempat Lahir</th>
                                    <th>Action</th>
                                </tr>

                                <?php 
                    $no = 0;
                    foreach($data_warga as $warga)
                    { 
                    $no++;
                ?>
                                <tr>
                                    <th class="text-center"><?= $no ?></th>
                                    <td><?= $warga["no_ktp"]; ?></td>
                                    <td><?= $warga["nama_lengkap"]; ?></td>
                                    <td><?= $warga["alamat_lengkap"]; ?></td>
                                    <td><?= $warga["no_hp"]; ?></td>
                                    <td><?= $warga["tempat_lahir"]; ?></td>
                                    <td align="center"><button class="btn btn-info m-1"><a
                                                href="detail_warga.php?id=<?= $warga["id"]; ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    fill="currentColor" class="bi bi-eye-fill text-white"
                                                    viewBox="0 1 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg></a>
                                        </button>
                                        <button class="btn btn-primary m-1"><a
                                                href="edit_data.php?update=<?= $warga["id"]; ?>"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    fill="currentColor" class="bi bi-pencil-fill text-white"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg></a>
                                        </button>
                                        <button class="btn btn-danger m-1">
                                            <a href="index.php?delete=<?= $warga["id"]; ?>"
                                                onclick="return confirm('Yakin Ingin Menghapus?')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    fill="currentColor" class="bi bi-trash-fill text-white"
                                                    viewBox="0 1 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>