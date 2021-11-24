@extends('layouts.backend')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;SIMPANAN WAJIB
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar')
@endsection
@section('content')
    <div class="callout callout-info ">
        <h4>Perhatian!</h4>
        <p>
            Berikut adalah data jenis transaksi simpaan wajib yang sudah tersedia, silahkan tambahkan jika ada jenis transaksi simpaan wajib baru
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-calendar"></i>&nbsp;Manajemen Data Simpanan Wajib</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('operator.koleksi.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Baru</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                        </div>
                    @endif
                    @if($message2 = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Gagal :</strong> {{ $message2 }}
                        </div>
                    @endif
                    <table class="table table-bordered table-hover" id="kelas">
                        <thead>
                              <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Kota</th>
                                <th>Edisi</th>
                                <th>Jumlah Eksemplar</th>
                                <th>Ketersediaan</th>
                                <th>Posisi Rak</th>
                                <th>Dokumen</th>
                                <th>Aksi</th>

                              </tr>
                            </thead>
                            <tbody>
                              @php
                                  $no=1;
                              @endphp
                                @foreach ($koleksis as $koleksi)
                                    <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $koleksi->JUD }}</td>
                                    <td>{{ $koleksi->PENULASLI }}</td>
                                    <td>{{ $koleksi->PENERBIT }}</td>
                                    <td>{{ $koleksi->KOTA }}</td>
                                    <td>
                                        @if ($koleksi->EDISI == null || $koleksi->EDISI == "")
                                            <a style="color: red">-</a>
                                            @else
                                            {{ $koleksi->EDISI }}
                                        @endif
                                    </td>
                                    <td>{{ $koleksi->TOTKOLEK }}</td>
                                    <td>{{ $koleksi->TOTKOLEK }}</td>
                                    <td>{{ $koleksi->POSIRAK }}</td>
                                    <td>
                                        @if ($koleksi->dokumen == null || $koleksi->dokumen == "")
                                            <a style="color: red">tidak ada koleksi</a>
                                            @else
                                            <a class="btn btn-primary btn-sm" href="{{ asset('upload_file/'.$koleksi->dokumen) }}" download="{{ $koleksi->dokumen }}"><i class="fa fa-download"></i>&nbsp; Download Dokumen</a>
                                        @endif

                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('operator.koleksi.edit',[$koleksi->KDKOLEK]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a></td> --}}
                                    {{-- <a onclick="hapusBuku({{ $koleksi->id }})" class="btn btn-danger btn-sm" style="color:white;cursor:pointer;"><i class="fa fa-trash"></i></a> --}}
                                    <form action="{{ route('operator.koleksi.delete',[$koleksi->KDKOLEK]) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field("DELETE") }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                    </form>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                   
                 </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#kelas').DataTable( {
            buttons: [ 'copy','csv','print', 'excel', 'pdf', 'colvis' ],
            dom: 
            "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu:[
                [5,10,25,50,100,-1],
                [5,10,25,50,100,"All"]
            ]
        } );
    
        table.buttons().container()
            .appendTo( '#kelas_wrapper .col-md-5:eq(0)' );
    } );
    </script>
@endpush