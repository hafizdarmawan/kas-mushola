@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Users <button class="btn btn-success" style="float: right" data-toggle="modal"
                            data-target="#modal-add"><i class="fa fa-plus"></i>
                            Tambah Data</button></h4>
                </div>
                @if ($message = Session::has('pesan'))
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <p>{{ Session::get('pesan') }}</p>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Level</th>
                                    <th>Action</th>
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="form_add" id="form_add" class="form-horizontal" action="{{ route('users.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group"><label class="col-lg-3 control-label">Nama</label>
                            <div class="col-lg-12">
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-12">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Phone</label>
                            <div class="col-lg-12">
                                <input type="text" name="phone" placeholder="Phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Level</label>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="operator" checked>
                                    <label class="form-check-label" for="level">Operator</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="level" value="admin">
                                    <label class="form-check-label" for="level">Admin</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-12">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#tbl_list').DataTable({
                    "aLengthMenu": [
                        [10, 25, 50, 100, 200, -1],
                        [10, 25, 50, 100, 200, "All"]
                    ],
                    paging: true,
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('users/getdata') }}',
                    type: "POST",
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'level'
                        },
                        {
                            data: "id",
                            render: function(data, type, row) {
                                return '<button type="button" class="btn btn-xs btn-success edit" data-id="' +
                                    data + '"><small>Edit</small></button>' +
                                    '<button type="button" class="btn btn-xs btn-danger destroy" hapus-id="' +
                                    data + '"><small>Hapus</small></button>';
                            },
                            sClass: "text-center",
                            searchable: false
                        }
                    ],

                    "drawCallback": function(settings, json) {
                        $('.edit').off("click").on("click", function() {
                            var cek = $(this).attr('data-id');
                            $.ajax({
                                url: "{{ route('users.edit') }}?id=" + cek,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data) {
                                    $("#form_add").find("input[name=id]")
                                        .val(
                                            data.id);
                                    $("#form_add").find("input[name=name]").val(data
                                        .name);
                                    $("#form_add").find("input[name=email]").val(
                                        data
                                        .email);
                                    $("#form_add").find("input[name=phone]")
                                        .val(data.phone);
                                    $("#form_add").find("input[name=level]")
                                        .val(data.level);
                                    $("#form_add").find("password[name=password]")
                                        .val(data.password);
                                    $("#exampleModalLabel").text(
                                        "Form Edit Users");
                                    $('#modal-add').modal('show');
                                }
                            });
                        });

                        $('.destroy').off("click").on("click", function() {
                            var cek = $(this).attr('hapus-id');
                            $.ajax({
                                url: "{{ url('users/destroy') }}/" + cek,
                                type: "POST",
                                success: function(data) {
                                    window.location =
                                        "{{ route('users.index') }}";
                                }
                            });
                        });
                    },
                });
            });

        </script>
    @endpush
