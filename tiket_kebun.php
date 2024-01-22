<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
	.img-card{
		margin-left: 20px;
	}
	.info{
		margin-left: 15px;
		margin-top: 20px;
	}

</style>
<body>
    <main class="page">
        <section class="shopping-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2>Pembelian tiket</h2>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row">
                                        <div class="col-md-4 img-card">
                                            <img class="img-fluid mx-auto d-block image" src="assets/img/kebun.jpg">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="col-md-5 product-name">
                                                        <div class="product-name">
                                                            <a href="#">Kebun raya baturaden</a>
                                                            <div class="product-info">
                                                                <div>Lokasi: <span class="value">Baturaden</span></div>
                                                                <div>harga Tiket: <span class="value">Rp 15.000</span></div>
                                                                <div>Include: <span class="value">Tiket Parkir</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 quantity">
                                                        <label for="quantity">Jumlah:</label>
                                                        <input id="quantity" type="number" value="1" class="form-control quantity-input" data-price="15000">
                                                    </div>
                                                </div> 	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3><br>
                                <div class="summary-item"><span class="text">Total</span><span id="total" class="price"></span></div>
								<button type="button" id="checkoutBtn" class="btn btn-primary btn-lg btn-block " style="margin-top: 130px;">Checkout</button>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initial calculations
            updateSubtotal();

            // Update subtotal and total when quantity changes
            $('#quantity').on('input', function() {
                updateSubtotal();
            });

            // Function to update subtotal and total
            function updateSubtotal() {
                var quantity = parseInt($('#quantity').val());
                var unitPrice = parseInt($('#quantity').data('price'));
                var subtotal = quantity * unitPrice;

                $('#subtotal').text('Rp' + subtotal);
                $('#total').text('Rp' + subtotal); // Update total with the same value as subtotal
            }
        });

		$(document).ready(function() {
        // Handling checkout button click
        $('#checkoutBtn').on('click', function() {
            var total = $('#total').text();
            var gardenName = 'Kebun Raya Baturaden'; // Store the garden name
            // Redirect to payment page with total and garden name parameters
            window.location.href = 'payment.php?total=' + total + '&garden=' + encodeURIComponent(gardenName);
        });
    });
    </script>
</body>
</html>
