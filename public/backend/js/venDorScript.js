jQuery(document).ready(function () {
    // For Insert
    jQuery(".AddedVendorButton").click(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var name = jQuery(".name").val();
        var description = jQuery(".description").val();
        var office_address = jQuery(".office_address").val();
        var email = jQuery(".email").val();
        var phone = jQuery(".phone").val();
        var operator_name = jQuery(".operator_name").val();
        var operator_phone = jQuery(".operator_phone").val();
        var tin = jQuery(".tin").val();
        var trade_number = jQuery(".trade_number").val();
        var status = jQuery(".status").val();
        // console.log(
        //     name,
        //     description,
        //     office_address,
        //     email,
        //     phone,
        //     operator_name,
        //     operator_phone,
        //     tin,
        //     trade_number,
        //     status
        // );
        $.ajax({
            url: "vendorstore",
            dataType: "json",
            type: "post",
            data: {
                name: name,
                description: description,
                office_address: office_address,
                email: email,
                phone: phone,
                operator_name: operator_name,
                operator_phone: operator_phone,
                tin: tin,
                trade_number: trade_number,
                status: status,
            },
            success: function (response) {
                if (response.faild == "404") {
                    jQuery(".nameError").text(response.errors.name);
                    jQuery(".descriptionError").text(
                        response.errors.description
                    );
                    jQuery(".office_addressError").text(
                        response.errors.office_address
                    );
                    jQuery(".emailError").text(response.errors.email);
                    jQuery(".phoneError").text(response.errors.phone);
                    jQuery(".operator_nameError").text(
                        response.errors.operator_name
                    );
                    jQuery(".operator_phoneError").text(
                        response.errors.operator_phone
                    );
                    jQuery(".tinError").text(response.errors.tin);
                    jQuery(".trade_numberError").text(
                        response.errors.trade_number
                    );
                    jQuery(".statusError").text(response.errors.status);
                } else {
                    jQuery(".msg").append(
                        '<div class="alert alert-success">' +
                            response.message +
                            "</div>"
                    );
                    jQuery(".msg").fadeOut(5000);
                    jQuery("#AddVendorModal").modal("hide");
                    jQuery("#AddVendorModal").find("input").val("");
                    jQuery("#AddVendorModal").find("select").val("");
                    jQuery("#AddVendorModal").find("textarea").val("");
                }
            },
        });
    });
    // FOr SHow
    function forshowVendor() {
        $.ajax({
            url: "forshow",
            dataType: "json",
            type: "GET",
            success: function (result) {},
        });
    }
});
