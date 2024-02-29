<?php
include "header.php";
include "navbar.php";
?>


<div class="container">
    <div class="content">
        <div class="col-6">
            <div class="row">
            <div class="card-body">
                <form action="proses_simpan_diskon.php" method="post">
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label>Total Harga</label>
                            <input type="text" placeholder="Masukan Total Harga" name="hargaa"/>
                        </div>
                        <div class="form-group mt-2">
                            <label> Banyak Produk</label>
                            <input type="number" placeholder="Banyak Barang diBeli" name="discount"/>
                        </div>    
                        <button type="submit" class="btn btn-primary col-4 mt-5">Hitung</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>




<?php
include "footer.php";
?>