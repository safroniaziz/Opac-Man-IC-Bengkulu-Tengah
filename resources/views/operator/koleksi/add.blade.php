@extends('layouts.backend')
@section('location','Dashboard')
@section('location2')
    <i class="fa fa-dashboard"></i>&nbsp;Tambah Koleksi
@endsection
@section('user-login','Operator')
@section('sidebar-menu')
    @include('operator/sidebar')
@endsection
@section('content')
    <div class="callout callout-info text-center">
        <h4>Perhatian!</h4>
        <p>
            Silahkan tambahkan data koleksi pada form di bawah ini, harap untuk teliti agar tidak terjadi kesalahan dalam proses pengisian data !!
            <br>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-tools pull-left">
                        <a href="{{ route('operator.koleksi') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Gagal :</strong> {{ $message }}
                            </div>
                        @endif
                        <form action="{{ route('operator.koleksi.post') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('POST') }}
            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Eksemplar</label>
                                <input type="text" name="jumlah_eksemplar" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis</label>
                                <input type="text" name="penulis" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Ketersediaan</label>
                                <input type="text" name="ketersediaan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Posisi Rak</label>
                                <input type="text" name="posisi_rak" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kota</label>
                                <input type="text" name="kota" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Lantai</label>
                                <input type="text" name="lantai" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Edisi</label>
                                <input type="text" name="edisi" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Konten Digital</label>
                                <input type="file" name="dokumen" class="form-control">
                            </div>
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger"> <strong>Perhatian : </strong> Silahkan isi semua form lalu klik simpan </div>
                                @endif
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="reset" name="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#kelas').DataTable();
        } );

        // $(document).on('change','#anggota_id',function(){
        //     var anggota_id = $(this).val();
        //     var div = $(this).parent().parent();
        //     var op=" ";
        //     $.ajax({
        //     type :'get',
        //     url: "{{ url('operator/koleksi/cari_bulan') }}",
        //     data:{'anggota_id':anggota_id},
        //         success:function(data){
        //             op+='<option value="0" selected disabled>-- pilih bulan --</option>';
        //             for(var i=0; i<data.length;i++){
        //                 // alert(data[i].id);
        //                 // alert(data['jenis_publikasi'][i].anggota_id);
        //                 op+='<option value="'+data[i].bulan_transaksi+'">'+data[i].bulan_transaksi+'</option>';
        //             }
        //             div.find('#bulan').html(" ");
        //             div.find('#bulan').append(op);
        //         },
        //             error:function(){
        //         }
        //     });
        // })
    </script>
@endpush