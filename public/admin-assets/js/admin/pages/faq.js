
    // Show Add Faq Modal
    $(document).on('click', '.add-faq', function() {
        $('#faq-form').validate().resetForm();
        $('#faq-form').trigger('reset');
        $('#FaqModal').modal('show');
    });

    // Store Faq 
    $("#faq-form").validate({
        rules: {
            title:{
                required:true,
                minlength:5,
            },
            desc:{
                required:true,
                minlength:5,
            },
        },
        messages: {
            title: {
                required: "Question is required",
            },
            desc: {
                required: "Answer is required",  
            }
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/faq/store',
                dataType: 'json',
                data: data,
                async: true,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#preloader").css("display", "inline-block");
                    $("#status").css("display", "inline-block");
                    $("#submit").attr("disabled", true);
                },
                success: function(response) {
                    $("#preloader").css("display", "none");
                    $("#status").css("display", "none");
                    $("#submit").attr("disabled", false);
                    if (response.status == true) {
                        window.LaravelDataTables["faqs-table"].draw();
                        $('#FaqModal').modal('hide');
                        toastr.success(response.message, appName);
                    } else {
                        toastr.error(response.message, appName)
                        return false;
                    }
                },
                error: function(response) {
                    $("#preloader").css("display", "none");
                    $("#status").css("display", "none");
                    $("#submit").attr("disabled", false);
                    var i;
                    var res = response.responseJSON.errors;
                    $.each(res, function(key, value) {
                        toastr.error(value, appName)
                    });
                }
            });
        }
    });

     // Edit Faq Modal
    $(document).on('click', '#editFaq', function() {
        var id = $(this).attr('data-id'); 
        $.ajax({
            url: BASE_URL + 'admin/faq/edit',
            type: "POST",
            data: {id: id},
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },  
            beforeSend: function () {
                $("#preloader").css("display", "inline-block");
                $("#status").css("display", "inline-block");
                $("#submit").attr("disabled", true);
            },
            success: function (response) {
                $("#preloader").css("display", "none");
                $("#status").css("display", "none");
                if (response.status == true) {
                    $("#editFaqModal").find("#title").val(response.data.title);
                    $("#editFaqModal").find("#desc").val(response.data.desc);
                    $("#editFaqModal").find("#id").val(response.data.id);
                    $("#editFaqModal").modal('show');
                }
            },
            error: function(response) {
                $("#preloader").css("display", "none");
                $("#status").css("display", "none");
                $("#submit").attr("disabled", false);
                var i;
                var res = response.responseJSON.errors;
                $.each(res, function(key, value) {
                    toastr.error(value, appName)
                });
            }
        });
    });

    // Update Faq
    $("#edit-faq-form").validate({
        rules: {
            title:{
                required:true,
                minlength:5,
            },
            desc:{
                required:true,
                minlength:5,
            },
        },
        messages: {
            title: {
                required: "Question is required",
            },
            desc: {
                required: "Answer is required",  
            }
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/faq/update',
                dataType: 'json',
                data: data,
                async: true,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $("#preloader").css("display", "inline-block");
                    $("#status").css("display", "inline-block");
                    $("#submit").attr("disabled", true);
                },
                success: function(response) {
                    $("#preloader").css("display", "none");
                    $("#status").css("display", "none");
                    $("#submit").attr("disabled", false);
                    if (response.status == true) {
                        window.LaravelDataTables["faqs-table"].draw();
                        $('#editFaqModal').modal('hide');
                        toastr.success(response.message, appName);
                    } else {
                        toastr.error(response.message, appName)
                        return false;
                    }
                },
                error: function(response) {
                    $("#preloader").css("display", "none");
                    $("#status").css("display", "none");
                    $("#submit").attr("disabled", false);
                    var i;
                    var res = response.responseJSON.errors;
                    $.each(res, function(key, value) {
                        toastr.error(value, appName)
                    });
                }
            });
        }
    });

    // Delete Faq
    $(document).on('click', '#deleteFaq', function() {
        var id = $(this).attr('data-id');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
         }).then(function () {
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/faq/delete',
                data:{
                    "id" : id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },                    
                success: function(data) {
                    if (data) {
                        if (data.status == true) {
                            toastr.success(data.message, appName)
                        } else {
                            toastr.error(data.message, appName)
                        }
                        window.LaravelDataTables["faqs-table"].draw();
                    }
                }
            });
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal(
                    'Cancelled',
                    'Your record is safe :)',
                    'error'
                )
            }
        })
    });