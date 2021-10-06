
//add header csrf token for ajax requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// apply select 2
$(".add_user_form select").select2();
$(".add_user_form select").select2({
    width: 'resolve' ,
    dropdownCssClass:"select2-dropdown-fontsize"// need to override the changed default
});
//file upload show name of file
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

// add new user function here

    function add_new_user(route,userRole){
    $('.add_user_form .phone_no').mask('0000-0000-000');
    $('.add_user_form .cnic_no').mask('00000-0000000-0');

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg !== value;
    }, "Value must not equal arg.");

    $('.add_user_form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone_no: {
                required: true,
            },
            cnic_no: {
                required: true,
            },
            dress_length: {
                required: true,
            },
            dress_teera: {
                required: true,
            },
            dress_teera_style: {
                valueNotEquals: "default",
            },
            dress_bazoo: {
                required: true,
            },
            dress_galla: {
                required: true,
            },
            dress_galla_style: {
                valueNotEquals: "default",
            },
            dress_kandha: {
                required: true,
            },
            dress_kohni: {
                required: true,
            },
            dress_chaati: {
                required: true,
            },
            dress_darmean: {
                required: true,
            },
            dress_kamar: {
                required: true,
            },
            dress_hip: {
                required: true,
            },
            dress_shalwar_trouser: {
                required: true,
            },
            dress_pancha: {
                required: true,
            },
            dress_shalwar_ghaira: {
                required: true,
            },
            dress_thai: {
                required: true,
            },
            dress_godda: {
                required: true,
            },

            status: {
            valueNotEquals: "default",
            },
            address: {
                required: true,
            },
        },

        // highlight: function(element, errorClass, validClass) {
        //     $(element).addClass('is-invalid');
        // },
        // unhighlight: function(element, errorClass, validClass) {
        //     $(element).removeClass('is-invalid');
        // },
        errorPlacement: function(error, element) {
			if (element.hasClass("select2-hidden-accessible")) {
				error.insertAfter(element.next("span"));
			} else {
				error.insertAfter(element);
			}
		},
        submitHandler: function(form, event) {
            event.preventDefault();
            console.log(form);
            var formData = new FormData(form);
            formData.append("role",userRole);
            if($(".checkboxMeasurement").is(":checked")){
                formData.append("measurement",true);

            }
            console.log(formData);
            $.ajax({
                url: route,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".add_user_button").prop("disabled", true);
                    $(".add_user_button").css("opacity", 0.3);
                },
                success: function(data) {
                    $(".add_user_button").prop("disabled", false);
                    $(".add_user_button").css("opacity", 1);

                    if (data.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        })
                    } else {
                        $(".add_user_form").find('input,textarea').val('');
                        $(".add_user_form").find(".custom-file-label").text('choose a image..');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        })
                    }
                }

            });
        }
    });
    $(".add_user_form .select2-hidden-accessible").on("change", function() {
		if ($(this).valid()) {
			$(this).next("span").removeClass("error").addClass("valid");
		}
	});
}

//show user function here
 // data table
 var userDatatable='';
 function show_users_data(listRoute,userRole,tableId){
     console.log(listRoute+"___"+userRole+"___"+tableId);
    userDatatable = tableId.DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ordering: true,
    "order": [
        [2, "desc"]
    ],
    "ajax":{
        url:listRoute,
        data:{role:userRole},
    },
    columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },

        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'phone_no',
            name: 'phone_no'
        },
        {
            data: 'address',
            name: 'address'
        }, {
            data: 'status',
            name: 'status'
        },
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
    ]
});
 }

 //show edit data funcion

 function show_edit_data(dataId,editRoute,userRole){
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: editRoute,
        data: {
            id: dataId,
            role:userRole,
        },
        beforeSend: function() {

        },
        success: function(response) {

            if (!response.error) {

                $("#userModal .modal-body").html(response.html);
        $('.update_user_form .phone_no').mask('0000-0000-000');
        $('.update_user_form .cnic_no').mask('00000-0000000-0');
        $(".update_user_form select").select2();
        $("#userModal").modal("show");


            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.message,
                });

            }
        }
    });
 }

 //delete user function here

 function delete_user_func(dataId,deleteRoute,deleteRow){

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: 'delete',
                dataType: "json",
                url: deleteRoute,
                data: {
                    id: dataId
                },
                beforeSend: function() {

                },
                success: function(response) {

                    if (!response.error) {

                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        deleteRow.css('background', 'tomato');
                        deleteRow.fadeOut(800, function() {
                            if(userDatatable!='')
                            {
                            userDatatable.ajax.reload();
                            }
                            if ($("#taylorTable").find("tr").length ==
                                1) {

                                $("#taylorTable").append(
                                    '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">No data available in table</td></tr>'
                                )
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                        });

                    }
                }
            });


        }
    });

 }

 //update user data here
 function update_user_func(dataId,updateRoute,formData,button){

    $.ajax({
        type: 'post',
        dataType: "json",
        url:updateRoute,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {

            $(button).prop("disabled",true);
            $(button).css("opacity",0.3);
        },
        success: function(response) {
            $(button).prop("disabled",false);
            $(button).css("opacity",1);
            if (!response.error) {
                $("#userModal").modal("hide");
                if(userDatatable!='')
                {
                userDatatable.ajax.reload();
                }
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.message,
                    timer: 1500
                });

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.message,

                });

            }
        }
    });

 }
