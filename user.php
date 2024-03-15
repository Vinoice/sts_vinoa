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
        <title>User</title>
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
                        <h1 class="mt-4">User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Peminjaman Barang</li>
                        </ol>
                      

                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambahkan User
                            </button>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>noidentitas</th>
                                            <th>nama</th>
                                            <th>status</th>
                                            <th>username</th>
                                            <th>password</th>
                                            <th>role</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $ambilsemuadatauser = mysqli_query($conn,"select * from user u, user s where s.id = u.id");
                                    $i = 1;                          
                                    while($data=mysqli_fetch_array($ambilsemuadatauser)){
                                    
                                        $noidentitas = $data['noidentitas'];
                                        $nama = $data['nama'];
                                        $status = $data['status'];
                                        $username = $data['username'];
                                        $password = $data['password'];
                                        $role = $data["role"];
                                        $idb = $data['id'];
                                    
                                    ?>
                                           
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$noidentitas;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$status;?></td>
                                            <td><?=$username;?></td>
                                            <td><?=$password;?></td>
                                            <td><?=$role;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idb?>">
                                            Edit
                                        </button>
                                        <input type="hidden" name="hapuss" value="<?=$idb;?>">
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
                                        <h4 class="modal-title">Edit User</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                    <input type="number" name="noidentitas" value=<?=$noidentitas?> class="form-control" require>
                                    <br>
                                    <input type="text" name="nama" value=<?=$nama?> class="form-control" require>
                                    <br>
                                    <input type="text" name="status" value=<?=$status?> class="form-control" require>
                                    <br>
                                    <input type="text" name="username" value=<?=$username?> class="form-control" require>
                                    <br>
                                    <input type="text" name="password" value=<?=$password?> class="form-control" require>
                                    <br>
                                    <input type="text" name="role" value=<?=$role?> class="form-control" require>
                                    <br>
                                    <input type="hidden" name="idb" value="<?=$idb?>">
                                    <button type="submit" class="btn btn-primary" name="updateuser">Submit</button>
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
                                        <h4 class="modal-title">Hapus User?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <form method="post">
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus <?=$nama?>?
                                        <input type="hidden" name="idb" value="<?=$idb?>">
                                        <br>
                                        <br>
                                    <button type="sumbit" class="btn btn-danger" name="hapuss">Hapus</button>
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
        <h4 class="modal-title">User</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
    <input type="number" name="noidentitas" placeholder="No Identitas" class="form-control" require>
    <br>
    <input type="text" name="nama" placeholder="Nama" class="form-control" require>
    <br>
    <input type="text" name="status" placeholder="Status" class="form-control" require>
    <br>
    <input type="text" name="username" placeholder="Username" class="form-control" require>
    <br>
    <input type="text" name="password" placeholder="Password" class="form-control" require>
    <br>
    <input type="text" name="role" placeholder="role" class="form-control" require>
    <br>
    <button type="sumbit" class="btn btn-primary" name="addnewuser">Submit</button>
      </div>
    </form>

    </div>
  </div>
</div>

</html>
