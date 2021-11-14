@extends('layouts.layout2')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Informasi Aplikasi</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <form action="{{ route('koleksi.cari2') }}" method="POST">
            {{ csrf_field() }} {{ method_field("POST") }}
            <div class="col-md-6 mt-6">
                <div class="form-group">
                  <label for="" class="form-label">Cari Berdasarkan :</label>
                  <select name="cari_berdasarkan" class="form-control" >
                    <option disabled selected="selected">-- Filter Kategori --</option>
                    <option value="pengarang">Pengarang</option>
                    <option value="penerbit">Penerbit</option>
                    <option value="tahun">Tahun Terbit</option>
                    <option value="subyek">Subyek</option>
                    <option value="isbn">ISBN</option>
                  </select>
                  <div>
                      @if ($errors->has('cari_berdasarkan'))
                          <small class="form-text text-danger">{{ $errors->first('cari_berdasarkan') }}</small>
                      @endif
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-6">
                <div class="form-group">
                  <label for="" class="form-label">Ketik Judul Koleksi :</label>
                  <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" autocomplete="off">
                  <div>
                      @if ($errors->has('judul'))
                          <small class="form-text text-danger">{{ $errors->first('judul') }}</small>
                      @endif
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp; Telusuri</button>
              </div>
          </form>
          <hr>
          <div class="row"></div>
            <div class="col-md-12">
              @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>Gagal :</strong>{{ $message }}
              </div>
              @elseif ($message2 = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>Gagal :</strong>{{ $message2 }}
              </div>
              @endif
            </div>

            @if (isset($_POST['judul']))
              <div class="col-md-12" style="margin-top: 10px !important;">
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Hasil Pencarian</h3>
      
                    <div class="box-tools">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($data as $data)
                    <table class="table table-bordered table-hover">
                      <tr style="background-color: #f0f0f0f0 !important">
                        <th style="width: 15%;">Nomor</th>
                        <th colspan="3">{{ $no++ }}</th>

                        
                      </tr>
                      <tr>
                        <th style="width: 15%">Judul</th>
                        <td>{{ $data->JUD }}</td>

                        <th style="width: 15%">Jumlah Eksemplar</th>
                        <td>{{ $data->TOTKOLEK }}</td>
                      </tr>
                      <tr>
                        <th style="width: 15%">Penulis</th>
                        <td>{{ $data->PENULASLI }}</td>
                        <th style="width: 15%">Ketersediaan</th>
                        <td>{{ $data->TOTKOLEK }}</td>
                      </tr>
                      <tr>
                        <th style="width: 15%">Penerbit</th>
                        <td>{{ $data->PENERBIT }}</td>

                        <th style="width: 15%">Posisi Rak</th>
                        <td>{{ $data->POSIRAK }}</td>
                      </tr>
                      <tr>
                        <th style="width: 15%">Kota</th>
                        <td>{{ $data->KOTA }}</td>

                        <th style="width: 15%">Lantai</th>
                        <td>{{ $data->LANTAI }}</td>
                      </tr>
                      <tr>
                        <th style="width: 15%">Edisi</th>
                        <td>
                          @if ($data->EDISI == null || $data->EDISI == "")
                              <a style="color: red">tidak tersedia</a>
                              @else
                              {{ $data->EDISI }}
                          @endif
                        </td>

                        <th style="width: 15%">Konten Digital</th>
                        <td>
                          @if ($data->dokumen == null || $data->dokumen == "")
                              <a style="color: red">tidak tersedia</a>
                              @else
                              <a class="btn btn-primary btn-sm" href="{{ asset('upload_file/'.$data->dokumen) }}" download="{{ $data->dokumen }}"><i class="fa fa-download"></i>&nbsp; Klik Untuk Download</a>
                          @endif
                        </td>
                      </tr>
                  </table>
                  <hr>
                    @endforeach 
                  <!-- /.box-body -->
                </div>
    
              </div>
            @endif
          </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>  
@endsection