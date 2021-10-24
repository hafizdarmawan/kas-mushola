@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Kas Rekapitulasi</h4>
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
                    ajax: '{{ url('kas-rekap/getdata') }}',
                    type: "POST",
                    columns: [
                        {
                            data: 'sumber', name:'kas_pemasukan.sumber'
                        },
                        {
                            data: 'jml', name:'kas_pemasukan.jml'
                        },
                        {
                            data: 'tanggal', name:'kas_pemasukan.tanggal'
                        },
                        {
                            data: 'keperluan', name:'kas_pengeluaran.keperluan'
                        },
                        {
                            data: 'jumlah', name:'kas_pengeluaran.jumlah'
                        },
                        {
                            data: 'tanggal', name:'kas_pengeluaran.tanggal'
                        }
                    ]
                });
            });

        </script>
    @endpush
