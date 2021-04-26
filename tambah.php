<?php include('config.php');?>

    <center><font size="6">Tambah Data Buku</font></center>
    <hr>
    <?php
    if(isset($_POST['submit'])){
        $Id =$_POST['Id'];
        $Judul_Buku =$_POST['Judul_Buku'];
        $Pengarang =$_POST['Pengarang'];
        $Penerbit =$_POST['Penerbit'];
        $Persediaan =$_POST['Persediaan'];

        $cek =mysqli_query($koneksi, "SELECT * FROM buku WHERE Id='$Id'")or die(mysqli_error($koneksi));

        if(mysqli_num_rows($cek)== 0){
            $sql = mysqli_query($koneksi, "INSERT INTO buku VALUES('$Id', '$Judul_Buku', '$Pengarang', '$Penerbit', '$Persediaan')") or die (mysqli_error($koneksi));
        
            if($sql){
                echo '<script>alert("Berhasil menambah data."); document.location="index.php?page=tampil_bku";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan tambah data.</div>';
            }
        }else{
            echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
        }
    }
    ?>
    <form action="index.php?page=tambah_bku" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Id" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Buku</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Judul_Buku" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pengarang</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Pengarang" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Penerbit" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Persediaan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Persediaan" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary " value="Simpan">
            </div>
        </div>
    </form>
