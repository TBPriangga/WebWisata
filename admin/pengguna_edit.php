<?php
$title = 'pengguna';
require 'functions.php';

$role = ['admin'];

$id = $_GET['id'];
$queryedit = "SELECT * FROM pengguna WHERE id = '$id'";
$edit = ambilsatubaris($conn, $queryedit);


if (isset($_POST['btn-simpan'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    if ($_POST['password'] != null || $_POST['password'] == '') {
        $password = md5($_POST['password']);
        $query = "UPDATE pengguna SET username = '$username', nama = '$nama', role = '$role', password ='$password' WHERE id = '$id'";
    } else {
        $query = "UPDATE pengguna SET username = '$username', nama = '$nama', role = '$role' WHERE id = '$id'";
    }

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah ' . $role;
        $type = 'success';
        header('location: pengguna.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
        exit();
    } else {
        echo "Gagal Tambah Data";
    }
}

require 'layout_header.php';
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
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $edit['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?= $edit['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
                        <small class="text-danger">Kosongkan saja jika tidak akan mengubah password</small>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <?php foreach ($role as $key): ?>
                                <?php if ($key == $edit['role']): ?>
                                    <option value="<?= $key ?>" selected><?= $key ?></option>
                                <?php else: ?>
                                    <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
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
require 'layout_footer.php';
?>
