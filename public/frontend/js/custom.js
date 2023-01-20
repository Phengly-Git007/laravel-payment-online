$(document).ready(function () {
    loadCart();
    loadWishlist();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadCart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-quantity",
            success: function (response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
            },
        });
    }

    function loadWishlist() {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-quantity",
            success: function (response) {
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.wishlist);
            },
        });
    }

    // increment quantity
    $(".increment-quantity").click(function (e) {
        e.preventDefault();
        var increment = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        var value = parseInt(increment, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value = value + 1;
            $(this).closest(".product_data").find(".quantity-input").val(value);
        }
    });
    // decrement quantity
    $(".decrement-quantity").click(function (e) {
        e.preventDefault();
        var decrement = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        var value = parseInt(decrement, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value = value - 1;
            $(this).closest(".product_data").find(".quantity-input").val(value);
        }
    });
    // ----------------------------------------------------------
    // add to cart
    $(".addToCart").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var product_quantity = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        // csrf_token
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        // close csrf_token
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_quantity: product_quantity,
            },

            success: function (response) {
                swal(response.status);
            },
        });
    });
    // ----------------------------------------------

    // remove-from-cart

    $(".removeFromCart").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/remove-from-cart",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                window.location.reload();
                swal(response.status);
            },
        });
    });

    // ----------------------------------------------

    $(".change-quantity").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var quantity = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        data = {
            product_id: product_id,
            product_quantity: quantity,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/update-cart-quantity",
            data: data,
            success: function (response) {
                swal(response.status);
                window.location.reload();
            },
        });
    });

    // add to wishlist
    $(".addToWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        // csrf_token
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        // close csrf_token

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    $(".removeFromWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/remove-from-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                window.location.reload();
                swal("", response.status);
            },
        });
    });

    // --------------------------------------
});
