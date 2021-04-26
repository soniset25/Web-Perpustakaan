<?php
//memasukan file config,php
include('config.php');
?>

<div class="container" style="margin-top:20px">
    <center><font size="6">Data Buku</font></center>
    <hr>
    <a href="index.php?page=tambah_bku"><button class="btn btn-dark right">Tambah Data</button></a>
    <div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
        <thead>
            <tr>
                <th>No.</th>
                <th>Id Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Persediaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY Id DESC") or die(mysqli_error($koneksi));

            if(mysqli_num_rows($sql) > 0){

                $no = 1;

                while($data = mysqli_fetch_assoc($sql)){

                    echo'
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$data['Id'].'</td>
                        <td>'.$data['Judul_Buku'].'</td>
                        <td>'.$data['Pengarang'].'</td>
                        <td>'.$data['Penerbit'].'</td>
                        <td>'.$data['Persediaan'].'</td>
                        <td>
                            <a href="index.php?page=edit_bku&Id='.$data['Id'].'" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="delete.php?Id='.$data['Id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                        </td>
                    </tr>
                    ';
                    $no++;
                }
                //jika query menghasilkan nilai 0    
            }else {
                echo '
                <tr>
                    <td colspan="6">Tidak ada data.</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>
    </div>
</div>