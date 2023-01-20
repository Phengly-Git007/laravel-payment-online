$(document).ready(function () {
    $(".strips-payment-method").click(function (e) {
        swal("Strips Payment Method");
    });

    $(".paypal-payment-method").click(function (e) {
        e.preventDefault();
        swal("Paypal Payment Method");
    });
});
