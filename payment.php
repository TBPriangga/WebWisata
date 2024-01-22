<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/payment.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<style>
    .container {
        margin-top: -80px;
    }

    .input-group-bank {
        width: 100%;
        /* Default width */
    }

    @media (max-width: 575.98px) {
        .input-group-bank {
            width: 100%;
            /* Atur lebar sesuai kebutuhan pada layar kecil */
        }
    }

    @media (min-width: 576px) and (max-width: 991.98px) {
        .input-group-bank {
            width: 70%;
            /* Atur lebar sesuai kebutuhan pada layar sedang */
        }
    }

    @media (min-width: 992px) {
        .input-group-bank {
            width: 500px;
            /* Atur lebar sesuai kebutuhan pada layar besar */
        }
    }

    @media (max-width: 1192px) {
        .input-group-bank {
            width: 400px;
            /* Atur lebar sesuai kebutuhan pada layar besar */
        }
    }
</style>

<body>
    <div class="container">
        <div class="container-fluid px-0" id="bg-div">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="card card0">
                        <div class="d-flex" id="wrapper">
                            <div class="bg-light border-right" id="sidebar-wrapper">
                                <div class="sidebar-heading pt-5 pb-4"><strong>Pembayaran</strong></div>
                                <div class="list-group list-group-flush">
                                    <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                        <div class="list-div my-2">
                                            <div class="fa fa-home"></div> &nbsp;&nbsp; Bank
                                        </div>
                                    </a>
                                    <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1">
                                        <div class="list-div my-2">
                                            <div class="fa fa-credit-card"></div> &nbsp;&nbsp; E-Wallet
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div id="page-content-wrapper">
                                <div class="row pt-3" id="border-btm">
                                    <div class="col-4">
                                        <button class="btn btn-success mt-4 ml-3 mb-3" id="menu-toggle">
                                            <div class="bar4"></div>
                                            <div class="bar4"></div>
                                            <div class="bar4"></div>
                                        </button>
                                    </div>
                                    <div class="col-8">
                                        <div class="row justify-content-right">

                                        </div>
                                        <div class="row justify-content-right">

                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="text-center" id="test">Pay</div>
                                </div>

                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">Pembayaran dengan Bank</h3>
                                                    <form id="bankPaymentForm" enctype="multipart/form-data" action="proses.php" method="post" onsubmit="submitBankPayment(event)">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group-bank">
                                                                    <label>Pilih jenis Bank</label>
                                                                    <select id="bank" class="form-control" name="pembayaran">
                                                                        <option value="Mandiri">Mandiri - 112233344</option>
                                                                        <option value="Bri">Bri - 222333444</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label>Nama wisata</label>
                                                                <div class="input-group-bank"> <input type="text" id="bankGardenName" value="" name="wisata" readonly></div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Masukan nama</label>
                                                                <div class="input-group-bank"> <input type="text" name="nama" id="ben-nm"> <label></label> </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Tanggal Check-in</label>
                                                                <div class="input-group-bank"> <input type="date" name="date" placeholder="ABCDAB1S" class="placeicon"></div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Total Harga</label>
                                                                <div class="input-group-bank"> <input type="text" id="totalAmount" name="totalAmount" class="placeicon" readonly> </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Input Bukti Pembayaran</label>
                                                                <div class="input-group-bank"> <input type="file" name="bukti" class="placeicon"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12"> <input type="submit" value="Pay" class="btn btn-success placeicon" name="btn-simpan"> </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane in active">
                                        <div class="row justify-content-center">
                                            <div class="col-11">
                                                <div class="form-card">
                                                    <h3 class="mt-0 mb-4 text-center">Pembayaran E-Wallet</h3>
                                                    <form id="ewalletPaymentForm" enctype="multipart/form-data" action="proses.php" method="post" onsubmit="submitEWalletPayment(event)">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="input-group-bank">
                                                                    <label>Pilih jenis E-wallet</label>
                                                                    <select id="ewallet" class="form-control" name="pembayaran">
                                                                        <option value="gopay">gopay - 08943423232</option>
                                                                        <option value="ovo">Ovo - 0898423242</option>
                                                                        <option value="dana">Dana - 0898423242</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div><br>
                                                        <div class="row">
                                                        <div class="col-12">
                                                                <label>Nama wisata</label>
                                                                <div class="input-group-bank"> <input type="text" id="ewalletGardenName" value="" name="wisata" readonly></div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Masukan nama</label>
                                                                <div class="input-group-bank"> <input type="text" name="nama" id="ben-nm"> <label></label> </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Tanggal Check-in</label>
                                                                <div class="input-group-bank"> <input type="date" name="date" placeholder="ABCDAB1S" class="placeicon"></div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Total Harga</label>
                                                                <input type="text" id="totalAmountEWallet" name="totalAmount" class="placeicon" readonly>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Input Bukti Pembayaran</label>
                                                                <div class="input-group-bank"> <input type="file" name="bukti" class="placeicon"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12"> <input type="submit" value="Pay" class="btn btn-success placeicon" name="btn-simpan"> </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Make sure to include jQuery and Bootstrap JS in the correct order -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="payment.js"></script>
    <script>
        function getTotalAmountFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('total');
        }

        // Update the total amount and garden name displayed on the payment page
        function updatePaymentDetails() {
            const totalAmount = getTotalAmountFromURL();

            if (totalAmount) {
                // Set the value of the hidden input field for total amount
                $('#totalAmountFromURL').val(totalAmount);
                // Assuming #totalAmount is an input field, update it
                $('#totalAmount').val(totalAmount);
                $('#totalAmountEWallet').val(totalAmount); // Update E-Wallet total amount as well
            }

            // Set the value of the hidden input field for the garden name using the existing 'garden' variable
            const gardenValue = getGardenFromURL();
            $('#bankGardenName').val(gardenValue);
            $('#ewalletGardenName').val(gardenValue);
        }

        // Function to extract 'garden' value from the URL
        function getGardenFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('garden');
        }

        // Call the function to update the total amount and garden name when the page loads
        $(document).ready(function () {
            updatePaymentDetails();
        });
    </script>
</body>

</html>
