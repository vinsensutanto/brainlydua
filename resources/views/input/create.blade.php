@extends('admin.navbar') 
@extends('admin.sidebar') 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Pelaporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('input.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="siswa">NIS</label>
                    <select class="custom-select form-control-border" name="nis" id="siswa">
                    @if(count($siswas)>0)
                      @foreach($siswas as $siswa)
                      <option value="{{$siswa->nis}}">{{$siswa->nis}}</option>
                      @endforeach
                    @else
                      <option disabled selected value="">-- Tidak ada siswa --</option>
                    @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="custom-select form-control-border" name="id_kategori" id="kategori">
                    @if(count($kategoris)>0)
                      @foreach($kategoris as $kategori)
                      <option value="{{$kategori->id_kategori}}">{{$kategori->ket_kategori}}</option>
                      @endforeach
                      @else
                        <option disabled selected value="">-- Tidak ada kategori --</option>
                      @endif
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" maxlength="50" placeholder="Isi Lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" required id="lokasi">
                    @error('lokasi')
                        <span class="invalid-feedback" siswa="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea name="ket"class="form-control  @error('ket') is-invalid @enderror" value="{{ old('ket') }}" maxlength="50" required id="ket">Isi Keterangan{{ old('ket') }}</textarea>
                    @error('ket')
                        <span class="invalid-feedback" siswa="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="foto" id="foto" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" name="foto" id="foto" for="exampleInputFile">Foto</label>
                      </div>
                    </div>
                    <div class="input-group-append">
                      <img id="preview" style="margin-top:10px;max-width:100px;" src="#" alt="" />
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>
            <!-- /.card -->

            

          </div>
          <!--/.col (left) -->
          
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<script type="text/javascript">
foto.onchange = evt => {
  const [file] = foto.files
  if (file) {
    preview.src = URL.createObjectURL(file)
  }
}
</script>
@extends('admin.footer')
