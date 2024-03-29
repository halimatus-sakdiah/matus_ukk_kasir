<?php
include "header.php";

if($_SESSION['level'] == "2"){
    header("location:../petugas/index.php");
}

include "navbar.php";
?>

<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
            Tambah Data
        </button>
    </div>

    <div class="card-body">
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="simpan"){ ?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Disimpan
            </div>
            <?php } ?>

            <?php if($_GET['pesan']=="update"){ ?>
                    <div class="alert alert-success" role="alert">
                        Data Berhasil Disimpan
                    </div>
            <?php } ?>

            <?php if($_GET['pesan']=="hapus"){ ?>
                    <div class="alert alert-success" role="alert">
                        Data Berhasil DiHapus
                    </div>
            <?php } ?>
       


<?php if($_GET['pesan']=="hapus"){ ?> 
    <div class="alert alert-success" role="alert">
        Data berhasil dihapus
    </div>
<?php } ?>
<?php 
        }
        ?>


<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Akses Petugas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM petugas");
        while($d = mysqli_fetch_array($data)){  ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['Nama'] ?></td>
            <td><?= $d['Username'] ?></td>

            <td>
                <?php
                if ($d['level'] == '1'){  ?>
                Administrator
                <?php } else { ?>
                    Petugas
               <?php } ?>
            </td>

            <td>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['petugas_id'] ?>">
                    Edit 
                    </button>

                    <?php
                    if($d['level'] == $_SESSION['level']){ ?>
                    <?php } else { ?>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['petugas_id'] ?>">
                    Hapus
                    </button>
                    <?php } ?>
            </td>
        </tr>





          <!-- modal edit data -->
          <div class="modal fade" id="edit-data<?php echo $d['petugas_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="proses_update_petugas.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Nama petugas</label>
                                    <input type="hidden" name="petugas_id" value="<?php echo $d['petugas_id']; ?>">
                                    <input type="text" name="Nama" class="form-control" value="<?php echo $d['Nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Username</label>
                                    <input type="text" name="Username" class="form-control" value="<?php echo $d['Username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Paaword</label>
                                    <small class="text-danger text-sm">* Kosongkan kalau tidak merubah password</small>
                                    <input type="Password" name="Password" class="form-control" value="<?php echo $d['Password'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Akses Petugas</label>

                                    <select name="level" class="form-control">
                                        <option>--- Pilih akses---</option>
                                        <option value="1" <?php if ($d['level'] == '1') { echo "selected"; }?>>Administrator</option>
                                        <option value="2" <?php if ($d['level'] == '2') { echo "selected"; }?>>Petugas</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- modah hapus data -->
            <div class="modal fade" id="hapus-data<?php echo $d['petugas_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="proses_hapus_petugas.php" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="petugas_id" value="<?php echo $d['petugas_id']; ?>"> Apakah anda yakin akan menghapus data <b><?php echo $d['Nama']; ?></b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
                    </div>

        <?php } ?>
       
    </tbody>
                    </table>
</div>
                    </div>










                    <!-- modal Tambah data -->
        <div class="modal fade" id="tambah-data" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="StaticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="StaticBackdropLabel">Tambah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="proses_simpan_petugas.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label> Nama Petugas</label>
                                    <input type="text" name="Nama" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label> Username</label>
                                    <input type="text"  class="form-control" name="Username">
                                </div>
                                <div class="form-group">
                                    <label> Password</label>
                                    <input type="text"  class="form-control" name="Password">
                                </div>
                                
                                <div class="form-group">
                                    <label> Akses Petugas</label>
                                        <select name="level" class="form-control">
                                            <option>---Akses Petugas </option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Petugas</option>
                                        </select>
                                    
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
include "footer.php";
?>