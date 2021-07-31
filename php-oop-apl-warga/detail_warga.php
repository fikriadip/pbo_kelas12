<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<?php
    include('mylib_warga/myDb.php');
    $db= new DbWarga();
    $idwarga = $_GET['id'];
    $detail = $db->get_by_id($idwarga);
    //print_r($data);
?>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-8 col-lg-10 col-md-10 col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>DETAIL DATA WARGA</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>No ID Warga</th>
                                <td><?= $detail['id']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor KTP Warga</th>
                                <td><?= $detail['no_ktp']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap Warga</th>
                                <td><?= $detail['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap Warga</th>
                                <td><?= $detail['alamat_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir Warga</th>
                                <td><?= $detail['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor HP Warga</th>
                                <td><?= $detail['no_hp']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><a href="index.php" class="btn btn-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            fill="currentColor" class="bi bi-arrow-left-circle-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                        </svg> Kembali</a></td>
                            </tr>
                        </table>

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