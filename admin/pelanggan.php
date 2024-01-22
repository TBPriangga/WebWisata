<?php
$title = 'pelanggan';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT * FROM pembayaran';
$data = ambildata($conn, $query);
?>
<style>
    /* Style for the modal */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 50px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Style for the modal content (image) */
    .modal-content-container {
        position: relative;
        text-align: center;
    }

    /* Style for the modal content (image) */
    .modal-content {
        margin-left: 600px;
        margin-top: 40px;
        display: block;
        max-width: 80%;
        /* You can adjust the width as needed */
        max-height: 80vh;
        /* You can adjust the height as needed */
    }

    /* Style for the close button */
    .close {
        margin-right: 300px;
        top: 15px;
        right: 15px;
        margin-top: 30px;
        color: white;
        font-size: 25px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Master Pelanggan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Pelanggan</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button id="btn-refresh" class="btn btn-primary box-title text-right" title="Refresh Data"><i
                                class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th>Kode Invoice</th>
                                <th>Wisata</th>
                                <th>Pembayaran</th>
                                <th>nama</th>
                                <th>tanggal</th>
                                <th>harga</th>
                                <th>bukti pembayaran</th>
                                <th>status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $pembayaran): ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?= $pembayaran['kode_invoice'] ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['wisata'] ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['pembayaran'] ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['date'] ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['totalAmount'] ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        $imagePath = '../uploads/' . $pembayaran['bukti'];
                                        echo "<img src='$imagePath' width='70' height='90' onclick='openModal(\"$imagePath\")' style='cursor: pointer;'>";
                                        ?>
                                    </td>
                                    <td>
                                        <?= $pembayaran['status'] ?>
                                    </td>
                                    <td align="center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="pelanggan_edit.php?id=<?= $pembayaran['id']; ?>" data-toggle="tooltip"
                                                data-placement="bottom" title="Edit" class="btn btn-success"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="pelanggan_hapus.php?id=<?= $pembayaran['id']; ?>"
                                                onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip"
                                                data-placement="bottom" title="Hapus" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">

    </div>
</div>
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
<script>
    // Function to open the modal with the clicked image
    function openModal(imageSrc) {
        var modal = document.getElementById("imageModal");
        var modalImg = document.getElementById("modalImage");
        modal.style.display = "block";
        modalImg.src = imageSrc;
    }

    // Function to close the modal
    function closeModal() {
        var modal = document.getElementById("imageModal");
        modal.style.display = "none";
    }
</script>
<?php
require 'layout_footer.php';
