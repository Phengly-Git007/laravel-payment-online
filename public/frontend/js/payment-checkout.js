$(document).ready(function () {
    $(".strips-payment-method").click(function (e) {
        var name = $(".name").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var pincode = $(".pincode").val();
        var city = $(".city").val();
        var country = $(".country").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();

        if (!name) {
            name_err = "The name field is required.";
            $("#name_err").html("");
            $("#name_err").html(name_err);
        } else {
            name_err = "";
            $("#name_err").html("");
        }

        if (!email) {
            email_err = "The email field is required.";
            $("#email_err").html("");
            $("#email_err").html(email_err);
        } else {
            email_err = "";
            $("#email_err").html("");
        }

        if (!phone) {
            phone_err = "The phone field is required.";
            $("#phone_err").html("");
            $("#phone_err").html(phone_err);
        } else {
            phone_err = "";
            $("#phone_err").html("");
        }

        if (!pincode) {
            pincode_err = "The pincode field is required.";
            $("#pincode_err").html("");
            $("#pincode_err").html(pincode_err);
        } else {
            pincode_err = "";
            $("#pincode_err").html("");
        }

        if (!city) {
            city_err = "The city field is required.";
            $("#city_err").html("");
            $("#city_err").html(city_err);
        } else {
            city_err = "";
            $("#city_err").html("");
        }

        if (!country) {
            country_err = "The country field is required.";
            $("#country_err").html("");
            $("#country_err").html(country_err);
        } else {
            country_err = "";
            $("#country_err").html("");
        }

        if (!address1) {
            address1_err = "The address1 field is required.";
            $("#address1_err").html("");
            $("#address1_err").html(address1_err);
        } else {
            address1_err = "";
            $("#address1_err").html("");
        }

        if (!address2) {
            address2_err = "The address2 field is required.";
            $("#address2_err").html("");
            $("#address2_err").html(address2_err);
        } else {
            address2_err = "";
            $("#address2_err").html("");
        }

        if (
            name_err != "" ||
            email_err != "" ||
            phone_err != "" ||
            pincode_err != "" ||
            city_err != "" ||
            country_err != "" ||
            address1_err != "" ||
            address2_err != ""
        ) {
            return false;
        } else {
            data_fields = {
                name: name,
                email: email,
                phone: phone,
                pincode: pincode,
                city: city,
                country: country,
                address1: address1,
                address2: address2,
            };
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data_fields,
                success: function (response) {},
            });
        }
    });
});
