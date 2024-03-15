<?php 
session_start();

$conn = mysqli_connect("localhost","root","","peminjaman");

//tambah barang
if(isset($_POST['addnewbarang'])){
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $jumlah = $_POST['jumlah'];

    $addtotable = mysqli_query($conn,"insert into barang (kodebarang, namabarang, kategori, merek, jumlah) values('$kodebarang','$namabarang','$kategori','$merek','$jumlah')");
    if($addtotable){
        header('location:barang.php');
    } else {
        echo 'gagal';
        header('location:barang.php');
    }

}

// if(isset($_POST['addnewuser'])){
//     $no_identitas = $_POST['noidentitas'];
//     $nama = $_POST['nama'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $role = $_POST['role'];

//     $addtotable = mysqli_query($conn,"insert into user (noidentitas, nama, username, password, role) values('$noidentitas','$nama','$username','$passwrod','$role)");
//     if($addtotable){
//         header('location:user.php');
//     } else {
//         echo 'gagal';
//         header('location:user.php');
//     }

// }



//menbah stok barang
// if(isset($_POST['pinjambarang'])){
//     $barangnya = $_POST['barangnya'];
//     $jumlah = $_POST['jumlah'];
//     $keperluan = $_POST['keperluan'];

// $cekjumlahsekarang = mysqli_query($conn,"select * form barang where idbarang='$barangnya'");
// $ambildatanya = mysqli_fetch_array($cekjumlahsekarang);

// $stoksekarang = $ambildatanya['jumlah'];
// $tambahkanjumlahsekarangdenganjumlah = $stoksekarang+$jumlah;

//     $addtopeminjaman = mysqli_query($conn,"insert into peminjaman (namabarang, jumlah, keperluan) values('$barangnya','$jumlah','$keperluan')");
//     $updatebarang = mysqli_query($conn,"update jumlah set jumlah='$tambahkanjumlahsekarangdenganjumlah' where jumlah='$barangnya'");
//     if($addtopeminjaman&&$updatebarang){
//         header('location:peminjam.php');
//     } else {
//         echo 'gagal';
//         header('location:peminjam.php');
//     }
// }



//update barang

if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $kategori = $_POST['kategori'];
    $merek = $_POST['merek'];
    $jumlah = $_POST['jumlah'];

    $update = mysqli_query($conn,"update barang set kodebarang='$kodebarang', namabarang='$namabarang', kategori='$kategori', merek='$merek', jumlah='$jumlah' where id='$idb'");
    if($update){
    header('location:barang.php');
    } else {
        echo 'gagal';
        header('location:barang.php');
    }
}

//hapus barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from barang where id='$idb'");
    if($update){
    header('location:barang.php');
    } else {
        echo 'gagal';
        header('location:barang.php');
    }
}

//Tabel untuk peminjaman
if(isset($_POST['addpinjam'])){
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];
    $noidentitas = $_POST['noidentitas'];
    $kodebarang =$_POST['kodebarang'];
    $jumlah =$_POST['jumlah'];
    $keperluan = $_POST['keperluan'];
    $idlogin = $_POST['idlogin'];
    $status = $_POST['status'];
    $namabarang = $_POST['namabarang'];
    

    $addtotables = mysqli_query($conn,"insert into peminjaman (tglpinjam, tglkembali, noidentitas, kodebarang, jumlah, keperluan, idlogin, status, namabarang) values('$tglpinjam','$tglkembali','$noidentitas','$kodebarang','$jumlah','$keperluan','$idlogin','$status','$namabarang')");
    if($addtotables){
        header('location:peminjaman.php');
    } else {
        echo 'gagal';
        header('location:peminjaman.php');
    }

}
//update barang

if(isset($_POST['updatepeminjam'])){
    $idb = $_POST['idb'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];
    $noidentitas = $_POST['noidentitas'];
    $kodebarang =$_POST['kodebarang'];
    $jumlah =$_POST['jumlah'];
    $keperluan = $_POST['keperluan'];
    $idlogin = $_POST['idlogin'];
    $status = $_POST['status'];
    $namabarang = $_POST['namabarang'];

    $update = mysqli_query($conn,"update peminjaman set tglpinjam='$tglpinjam', tglkembali='$tglkembali', noidentitas='$noidentitas', kodebarang='$kodebarang', jumlah='$jumlah', keperluan='$keperluan', idlogin='$idlogin', status='$status', namabarang='$namabarang' where id='$idb'");
    if($update){
    header('location:peminjaman.php');
    } else {
        echo 'gagal';
        header('location:peminjaman.php');
    }
}

//hapus barang
if(isset($_POST['hapuspeminjam'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from barang where id='$idb'");
    if($update){
    header('location:peminjaman.php');
    } else {
        echo 'gagal';
        header('location:peminjaman.php');
    }
}



//Tabel untuk User
if(isset($_POST['addnewuser'])){
    $noidentitas = $_POST['noidentitas'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $role = $_POST['role'];
    
    $addtotablet = mysqli_query($conn,"insert into user (noidentitas, nama, status, username, password, role) values('$noidentitas','$nama','$status','$username','$password','$role')");
    if($addtotablet){
        header('location:user.php');
    } else {
        echo 'gagal';
        header('location:user.php');
    }

}

if(isset($_POST['updateuser'])){
    $idb = $_POST['idb'];
    $noidentitas = $_POST['noidentitas'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $username = $_POST['usename'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $update = mysqli_query($conn,"update user set noidentitas='$noidentitas', nama='$nama', status='$status', username='$username', password='$password', role='$role' where id='$idb'");
    if($update){
    header('location:user.php');
    } else {
        echo 'gagal';
        header('location:user.php');
    }
}


//hapus barang
if(isset($_POST['hapuss'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from user where id='$idb'");
    if($update){
    header('location:user.php');
    } else {
        echo 'gagal';
        header('location:user.php');
    }
}

?>