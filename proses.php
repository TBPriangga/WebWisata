<?php
// Start the session to access session variables
session_start();

// Include necessary files
require 'koneksi.php';
require './phpqrcode/qrlib.php';

// Mendapatkan nomor invoice dari formulir atau dari sumber data lainnya
$invoice   = 'SPLY' . date('Ymdsi');
$status = 'progres';

if (isset($_POST['btn-simpan'])) {
    $kode_invoice = $invoice; // Gunakan nomor invoice yang telah dibuat
    $pembayaran = $_POST['pembayaran'];
    $nama = $_POST['nama'];
    $wisata = $_POST['wisata'];
    $date = $_POST['date'];
    $totalAmount = $_POST['totalAmount'];
    // $status = $_POST['status'];
    $status = isset($_POST['status']) ? $_POST['status'] : 'progres';

    
    // File upload handling
    $uploadDir = 'uploads/';
    $uploadedFileName = uniqid() . '_' . basename($_FILES['bukti']['name']);
    $uploadFile = $uploadDir . $uploadedFileName;
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Memeriksa apakah file yang diunggah adalah gambar
    $check = getimagesize($_FILES['bukti']['tmp_name']);
    if ($check === false) {
        echo "File yang diunggah bukan gambar.";
        exit;
    }

    // Memeriksa jenis file gambar yang diizinkan (contoh: JPEG, PNG, GIF)
    $allowedImageTypes = array('jpeg', 'jpg', 'png', 'gif');
    if (!in_array($imageFileType, $allowedImageTypes)) {
        echo "Jenis file gambar tidak diizinkan. Gunakan JPEG, JPG, PNG, atau GIF.";
        exit;
    }

    if (move_uploaded_file($_FILES['bukti']['tmp_name'], $uploadFile)) {
        $buktiPath = $uploadFile;
        $default_status = 'progres';

        // Generate QR Code dengan mencantumkan nomor invoice
        $qrCodeContent = "Invoice Number: $kode_invoice\nPayment Details: $pembayaran\nName: $nama\nWisata: $wisata\nTotal harga: $totalAmount\nstatus: $default_status";
        $qrCodePath = 'qrcodes/' . $kode_invoice . '_qrcode.png';
        QRcode::png($qrCodeContent, $qrCodePath, QR_ECLEVEL_L);

        // Insert data into the database along with the QR code path
        $query_template = "INSERT INTO `pembayaran` (`kode_invoice`, `pembayaran`, `nama`, `wisata`, `date`, `totalAmount`, `bukti`, `qrcode`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($query_template);
        $insert_stmt->bind_param("sssssssss", $kode_invoice, $pembayaran, $nama, $wisata, $date, $totalAmount, $uploadedFileName, $qrCodePath, $default_status);

        if (!$insert_stmt->execute()) {
            echo "Gagal menambahkan pengguna.";
            exit;
        }

        // Save the QR code path in the session
        $_SESSION['qrCodePath'] = $qrCodePath;

        header('location: qrcode.php');
    } else {
        echo "Error uploading the file.";
    }
}
?>
