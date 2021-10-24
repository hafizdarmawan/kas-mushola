@extends('layouts.backend.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kas Masuk <button class="btn btn-success" style="float: right" data-toggle="modal"
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
                                    <th>Sumber</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Data Kas Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="form_add" id="form_add" class="form-horizontal" action="{{ route('kas-pemasukan.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group"><label class="col-lg-3 control-label">Sumber</label>
                            <div class="col-lg-12">
                                <input type="text" name="sumber" placeholder="Sumber" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Jumlah</label>
                            <div class="col-lg-12">
                                <input type="text" name="jumlah" placeholder="Jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Tanggal</label>
                            <div class="col-lg-12">
                                <input type="date" name="tanggal" placeholder="Tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-3 control-label">Keterangan</label>
                            <div class="col-lg-12">
                                <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
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
            $(document).ready(function(){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#tbl_list').DataTable({
                    "alengthMenu":[
                        [10,25,50,100,200,-1],
                        [10,25,50,100,200,"All"]
                    ],
                    paging:true,
                    processing:true,
                    serverSide:true,
                    ajax:'{{ url('kas-pemasukan/getdata') }}',
                    type:"POST",
                    column:[{
                        data:'id'
                    },{
                        data:'sumber'
                    },{
                        data:'jumlah'
                    },{
                        data:'tangal'
                    },{
                        data:'keterangan'
                    },{
                        data:'id',
                        render:function(data,type,row){
                            return '<button type="button" class="btn btn-xs btn-success shadow edit" data-id="'+data+'"><small>Edit</small></button>'+
                            '<button type="button" class="btn btn-danger btn-xs shadow destroy" hapus-id="'+data+'"><small>Hapus</small></button>';
                        },
                        sClass:"text-center",
                        searchable:false
                    }],
                    "drawCallback":function(settings,json){
                        $('.edit').off("click").on("click",function(){
                            var cek = $(this).attr('data-id');
                            $.ajax({
                                url:"{{ route('kas-pemasukan.edit') }}?id="+cek,
                                type:"GET",
                                dataType:"JSON",
                                success:function(data){
                                    $("form_add").find("input[name=id]").val(data.id);
                                    $("form_add").find("input[name=sumber]").val(data.sumber);
                                    $("form_add").find("input[name=jumlah]").val(data.jumlah);
                                    $("form_add").find("input[name=tanggal]").val(data.tanggal);
                                    $("form_add").find("input[name=keterangan]").val(data.keterangan);
                                    $("#exampleModalLabel").text("Form Edit Kas Pemasukan");
                                    $('#modal-add').modal('show');
                                }
                            });
                        });

                        $('.destroy').off('click').on('click',function(){
                            var cek = $(this).attr('hapus-id');
                            $.ajax({
                                url :"{{ url('kas-pemasukan/destroy') }}/"+cek,
                                type:"POST",
                                success:function(data){
                                    window.location = "{{ route('kas-pemasukan.index') }}"
                                }

                            });
                        });
                    }
                });
            });
        </script>
    @endpush
