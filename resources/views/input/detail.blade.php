@extends('admin.navbar') 
@extends('admin.sidebar') 
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}</div>
        @endif
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="card">
                    <div class="card-header"><h1>Detail Pelaporan</h1></div>
                    <div class="card-body">
                        <div class="form-group">
                            <table style="border:none;">
                                <tr>
                                    <th style="width:40%;" class="detailtable">NIS</th>
                                    <td class="detailtable"><b>: {{$inputs->siswa->nis}}</b></td>
                                </tr>
                                <tr>
                                    <th class="detailtable">Kategori</th>
                                    <td class="detailtable"><b>: {{$inputs->kategori->ket_kategori}}</b></td>
                                </tr>
                                <tr>
                                    <th class="detailtable">Status</th>
                                    <td class="detailtable"><b>:
                                        @if (!empty($aspirasis))
                                            @if($aspirasis->status=='menunggu')
                                            <span class="px-3 bg-gradient-danger rounded text-white">{{$aspirasis->status}}
                                            </span>
                                            @elseif ($aspirasis->status == 'proses')
                                            <span class="px-3 bg-gradient-warning rounded text-white">{{ $aspirasis->status}}
                                            </span>
                                            @else
                                            <span class="px-3 bg-gradient-success rounded text-white">{{$aspirasis->status}}
                                            </span>
                                            @endif
                                        @else
                                            <span class="px-3 bg-gradient-invalid rounded text-white">Belum Ditanggapi</span>
                                        @endif
                                    </b></td>
                                </tr>
                                <tr>
                                    <th class="detailtable">Isi Laporan</th>
                                    <td class="detailtable"><b>: {{$inputs->ket}}</b></td>
                                </tr>
                                <tr>
                                    <th class="detailtable">Foto</th>
                                    <td class="detailtable"><b>: <img src="{{asset('foto')}}/{{$inputs->foto}}" maxwidth="100px"></b></td>
                                </tr>
                                <tr>
                                    <th class="detailtable">Tanggapan</th>
                                    <td class="detailtable"><b>
                                        @if(empty($aspirasis->feedback))
                                        <b>Belum ada Tanggapan</b>
                                        @else
                                            @if($aspirasi!=null)
                                                @foreach($aspirasi as $aspirasi)
                                                <i>{{$aspirasi->created_at}}</i> -> <b>{{$aspirasi->feedback}}</b><br/>
                                                @endforeach
                                            @else
                                                <b>{{ $aspirasis->feedback }}</b>
                                            @endif
                                        @endif
                                    </b></td>
                                </tr>
                            </table>

                        </div>


                            @if(Auth::user())
                                @if($aspirasis->status!=='Selesai')
                                    @if(empty($aspirasis->feedback))
                                        <div class="form-group"><br>
                                            <a href="{{route('aspirasi.show',[$inputs->id_pelaporan])}}">
                                                <button class="btn btn-primary">Beri Tanggapan</button>
                                            </a>
                                        </div>
                                    @elseif(!empty($aspirasis->feedback))
                                        <div class="form-group"><br>
                                            <a href="{{route('aspirasi.show',[$aspirasis->id_pelaporan])}}">
                                                <button class="btn btn-primary">Beri Tanggapan Baru</button>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('admin.footer') 