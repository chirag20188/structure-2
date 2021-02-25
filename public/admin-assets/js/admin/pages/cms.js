    // Store Cms 
    $("#cms-form").validate({
        rules: {
            title:{
                required:true,
                minlength:5,
            },
            description:{
                required:true,
                minlength:5,
            },
        },
        messages: {
            title: {
                required: "Title is required",
            },
            description: {
                required: "Description is required",  
            }
        },
    });

    // Delete Cms
    $(document).on('click', '#deleteCms', function() {
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
                url: BASE_URL + 'admin/cms/delete',
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
                        window.LaravelDataTables["cms-table"].draw();
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

    // Update Cms
    $("#edit-cms-form").validate({
        rules: {
            title:{
                required:true,
                minlength:5,
            },
            description:{
                required:true,
                minlength:5,
            },
        },
        messages: {
            title: {
                required: "Title is required",
            },
            description: {
                required: "Description is required",  
            }
        },
    });