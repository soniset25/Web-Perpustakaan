<?php include('config.php');?>

    <div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>
    <hr>
    <?php
    if(isset($_GET['Id'])){
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $Id = $_GET['Id'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM buku WHERE Id='$Id'") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if(mysqli_num_rows($select) == 0){
            echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
            exit();
        //jika hasil query > 0
        }else{
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>
    <?php
    if(isset($_POST['submit'])){
        $Id =$_POST['Id'];
        $Judul_Buku =$_POST['Judul_Buku'];
        $Pengarang =$_POST['Pengarang'];
        $Penerbit =$_POST['Penerbit'];
        $Persediaan =$_POST['Persediaan'];

        $sql = mysqli_query($koneksi, "UPDATE buku SET Id='$Id', Judul_Buku='$Judul_Buku', Pengarang='$Pengarang', Penerbit='$Penerbit', Persediaan='$Persediaan' WHERE  Id='$Id'") or die(mysqli_error($koneksi));

        if($sql){
			echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_bku";</script>';
		}else{
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		
        }
    }
    ?>
    <form action="index.php?page=edit_bku&Id=<?php echo $Id; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Id" class="form-control" size="4" value="<?php echo $data['Id']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Judul Buku</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Judul_Buku" class="form-control" value="<?php echo $data['Judul_Buku']; ?>" required>
			</div>
		</div>
        <div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Pengarang</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="Pengarang" class="form-control" value="<?php echo $data['Pengarang']; ?>" required>
			</div>
		</div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Penerbit" class="form-control" value="<?php echo $data['Penerbit']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Persediaan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Persediaan" class="form-control" value="<?php echo $data['Persediaan']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_bku" class="btn btn-warning">Kembali</a>
				</div>
			</div>
    </form>
