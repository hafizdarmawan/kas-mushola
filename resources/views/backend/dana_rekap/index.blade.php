@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Dana Sosial Rekapitulasi</h4>
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
                                    <th>Sumber</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Pengeluaran</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
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
                    ajax: '{{ url('dana-sosial-rekapitulasi/getdata') }}',
                    type: "POST",
                    columns: [
                        {
                            data: 'sumber', name:'dana_sosial_pemasukan.sumber'
                        },
                        {
                            data: 'jumlah', name:'dana_sosial_pemasukan.jumlah'
                        },
                        {
                            data: 'tanggal', name:'dana_sosial_pemasukan.tanggal'
                        },
                        {
                            data: 'keperluan', name:'dana_sosial_pengeluaran.keperluan'
                        },
                        {
                            data: 'jumlah', name:'dana_sosial_pengeluaran.jumlah'
                        },
                        {
                            data: 'tanggal', name:'dana_sosial_pengeluaran.tanggal'
                        }
                    ]
                });
            });

        </script>
    @endpush
