jQuery(document).ready(function () {
    forshowVendor();
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
                    forshowVendor();
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
            success: function (result) {
                jQuery(".vendorDetails").html(' ');
                $.each(result.vendor, function (key, sivendor) {
                    if (sivendor.status == 1) {
                        var status =
                            '<div class="badge badge-success">Active</div>';
                    } else {
                        var status =
                            '<div class="badge badge-warning">Inactive</div>';
                    }
                    jQuery(".vendorDetails").append(
                        "<tr>\
                    <td>" +
                            sivendor.name +
                            "</td>\
                    <td>" +
                            sivendor.description +
                            "</td>\
                    <td>" +
                            sivendor.office_address +
                            "</td>\
                    <td>" +
                            sivendor.email +
                            "</td>\
                    <td>" +
                            sivendor.phone +
                            "</td>\
                    <td>" +
                            sivendor.operator_name +
                            "</td>\
                    <td>" +
                            sivendor.operator_phone +
                            "</td>\
                    <td>" +
                            sivendor.tin +
                            "</td>\
                    <td>" +
                            sivendor.trade_number +
                            "</td>\
                    <td>" +
                            status +
                            '</td>\
                    <td>\
                      <button value="' +
                            sivendor.id +
                            '" class="btn btn-sm btn-success editButtonforshow" data-toggle="modal" data-target="#vendorEditbutton"><i class="fa fa-edit"></i></button>\
                      <button value="' +
                            sivendor.id +
                            '" class="btn btn-sm btn-danger deletebuttonfordelete" data-toggle="modal" data-target="#deletebuttonfordelete"><i class="fa fa-trash"></i></button>\
                    </td>\
                  </tr>'
                    );
                });
            },
        });
    }

    // FOR EDIT

    jQuery(document).on("click", ".editButtonforshow", function (e) {
        e.preventDefault();
        var editshowid = jQuery(this).val();
        // alert(editshowid);
        $.ajax({
            url: "vendoreditforshow/" + editshowid,
            type: "get",
            dataType: "json",
            success: function (response) {
                jQuery("#id").val(response.singleVen.id);
                jQuery("#name").val(response.singleVen.name);
                jQuery("#description").val(response.singleVen.description);
                jQuery("#office_address").val(response.singleVen.office_address);
                jQuery("#email").val(response.singleVen.email);
                jQuery("#phone").val(response.singleVen.phone);
                jQuery("#operator_name").val(response.singleVen.operator_name);
                jQuery("#operator_phone").val(response.singleVen.operator_phone);
                jQuery("#tin").val(response.singleVen.tin);
                jQuery("#trade_number").val(response.singleVen.trade_number);
                jQuery("#status").val(response.singleVen.status);
            },
        });
    });

    // FOR VENDOR UPDATE

    jQuery(".UpdatefinallyVendor").click(function(){
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        // alert("ok");
            var upid = jQuery("#id").val();
            var name = jQuery("#name").val();
            var description = jQuery("#description").val();
            var office_address = jQuery("#office_address").val();
            var email = jQuery("#email").val();
            var phone = jQuery("#phone").val();
            var operator_name = jQuery("#operator_name").val();
            var operator_phone = jQuery("#operator_phone").val();
            var tin = jQuery("#tin").val();
            var trade_number = jQuery("#trade_number").val();
            var status = jQuery("#status").val();
            // console.log(id,name,description,office_address,email,phone,operator_name,operator_phone,tin,trade_number,status);
            $.ajax({
                url:'updatedVendor/'+upid,
                type:'post',
                dataType:'json',
                data:{
                    'name':name,
                    'description':description,
                    'office_address':office_address,
                    'email':email,
                    'phone':phone,
                    'operator_name':operator_name,
                    'operator_phone':operator_phone,
                    'tin':tin,
                    'trade_number':trade_number,
                    'status':status
                },
                success:function(response){
                    if(response.faild == "405"){
                    jQuery(".nameError").text(response.errors.name);
                    jQuery(".descriptionError").text(response.errors.description);
                    jQuery(".office_addressError").text(response.errors.office_address);
                    jQuery(".emailError").text(response.errors.email);
                    jQuery(".phoneError").text(response.errors.phone);
                    jQuery(".operator_nameError").text(response.errors.operator_name);
                    jQuery(".operator_phoneError").text(response.errors.operator_phone);
                    jQuery(".tinError").text(response.errors.tin);
                    jQuery(".trade_numberError").text(response.errors.trade_number);
                    jQuery(".statusError").text(response.errors.status);
                    }
                    else{
                        jQuery(".msg").append('<div class="alert alert-success">'+response.message+'</div>');
                        jQuery(".msg").fadeOut(5000);
                        forshowVendor();
                        jQuery("#vendorEditbutton").modal('hide');
                    }
                }
            });
    });

// FOR DELETE SHOW
   jQuery(document).on('click','.deletebuttonfordelete',function(p){
    p.preventDefault();
    var did = jQuery(this).val();
    //  alert(did);
     jQuery("#deleteid").val(did);
   });
//    FINALLY FOR DELETE

   jQuery(".DeleteFinally").click(function(){
    //  alert('ok');
    var fdid = jQuery("#deleteid").val();
    $.ajax({
        url:'delteforid/'+fdid,
        type:'GET',
        dataType:'json',
        success:function(response){
            jQuery(".msg").append('<div class="alert alert-danger">'+response.message+'</div>');
            jQuery(".msg").fadeOut(5000);
            forshowVendor();
            jQuery("#deletebuttonfordelete").modal('hide');
        }
    });
   });
});
