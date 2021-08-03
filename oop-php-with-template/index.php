<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>List Data Warga</title>

  <!-- Custom fonts for this template -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php
        // include("template/template.php");
        include("includes/myDb.php"); // include folder (mylib_warga/warga.lib.php)

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
                $pesangagalsimpan = false;
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
                // echo "<meta http-equiv ='refresh' content='1.5;url=index.php'>";
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

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LIST WARGA</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Warga
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="tambah_warga.php">
          <i class="fas fa-user-plus"></i>
          <span>Tambah Data Warga</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-folder-open"></i>
          <span>Data Warga</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Fikri Adi</span>
                <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 font-weight-bold text-dark">DATA WARGA</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="tambah_warga.php" class="btn btn-primary float-right"><i class="fas fa-user-plus mr-2"></i>Tambah
                Warga</a>
              <h5 class="m-0 font-weight-bold text-primary">Data Warga Terdaftar</h5>
            </div>
            <div class="card-body">
              <?php if(isset($pesansimpan)) : ?>
              <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                  <use xlink:href="#check-circle-fill" />
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </symbol>
                </svg>
                <div class="ml-2 font-weight-bold">
                  Data Berhasil Tersimpan
                </div>
              </div>
              <?php endif; ?>

              <?php if(isset($pesangagalsimpan)) : ?>

              <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                  <use xlink:href="#exclamation-triangle-fill" />
                  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                      d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  </symbol>
                </svg>
                <div class="ml-2 font-weight-bold">
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
                <div class="ml-2 font-weight-bold">
                  Data Berhasil Di Update
                </div>
              </div>
              <?php endif; ?>

              <?php if(isset($pesangagalupdate)) : ?>

              <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                  <use xlink:href="#exclamation-triangle-fill" />
                  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                      d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  </symbol>
                </svg>
                <div class="ml-2 font-weight-bold">
                  Anda Tidak Melakukan Update Data
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
                <div class="ml-2 font-weight-bold">
                  <?= $pesandelete; ?>
                </div>
              </div>
              <?php } ?>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataWarga">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Nomor KTP</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat Lahir</th>
                      <th>Alamat</th>
                      <th>Nomor HP</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Nomor KTP</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat Lahir</th>
                      <th>Alamat</th>
                      <th>Nomor HP</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
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
                            href="detail_warga.php?id=<?= $warga["id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                              width="22" height="22" fill="currentColor" class="bi bi-eye-fill text-white"
                              viewBox="0 1 16 16">
                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                              <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg></a>
                        </button>
                        <button class="btn btn-primary m-1"><a href="edit_data.php?update=<?= $warga["id"]; ?>"><svg
                              xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                              class="bi bi-pencil-fill text-white" viewBox="0 0 16 16">
                              <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                            </svg></a>
                        </button>
                        <button class="btn btn-danger m-1">
                          <a href="index.php?delete=<?= $warga["id"]; ?>"
                            onclick="return confirm('Yakin Ingin Menghapus?')"><svg xmlns="http://www.w3.org/2000/svg"
                              width="22" height="22" fill="currentColor" class="bi bi-trash-fill text-white"
                              viewBox="0 1 16 16">
                              <path
                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg></a>
                        </button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(() => {
      $('#dataWarga').DataTable();
    })
  </script>

</body>

</html>