<?php 
include('mylib_warga/myDb.php');
$db = new DbWarga();
if(isset($_GET["update"])){
    $update_warga = $_GET["update"]; 
    $update = $db->get_by_id($update_warga);
}
else
{
    header('Location: index.php');
}

// if (isset($_POST["simpan_update"])) {
//     $id = $_POST["id"];
//     $nomor_ktp = $_POST["no_ktp"];
//     $nama = $_POST["nama_lengkap"];
//     $alamat = $_POST["alamat_lengkap"];
//     $nomor_hp = $_POST["no_hp"];
//     $tempatlahir = $_POST["tempat_lahir"];
//     $queryupdate = $db->update_data($id,$nomor_ktp,$nama,$alamat,$nomor_hp,$tempatlahir);
    
//     if($queryupdate)
//     {
//         header('Location:index.php');
//     }
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                <div class="card shadow">
                    <div class="card-header text-center bg-dark text-white">
                        <h3>UPDATE DATA WARGA</h3>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <input type="hidden" name="id" value="<?= $update["id"]; ?>">
                            <div class="form-floating mb-3">
                                <input type="number" name="no_ktp" class="form-control" id="no_ktp"
                                    placeholder="Nomor KTP" value="<?= $update["no_ktp"]; ?>">
                                <label for="no_ktp" class>Masukkan Nomor KTP</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                    placeholder="Nama Lengkap" value="<?= $update["nama_lengkap"]; ?>">
                                <label for="nama_lengkap">Masukkan Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                    placeholder="Tempat Lahir" value="<?= $update["tempat_lahir"]; ?>">
                                <label for="tempat_lahir">Masukkan Tempat Lahir</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" name="no_hp" class="form-control" id="no_hp"
                                    placeholder="Nomor HP" value="<?= $update["no_hp"]; ?>">
                                <label for="no_hp">Masukkan Nomor HandPhone</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap"
                                    placeholder="Alamat"><?= $update["alamat_lengkap"]; ?></textarea>
                                <label for="alamat_lengkap">Masukkan Alamat</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                <button class="btn btn-outline-primary fw-bold" type="submit"
                                    name="simpan_update">Update Data</button>
                            </div>
                        </form>
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