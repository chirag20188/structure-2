
    // Show Add User Modal
    $(document).on('click', '.add-user', function() {
        $('#user-form').validate().resetForm();
        $('#user-form').trigger('reset');
        $('#UserModal').modal('show');
    });

    // Store User 
    $("#user-form").validate({
        rules: {
            name:{
                required:true,
                minlength:2,
            },
            mobile:{
                required:true,
                minlength:10,
                maxlength:10,
                number:true,
            },
            password: {
                required: true,
                minlength:6,
            },
            email: {
                required: true,
                email: true,
            },
            address:{
                required: true,
                minlength:5
            }
        },
        messages: {
            name: {
                required: "Name is required",
            },
            mobile: {
                required: "Mobile number is required",
            },
            password: {
                required: "Password is required",
            },
            email: {
                required: "Email is required",
            },
            address:{
              required: "Address is required",  
            }
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/user/store',
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
                         window.LaravelDataTables["users-table"].draw();
                        $('#UserModal').modal('hide');
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

    // Edit User Modal
    $(document).on('click', '#editUser', function() {
        var id = $(this).attr('data-id'); 
        $.ajax({
            url: BASE_URL + 'admin/user/edit',
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
                    $("#EditUserModal").find("#name").val(response.data.name);
                    $("#EditUserModal").find("#email").val(response.data.email);
                    $("#EditUserModal").find("#mobile").val(response.data.mobile);
                    $("#EditUserModal").find("#address").val(response.data.address);
                    $("#EditUserModal").find(".status").val(response.data.status)
                    $('.status option[value="'+response.data.status+'"]').attr('selected', true);
                    $("#EditUserModal").find("#id").val(response.data.id);
                    $("#EditUserModal").modal('show');
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

    // Update User
    $("#edit-user-form").validate({
        rules: {
            name:{
                required:true,
                minlength:2,
            },
            mobile:{
                required:true,
                minlength:10,
                maxlength:10,
                number:true,
            },
            password: {
                required: true,
                minlength:6,
            },
            email: {
                required: true,
                email: true,
            },
            address:{
                required: true,
                minlength:5
            }
        },
        messages: {
            name: {
                required: "Name is required",
            },
            mobile: {
                required: "Mobile number is required",
            },
            password: {
                required: "Password is required",
            },
            email: {
                required: "Email is required",
            },
            address:{
              required: "Address is required",  
            }
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/user/update',
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
                        window.LaravelDataTables["users-table"].draw();
                        $('#EditUserModal').modal('hide');
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

     // Delete User
    $(document).on('click', '#deleteUser', function() {
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
                url: BASE_URL + 'admin/user/delete',
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
                        window.LaravelDataTables["users-table"].draw();
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

    // Change Status of User
    $(document).on('click', '.change-status', function() {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        swal({
            title: 'Are you sure?',
            text: "You want to change status!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!',
            reverseButtons: true
         }).then(function () {
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/user/change/status',
                data:{
                    'id' : id,'status':status
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
                        window.LaravelDataTables["users-table"].draw();
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