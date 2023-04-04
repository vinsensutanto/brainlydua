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
                <h3 class="card-title">Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                      <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" name="username" maxlength="50" placeholder="Isi username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required id="username">
                        @error('username')
                            <span class="invalid-feedback" siswa="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">email</label>
                      <input type="email" name="email" maxlength="50" placeholder="Isi email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required id="email">
                      @error('email')
                          <span class="invalid-feedback" siswa="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" maxlength="50" placeholder="Isi password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required id="password">
                    @error('password')
                        <span class="invalid-feedback" siswa="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                      <div class="form-group">
                        <label for="pangkat">pangkat</label>
                        <select class="custom-select form-control-border" name="pangkat" id="pangkat">
                          <option value="awam">Awam</option>
                          <option value="otakers">Otakers</option>
                          <option value="admin">Admin</option>
                        </select>
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
