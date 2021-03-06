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
                        <form action="{{ route('operator.koleksi.post') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('POST') }}
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger"> <strong>Perhatian : </strong>Terjadi kesalahan, harap mengisi dengan teliti</div>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">1. Kode Koleksi <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="KDKOLEK" value="{{ old('KDKOLEK') }}" class="form-control @error('KDKOLEK') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('KDKOLEK'))
                                        <small class="form-text text-danger">{{ $errors->first('KDKOLEK') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">2. Judul <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('judul'))
                                        <small class="form-text text-danger">{{ $errors->first('judul') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">3. Sub Judul</label>
                                <input type="text" name="SUBJUD" value="{{ old('subjud') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">4. Judul Asli</label>
                                <input type="text" name="judul_asli" value="{{ old('judul_asli') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">5. Nomor Kls</label>
                                <input type="text" name="PKDKLS" value="{{ old('PKDKLS') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">6. ISBN <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-control @error('isbn') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('isbn'))
                                        <small class="form-text text-danger">{{ $errors->first('isbn') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>7. Bahasa :</label>
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

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">8. Penulis Asli</label>
                                <input type="text" name="penulis" value="{{ old('penulis') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">9. Penerjemah</label>
                                <input type="text" name="terjemahan" value="{{ old('terjemahan') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">10. Penulis Satu</label>
                                <input type="text" name="penulis1" value="{{ old('penulis1') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">11. Penulis Kedua</label>
                                <input type="text" name="penulis2" value="{{ old('penulis2') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">12. Penulis Ketiga</label>
                                <input type="text" name="penulis3" value="{{ old('penulis3') }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">13. Penulis Keempat</label>
                                <input type="text" name="penulis4" value="{{ old('penulis4') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">14. Editor</label>
                                <input type="text" name="editor" value="{{ old('editor') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">15. Edisi Cetakan</label>
                                <input type="text" name="edisi" value="{{ old('edisi') }}" class="form-control">
                                <div>
                                    @if ($errors->has('edisi'))
                                        <small class="form-text text-danger">{{ $errors->first('edisi') }}</small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">16. Nama Penerbit <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="penerbit" value="{{ old('penerbit') }}" class="form-control @error('penerbit') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('penerbit'))
                                        <small class="form-text text-danger">{{ $errors->first('penerbit') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">17. Kota</label>
                                <input type="text" name="kota" value="{{ old('kota') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">18. Tahun <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="tahun" value="{{ old('tahun') }}" class="form-control @error('tahun') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('tahun'))
                                        <small class="form-text text-danger">{{ $errors->first('tahun') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">19. subyek <a style="color: red;">*wajib diisi</a></label>
                                <input type="text" name="subyek" value="{{ old('subyek') }}" class="form-control @error('subyek') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('subyek'))
                                        <small class="form-text text-danger">{{ $errors->first('subyek') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">20. Seri</label>
                                <input type="text" name="seri" value="{{ old('seri') }}" class="form-control">
                                <div>
                                    @if ($errors->has('seri'))
                                        <small class="form-text text-danger">{{ $errors->first('seri') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">21. Tinggi</label>
                                <input type="text" name="tinggi" value="{{ old('tinggi') }}" class="form-control @error('tinggi') is-invalid @enderror">
                                <div>
                                    @if ($errors->has('tinggi'))
                                        <small class="form-text text-danger">{{ $errors->first('tinggi') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">22. Ilustrasi</label>
                                <input type="text" name="ilustrasi" value="{{ old('ilustrasi') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">23. Bibliografi</label>
                                <input type="text" name="bib" value="{{ old('bib') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">24. Jumlah Halaman</label>
                                <input type="text" name="jumlah_halaman" value="{{ old('jumlah_halaman') }}" class="form-control">
                                <div>
                                    @if ($errors->has('jumlah_halaman'))
                                        <small class="form-text text-danger">{{ $errors->first('jumlah_halaman') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">25. Jumlah Indeks</label>
                                <input type="text" name="jumlah_indeks" value="{{ old('jumlah_indeks') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>26. Asal Buku :</label>
                                <select name="asalbuku" class="form-control">
                                    <option value="" selected disabled>-- pilih asal buku --</option>
                                    <option {{ old('asalbuku') == "pemberian" ? 'selected' : '' }} value="pemberian">Pemberian</option>
                                    <option {{ old('asalbuku') == "hadiah" ? 'selected' : '' }} value="hadiah">Hadiah</option>
                                </select>                                
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">27. Badan Korporasi</label>
                                <input type="text" name="badan_korporasi" value="{{ old('badan_korporasi') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label>28. Kategori Buku :</label>
                                <select name="kategori" class="form-control">
                                    <option value="" selected disabled>-- pilih kategori --</option>
                                    <option {{ old('kategori') == "buku" ? 'selected' : '' }} value="buku">buku</option>
                                    <option {{ old('kategori') == "CD" ? 'selected' : '' }} value="CD">CD</option>
                                    <option {{ old('kategori') == "VCD" ? 'selected' : '' }} value="VCD">VCD</option>
                                    <option {{ old('kategori') == "CDROM" ? 'selected' : '' }} value="CDROM">CDROM</option>
                                    <option {{ old('kategori') == "kaset" ? 'selected' : '' }} value="kaset">kaset</option>
                                    <option {{ old('kategori') == "majalah" ? 'selected' : '' }} value="majalah">majalah</option>
                                    <option {{ old('kategori') == "artikel" ? 'selected' : '' }} value="artikel">artikel</option>
                                </select>                                
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">29. Jumlah Jilid</label>
                                <input type="text" name="jumlah_jilid" value="{{ old('jumlah_jilid') }}" class="form-control">
                                <div>
                                    @if ($errors->has('jumlah_jilid'))
                                        <small class="form-text text-danger">{{ $errors->first('jumlah_jilid') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">30. Jumlah Eksemplar</label>
                                <input type="text" name="jumlah_eksemplar" value="{{ old('jumlah_eksemplar') }}" class="form-control">
                                <div>
                                    @if ($errors->has('jumlah_eksemplar'))
                                        <small class="form-text text-danger">{{ $errors->first('jumlah_eksemplar') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">31. Tanggal Input Data</label>
                                <input type="date" name="TGLINPUT" value="<?php print strftime('%F'); ?>" readonly class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">32. Catatan Umum</label>
                                <input type="text" name="catatan" value="{{ old('catatan') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">33. Resume</label>
                                <input type="text" name="resume" value="{{ old('resume') }}" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">34. Posisi Rak</label>
                                <input type="text" name="posisi_rak" value="{{ old('posisi_rak') }}" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">35. Lantai</label>
                                <input type="text" name="lantai" value="{{ old('lantai') }}" class="form-control">
                                <div>
                                    @if ($errors->has('lantai'))
                                        <small class="form-text text-danger">{{ $errors->first('lantai') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">36. Kode Operator</label>
                                <input type="text" name="kode_user" value="{{ Auth::user()->id }}" readonly class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">37. Konten Digital</label>
                                <input type="file" name="dokumen" class="form-control">
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