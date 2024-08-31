@extends('layouts.app')
@section('content')
    <!-- Modal -->
    {{-- ADD student --}}
    <div class="modal fade" id="addstudentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body student_form">
                    <div class="form mb-3">
                        <label> Name</label>
                        <input type="text" class="name form-control" name="name">
                    </div>
                    <div class="form mb-3">
                        <label>email</label>
                        <input type="text" class="email form-control" name="email">
                    </div>
                    <div class="form mb-3">
                        <label>Phone</label>
                        <input type="text" class="phone form-control" name="phone">
                    </div>
                    <div class="form mb-3">
                        <label>Course</label>
                        <input type="text" class="course form-control" name="course">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="addstudent btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--  Edit student --}}
    <div class="modal fade" id="edit_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Student </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body student_form">
                    <input type="text" hidden id="edit_stu_id">
                    <div class="form mb-3">
                        <label> Name</label>
                        <input type="text" class="name form-control" id="edit_name" name="name">
                    </div>
                    <div class="form mb-3">
                        <label>email</label>
                        <input type="text" class="email form-control" id="edit_email" name="email">
                    </div>
                    <div class="form mb-3">
                        <label>Phone</label>
                        <input type="text" class="phone form-control" id="edit_phone" name="phone">
                    </div>
                    <div class="form mb-3">
                        <label>Course</label>
                        <input type="text" class="course form-control" id="edit_course" name="course">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="update_student btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{--  Delete student --}}
    <div class="modal fade" id="delete_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden id="delete_stu_id">
                    <h4>Confirm you want to delete?</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="delete_student_btn btn btn-danger">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" id="addstudent">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Data
                            <a href="" data-bs-toggle="modal" data-bs-target="#addstudentmodel"
                                class="btn btn-primary float-end btn-sm">Add Student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            fetchStudent();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function fetchStudent() {
                $.ajax({
                    type: "GET",
                    url: "/fetch_students",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response.students)
                        $.each(response.students, function(key, item) {
                            $('tbody').append(
                                '<tr>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>' +
                                item
                                .id +
                                '</td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>' +
                                item
                                .name +
                                '</td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>' +
                                item
                                .email +
                                '</td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>' +
                                item
                                .phone +
                                '</td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>' +
                                item
                                .course +
                                '</td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><button type="button" value="' +
                                item
                                .id +
                                '"class="edit_student btn btn-primary btn-sm">Edit</button></td>\                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <td><button type="button" value="' +
                                item
                                .id +
                                '" class="delete_student btn btn-danger btn-sm">Delete</button></td>\
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tr>'
                            )
                        });
                    }
                });
            }
            // delete the data
            $(document).on("click", ".delete_student", function(e) {
                e.preventDefault();
                var stu_id = $(this).val();
                var delete_id = $('#delete_stu_id').val(stu_id);
                // alert(stu_id);
                $('#delete_student').modal('show');
            });

            $(document).on('click', '.delete_student_btn', function(e) {
                $('tbody').empty();
                e.preventDefault();
                var student_id = $("#delete_stu_id").val();

                $.ajax({
                    type: "DELETE",
                    url: "/delete-student/" + student_id,
                    success: function(response) {
                        $('#delete_student').modal("hide")
                        toastr.warning(response.message)
                        fetchStudent()
                    }
                });
            });
            // edit the data
            $(document).on('click', '.edit_student', function(e) {
                e.preventDefault();
                var stu_id = $(this).val();
                // console.log(stu_id);
                $('#edit_student').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit_student/" + stu_id,
                    success: function(response) {
                        // console.log(response.status);
                        if (response.status == 404) {
                            toster.error(response.message)
                            console.log(response.message);
                        } else {
                            $("#edit_name").val(response.message.name);
                            $("#edit_email").val(response.message.email);
                            $("#edit_phone").val(response.message.phone);
                            $("#edit_course").val(response.message.course);
                            $("#edit_stu_id").val(response.message.id);
                        }
                    }
                });
            });
            // update the data
            $(document).on('click', '.update_student', function(e) {
                $('tbody').empty();
                e.preventDefault();
                $(".update_student").text("updateing")
                var student_id = $("#edit_stu_id").val();
                var data = {
                    'name': $("#edit_name").val(),
                    'email': $("#edit_email").val(),
                    'phone': $("#edit_phone").val(),
                    'course': $("#edit_course").val(),
                }
                // updata the data
                $.ajax({
                    type: "PUT",
                    url: "update-student/" + student_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('.form-control').removeClass('is-invalid');
                        $('.error_value').remove();
                        if (response.status == 400) {
                            $.each(response.errors, function(error_key, error_value) {
                                $('.' + error_key).addClass('is-invalid');
                                console.log(error_value);

                                var errorContainer = $(`<p class="error_value"></p>`)
                                $('.' + error_key).after(errorContainer);
                                $.each(error_value, function(index, errorMessage) {
                                    errorContainer.append(
                                        '<span class="text-danger">' +
                                        errorMessage + '</span><br>'
                                    );
                                });
                            })
                        } else {
                            toastr.success(response.success);
                            $("#edit_student").modal("hide");
                            $(".update_student").text("update");
                            fetchStudent();
                        }
                    }
                });
            });
            // add the data
            $(document).on('click', '.addstudent', function(e) {
                e.preventDefault();

                var data = {
                    'name': $('.name').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                    'course': $('.course').val(),
                }
                console.log(data);

                $.ajax({
                    type: "POST",
                    url: "/students",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('.form-control').removeClass('is-invalid');
                        $('.error-message').remove();
                        if (response.status == 400) {
                            // console.log(response.errors);
                            $.each(response.errors, function(key, value) {
                                console.log(value);
                                $('.' + key).addClass('is-invalid');
                                var errorContainer = $(
                                    '<div class="error-message"></div>');
                                $('.' + key).after(errorContainer);
                                $.each(value, function(index, errorMessage) {
                                    errorContainer.append(
                                        '<span class="text-danger">' +
                                        errorMessage + '</span><br>'
                                    );
                                });
                            });
                        } else {
                            // $('#success_message').text(response.message);
                            $('tbody').empty();
                            toastr.success(response.success);
                            $("#addstudentmodel").modal('hide');
                            fetchStudent();
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
