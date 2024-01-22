<?php
$title = 'pelanggan';
require'functions.php';

$id = $_GET['id'];
$queryedit = "SELECT * FROM pembayaran WHERE id = '$id'";
$edit = ambilsatubaris($conn,$queryedit);

if(isset($_POST['btn-simpan'])){
    // $id = $_POST['id'];
    $kode_invoice = $_POST['kode_invoice']; // Gunakan nomor invoice yang telah dibuat
    $pembayaran = $_POST['pembayaran'];
    $nama = $_POST['nama'];
    $wisata = $_POST['wisata'];
    $date = $_POST['date'];
    $totalAmount = $_POST['totalAmount'];
    $status = $_POST['status'];
    $query = "UPDATE pembayaran SET kode_invoice = '$kode_invoice', pembayaran = '$pembayaran', nama = '$nama', wisata = '$wisata', date = '$date', totalAmount = '$totalAmount', status = '$status' WHERE id ='$id'";
    
    $execute = bisa($conn,$query);
    if($execute == 1){
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah pelanggan';
        $type = 'success';
        header('location: pelanggan.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
    }else{
        echo "Gagal Tambah Data";
    }
}


require'layout_header.php';
?> 
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Pengguna</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="outlet.php">Pengguna</a></li>
                <li><a href="#">Tambah Pengguna</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                          <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                <div class="form-group">
                    <label>kode invoice</label>
                    <input type="text" name="kode_invoice" class="form-control" readonly value="<?= $edit['kode_invoice'] ?>">
                </div>
                <div class="form-group">
                    <label>pembayaran</label>
                    <input type="text" name="pembayaran" class="form-control" readonly value="<?= $edit['pembayaran'] ?>">
                </div>
                <div class="form-group">
                    <label>nama</label>
                    <input type="text" name="nama" class="form-control" readonly value="<?= $edit['nama'] ?>">
                </div>
                <div class="form-group">
                    <label>wisata</label>
                    <input type="text" name="wisata" class="form-control" readonly value="<?= $edit['wisata'] ?>">
                </div>
                <div class="form-group">
                    <label>tanggal</label>
                    <input type="text" name="date" class="form-control" readonly value="<?= $edit['date'] ?>">
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input type="text" name="totalAmount" class="form-control" readonly value="<?= $edit['totalAmount'] ?>">
                </div>
                <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="progres" <?= ($edit['status'] == 'progres') ? 'selected' : '' ?>>progres</option>
                    <option value="berhasil" <?= ($edit['status'] == 'berhasil') ? 'selected' : '' ?>>berhasil</option>
                    <option value="ditolak" <?= ($edit['status'] == 'ditolak') ? 'selected' : '' ?>>ditolak</option>
                    <!-- Add more options as needed -->
                </select>
                </div>

                <div class="text-right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" name="btn-simpan" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require'layout_footer.php';
?> 