	// Show Add image Modal
    $(document).on('click', '.add-image', function() {
        $('#image-form').validate().resetForm();
        $('#image-form').trigger('reset');
        $('.image').html('');
        $('#imageModal').modal('show');
    });

    function preview_image(t) {
		var getId = $(t).attr('data-id');
		// for multiple image use below with total file and getId by id
		// var getId = $(t).data('id');
		// var total_file = document.getElementById(getId).files.length;
		$('.' + getId).html('');
		// for (var i = 0; i < total_file; i++) {
			$('.' + getId).append("<img style='width: 100px; height: 100px;' src='" + URL.createObjectURL(event
			.target.files[0]) + "'>");
		// }
	}

	// Store Image 
    $("#image-form").validate({
        rules: {
            image:{
                required:true,
				accept: "jpg,jpeg,png,svg"
            },
        },
        messages: {
            image: {
                required: "Image is required",
            },
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/image/store',
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
                        window.LaravelDataTables["image-table"].draw();
                        $('#imageModal').modal('hide');
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

    // Edit Image Modal
    $(document).on('click', '#editImage', function() {
        var id = $(this).attr('data-id'); 
        $.ajax({
            url: BASE_URL + 'admin/image/edit',
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
                    $("#editImageModal").find(".image").html("<img style='width: 100px; height: 100px;' src='" + BASE_URL + '/' + response.data.image + "'>");
                    $("#editImageModal").find("#id").val(response.data.id);
                    $("#editImageModal").modal('show');
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

    // Update Image
    $("#edit-image-form").validate({
    	rules: {
            image:{
				accept: "jpg,jpeg,png,svg"
            },
        },
        submitHandler: function(form) {
            var data = new FormData(form);
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'admin/image/update',
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
                        window.LaravelDataTables["image-table"].draw();
                        $('#editImageModal').modal('hide');
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

    // Delete Image
    $(document).on('click', '#deleteImage', function() {
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
                url: BASE_URL + 'admin/image/delete',
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
                        window.LaravelDataTables["image-table"].draw();
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

