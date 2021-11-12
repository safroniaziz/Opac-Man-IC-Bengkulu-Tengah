@extends('layouts.layout')
@section('content')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel container">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
              <section class="panel">
                  <header class="panel-heading" style="color: #ffffff;background-color: #388a08;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                      <i class="fa fa-bar-chart"></i>&nbsp;Form Pencarian Buku
                  </header>
                  <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                      <form action="{{ route('koleksi.cari') }}" method="POST">
                        {{ csrf_field() }} {{ method_field("POST") }}
                        <div class="row">
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
                              <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" style="height: 4px !important; min-height:3px !important;">
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
                        </div>
                      </form>
                      <hr>
                      <div class="row">
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

                        <div class="col-12 table-responsive">
                          <table id="table order-listing" class="table">
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
                              </tr>
                            </thead>
                            <tbody>
                              @php
                                  $no=1;
                              @endphp
                              @if (isset($_POST['judul']))
                                  @foreach ($data as $data)
                                      <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->JUD }}</td>
                                        <td>{{ $data->PENULASLI }}</td>
                                        <td>{{ $data->PENERBIT }}</td>
                                        <td>{{ $data->KOTA }}</td>
                                        <td>
                                          @if ($data->EDISI == null || $data->EDISI == "")
                                              <a style="color: red">-</a>
                                              @else
                                              {{ $data->EDISI }}
                                          @endif
                                        </td>
                                        <td>{{ $data->TOTKOLEK }}</td>
                                        <td>{{ $data->TOTKOLEK }}</td>
                                        <td>{{ $data->POSIRAK }}</td>
                                        <td>
                                          @if ($data->dokumen == null || $data->dokumen == "")
                                              <a style="color: red">-</a>
                                              @else
                                              <a class="btn btn-primary btn-sm" href="{{ asset('upload_file/'.$data->dokumen) }}" download="{{ $data->dokumen }}"><i class="fa fa-download"></i></a>
                                          @endif

                                        </td>
                                      </tr>
                                  @endforeach
                              @endif
                            </tbody>
                          </table>
                          <div class="modal fade" id="modaldeskripsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="juduldeskripsi"></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p id="isimodal" style="text-align: justify">
      
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </section>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a href=""
              target="_blank">Madrash Islam Negeri Insan Cendikia</a></span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><a>Bengkulu Tengah, Provinsi Bengkulu </a>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
@endsection