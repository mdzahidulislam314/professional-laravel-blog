@extends('layouts.admin.master') @section('title','Dashboard') @section('cat') active @endsection @section('content')
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="head-title">
                        <h4 class="">All Categories</h4>
                    </div>
                    <button type="button" id="btn-create" class="btn btn-primary btn-rounded waves-effect waves-light m-b-5"><i class="fa fa-plus"></i> Add New</button>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="dtable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="form-create">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="head_text"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger print-error-msg" style="display: none;">
                            <ul></ul>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="field-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancle</button>
                        <button type="submit" class="btn btn-success btn-save waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection @push('js')

<script>
    $(function () {
        var dtable = $("#dtable").DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ url('admin/all/category') }}",
            // dom: 'Brtip',
            bFilter: true, // hide search box
            buttons: ["copy"],
            columns: [
                { data: "id", name: "id" },
                { data: "name", name: "name" },
                {
                    data: null,
                    searchable: false,
                    defaultContent: "<button class='btn btn-sm btn-info dt-btn-edit'><i class=\"fa " + 'fa-edit"></i></button>' + "<button class='btn btn-sm btn-danger dt-btn-delete'><i class=\"fa " + 'fa-trash"></i></button>',
                },
            ],
        });

        // open create modal
        $("#btn-create").on("click", function (e) {
            e.preventDefault();
            $(".print-error-msg").css("display", "none");
            $("#head_text").html("Add Category");

            $("input[name=name]").val("");

            var form = $("#form-create");
            form.attr("action", route("admin.category.store"));
            form.attr("method", "POST");

            $("#modal-create").modal();
        });

        //insert
        $("#form-create").on("click", ".btn-save", function (e) {
            e.preventDefault();

            var form = $("#form-create");
            var action = form.attr("action");
            var data = form.serializeArray();

            $.ajax({
                url: action,
                method: form.attr("method"),
                data: data,
            })
                .done(function (data) {
                    if (data.success) {
                        dtable.ajax.reload();
                        form.trigger("reset");
                        $("#modal-create").modal("hide");
                        toastr.success(data.message, "");
                    } else {
                        toastr.error("Something went wrong!", "Error");
                    }
                })
                .fail(function (xhr) {
                    if (xhr.status == 422) {
                        printErrorMsg(xhr.responseJSON.errors);
                    } else {
                        toastr.error("Something went wrong!", "Error");
                    }
                });
        });

        // edit ajax

        dtable.on("click", ".dt-btn-edit", function (e) {
            e.preventDefault();
            $(".print-error-msg").css("display", "none");
            $("#head_text").html("Edit Category");
            var data = dtable.row($(this).closest("tr")).data();

            $("input[name=name]").val(data.name);

            var form = $("#form-create");
            form.attr("action", route("admin.category.update", data.id));
            form.attr("method", "PUT");

            $("#modal-create").modal();
        });

        // delete
        dtable.on("click", ".dt-btn-delete", function (e) {
            e.preventDefault();
            var data = dtable.row($(this).closest("tr")).data();
            if (confirm("Delete this item?")) {
                $.ajax({
                    url: route("admin.category.destroy", data.id),
                    method: "DELETE",
                    // data:{"_token":"{{csrf_token()}}"}
                })
                    .done(function (data) {
                        if (data.success) {
                            dtable.ajax.reload();
                            toastr.success(data.message, "");
                        } else {
                            toastr.error("Something went wrong!", "Error");
                        }
                    })
                    .fail(function (xhr) {
                        if (xhr.status == 422) {
                            alert("Validation error");
                        } else {
                            toastr.error("Something went wrong!", "Error");
                        }
                    });
            }
        });

        //Error mgs function
        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html("");
            $(".print-error-msg").css("display", "block");
            $.each(msg, function (key, value) {
                $(".print-error-msg")
                    .find("ul")
                    .append("<li>" + value + "</li>");
            });
        }
    });
</script>

@endpush
