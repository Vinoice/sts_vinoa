<?php 
require 'funcion.php';

require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Peminjaman Barang</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li> 
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">List</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="barang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang
                            </a>
                            <a class="nav-link" href="peminjaman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Peminjaman
                            </a> 
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                user
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Peminjaman</li>
                        </ol>
                      

                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambahkan Barang
                            </button>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>kode_barang</th>
                                            <th>nama_barang</th>
                                            <th>kategori</th>
                                            <th>merek</th>
                                            <th>jumlah</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $ambilsemuadatabarang = mysqli_query($conn,"select * from barang m, barang s where s.id = m.id");
                                    $i = 1;                          
                                    while($data=mysqli_fetch_array($ambilsemuadatabarang)){
                                    
                                        $kodebarang = $data['kodebarang'];
                                        $namabarang = $data['namabarang'];
                                        $kategori = $data['kategori'];
                                        $merek = $data['merek'];
                                        $jumlah = $data['jumlah'];
                                        $idb = $data['id'];
                                    
                                    ?>
                                           
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$kodebarang;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$kategori;?></td>
                                            <td><?=$merek;?></td>
                                            <td><?=$jumlah;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idb?>">
                                            Edit
                                        </button>
                                        <input type="hidden" name="hapusbarang" value="<?=$idb;?>">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idb?>">
                                            Delete
                                        </button>
                                            </td>
                                    </tr>

                                    <!--  edit Modal -->
                                <div class="modal fade" id="edit<?=$idb;?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Barang</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="number" name="kodebarang" value=<?=$kodebarang?> class="form-control" require>
                                    <br>
                                    <input type="text" name="namabarang" value=<?=$namabarang?> class="form-control" require>
                                    <br>
                                    <input type="text" name="kategori" value=<?=$kategori?> class="form-control" require>
                                    <br>
                                    <input type="text" name="merek" value=<?=$merek?> class="form-control" require>
                                    <br>
                                    <input type="number" name="jumlah" value=<?=$jumlah?> class="form-control" require>
                                    <br>
                                    <input type="hidden" name="idb" value="<?=$idb?>">
                                    <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                    </div>
                                    </form>

                                    </div>
                                </div>
                                </div>


                                 <!--  Delete Modal -->
                                 <div class="modal fade" id="delete<?=$idb;?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Barang?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus <?=$namabarang?>?
                                        <input type="hidden" name="idb" value="<?=$idb?>">
                                        <br>
                                        <br>
                                    <button type="sumbit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                    </div>
                                    </form>

                                    </div>
                                </div>
                                </div>


                                    <?php 
                                    }
                                    ?>

                                    

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
    <input type="number" name="kodebarang" placeholder="Kode Barang" class="form-control" require>
    <br>
    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" require>
    <br>
    <input type="text" name="kategori" placeholder="kategori" class="form-control" require>
    <br>
    <input type="text" name="merek" placeholder="Merek" class="form-control" require>
    <br>
    <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" require>
    <br>
    <button type="sumbit" class="btn btn-primary" name="addnewbarang">Sumbit</button>
      </div>
    </form>

    </div>
  </div>
</div>

</html>
