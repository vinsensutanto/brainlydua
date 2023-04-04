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
                <h3 class="card-title">Berikan Jawaban</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('jawaban.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$pertanyaan->id_pertanyaan}}" name="id_pertanyaan"required>
            <input type="hidden" value="{{$pertanyaan->id_user}}" name="id_user" required> {{--ini nanti diganti --}}
            <input type="hidden" value="0" name="rating"required>
                <div class="card-body">
                  <div class="form-group"><label for="id_pertanyaan">ID pertanyaan</label>    
                    <input type="text" disabled value="{{$pertanyaan->pertanyaan}}"  class="form-control" required>
                    @error('id_pertanyaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                
                  
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <textarea name="jawaban"class="form-control @error('jawaban') is-invalid @enderror" value="{{ old('jawaban') }}" required id="jawaban">{{ old('jawaban') }}</textarea>
                    @error('jawaban')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- /.card-body -->

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
@extends('admin.footer')
