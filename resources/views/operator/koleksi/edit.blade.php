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
                        <form action="{{ route('operator.koleksi.update') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('PATCH') }}
            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" name="judul" value="{{ $koleksi->JUD }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Eksemplar</label>
                                <input type="text" name="jumlah_eksemplar" value="{{ $koleksi->TOTKOLEK }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis</label>
                                <input type="text" name="penulis" value="{{ $koleksi->PENULIS1 }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Ketersediaan</label>
                                <input type="text" name="ketersediaan" value="{{ $koleksi->ketersediaan }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ $koleksi->penerbit }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Posisi Rak</label>
                                <input type="text" name="posisi_rak" value="{{ $koleksi->posisi_rak }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kota</label>
                                <input type="text" name="kota" value="{{ $koleksi->kota }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Lantai</label>
                                <input type="text" name="lantai" value="{{ $koleksi->lantai }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Edisi</label>
                                <input type="text" name="edisi" value="{{ $koleksi->edisi }}" class="form-control">
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Judul Asli</label>
                                <input type="text" name="judul_asli" value="{{ $koleksi->judul_asli }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">ISBN</label>
                                <input type="text" name="isbn" value="{{ $koleksi->isbn }}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bahasa :</label>
                                <input type="text" name="bahasa" value="{{ $koleksi->bahasa }}" class="form-control">
                                <select name="bahasa" class="form-control  @error('bahasa') is-invalid @enderror">
                                    
                                    <option value="" selected disabled>-- pilih bahasa --</option>
                                    <option {{ old('bahasa') == "bhs.indonesia" ? 'selected' : '' }} value="bhs.indonesia">bahasa indonesia</option>
                                    <option {{ old('bahasa') == "bhs.inggris" ? 'selected' : '' }} value="bhs.inggris">bahasa inggris</option>
                                    <option {{ old('bahasa') == "bhs.arab" ? 'selected' : '' }} value="bhs.arab">bahasa arab</option>
                                    <option {{ old('bahasa') == "bhs.jerman" ? 'selected' : '' }} value="bhs.jerman">bahasa jerman</option>


                                </select>                                
                                @error('bahasa')
                                    <small class="form-text text-danger">{{ $errors->first('bahasa') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Terjemahan</label>
                                <input type="text" name="terjemahan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis Pertama</label>
                                <input type="text" name="penulis1" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis Kedua</label>
                                <input type="text" name="penulis2" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis Ketiga</label>
                                <input type="text" name="penulis3" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Penulis Keempat</label>
                                <input type="text" name="penulis4" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Editor</label>
                                <input type="text" name="editor" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun</label>
                                <input type="text" name="tahun" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Seri</label>
                                <input type="text" name="seri" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tinggi</label>
                                <input type="text" name="tinggi" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Ilustrasi</label>
                                <input type="text" name="ilustrasi" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Halaman</label>
                                <input type="text" name="jumlah_halaman" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Indeks</label>
                                <input type="text" name="jumlah_indeks" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Kategori Buku :</label>
                                <input type="text" name="kategori" class="form-control">
                                <select name="kategori" class="form-control  @error('kategori') is-invalid @enderror">
                                    
                                    <option value="" selected disabled>-- pilih kategori --</option>
                                    <option {{ old('kategori') == "buku" ? 'selected' : '' }} value="buku">buku</option>
                                    <option {{ old('kategori') == "CD" ? 'selected' : '' }} value="CD">CD</option>
                                    <option {{ old('kategori') == "VCD" ? 'selected' : '' }} value="VCD">VCD</option>
                                    <option {{ old('kategori') == "CDROM" ? 'selected' : '' }} value="CDROM">CDROM</option>
                                    <option {{ old('kategori') == "kaset" ? 'selected' : '' }} value="kaset">kaset</option>
                                    <option {{ old('kategori') == "majalah" ? 'selected' : '' }} value="majalah">majalah</option>
                                    <option {{ old('kategori') == "artikel" ? 'selected' : '' }} value="artikel">artikel</option>

                                </select>                                
                                @error('kategori')
                                    <small class="form-text text-danger">{{ $errors->first('kategori') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Jilid</label>
                                <input type="text" name="jumlah_jilid" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Sisa Koleksi</label>
                                <input type="text" name="sisa_koleksi" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Badan Korporasi</label>
                                <input type="text" name="badan_korporasi" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Catatan</label>
                                <input type="text" name="catatan" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Resume</label>
                                <input type="text" name="resume" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Kode User</label>
                                <input type="text" name="kode_user" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Sub Judul</label>
                                <input type="text" name="sub_judul" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Digit pen</label>
                                <input type="text" name="digitpens" class="form-control">
                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Digit Judul</label>
                                <input type="text" name="digitjud" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">BIB</label>
                                <input type="text" name="bib" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Asal Buku :</label>
                             
                                <select name="asalbuku" class="form-control  @error('asalbuku') is-invalid @enderror">
                                    
                                    <option value="" selected disabled>-- pilih asal buku --</option>
                                    <option {{ old('asalbuku') == "pemberian" ? 'selected' : '' }} value="pemberian">Pemberian</option>
                                    <option {{ old('asalbuku') == "hadiah" ? 'selected' : '' }} value="hadiah">Hadiah</option>



                                </select>                                
                                @error('asalbuku')
                                    <small class="form-text text-danger">{{ $errors->first('asalbuku') }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Pinjam</label>
                                <input type="text" name="jumlah_pinjam" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">subyek</label>
                                <input type="text" name="subyek" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Kelas</label>
                                <input type="text" name="pkdkls" class="form-control">
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