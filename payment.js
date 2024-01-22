$(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light"); 
        $("#tab1").addClass("active1");
        $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab2").addClass("active1");
        $("#tab2").removeClass("bg-light");
    });
    $("#tab3").click(function () {
        $(".tabs").removeClass("active1");
        $(".tabs").addClass("bg-light");
        $("#tab3").addClass("active1");
        $("#tab3").removeClass("bg-light");
    });
})

$(document).ready(function () {
    // Fungsi untuk mengupdate total
    function updateTotal() {
        var quantity = parseInt($('#quantity').val());
        var unitPrice = parseInt($('#quantity').data('price'));
        var total = quantity * unitPrice;

        // Setel total pada elemen tampilan dan input yang tersembunyi
        $('#totalAmount').val(total);
    }

    // Panggil fungsi updateTotal saat quantity berubah
    $('#quantity').on('input', function () {
        updateTotal();
    });
});
