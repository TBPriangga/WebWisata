<?php
// Start the session to access session variables
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4CB9E7;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        img {
            max-width: 80%;
            height: auto;
            display: block;
            margin: 10px auto;
            border-radius: 10px;
            height: 250px;
        }

        .container-qr {
            height: 435px;
            width: 300px;
            background-color: white;
            margin-left:600px;
            border-radius: 10px;
        }

        h1 {
            margin-top: 20px;
            padding: 20px;
        }

        h2 {
            color: black;
            font-size: 30px;
            font-weight: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Scan To Redeem</h2>
        <h3>Scan QR Code untuk masuk ke tempat wisata</h3>
        <div class="container-qr">
            <h1>QR Code</h1>
            <img src="<?php echo isset($_SESSION['qrCodePath']) ? $_SESSION['qrCodePath'] : ''; ?>" alt="QR Code" id="qrCodeImage">
            <div class="button-container">
                <button onclick="printQR()">Cetak</button>
                <button onclick="backToHome()">Kembali</button>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['qrCodePath']);
    ?>
    <script>
        function printQR() {
            window.print();
        }

        function backToHome() {
            // Ganti URL dengan halaman tujuan
            window.location.href = './index.php';
        }
    </script>
</body>

</html>
