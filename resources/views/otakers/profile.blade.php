@extends('admin.navbar') 
@extends('admin.sidebar') 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('fotouser')}}/{{Auth::user()->foto}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>

                <p class="text-muted text-center">{{Auth::user()->pangkat}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Rating</b> <a class="float-right">{{Auth::user()->rating}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Answer</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <h3>Pertanyaan</h3>
                  @foreach(App\Models\Pertanyaan::where('id_user', $users->id)->get() as $pertanyaan)
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('fotouser')}}/{{$pertanyaan->user->foto}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$pertanyaan->user->username}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">{{$pertanyaan->kategori->kategori}} kelas {{$pertanyaan->kelas->kelas}} - {{$pertanyaan->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php echo $pertanyaan['pertanyaan']; ?>
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  @endforeach

                  <h3>Jawaban</h3>
                  @foreach(App\Models\Jawaban::where('id_user', $users->id)->get() as $jawaban)
                    @foreach(App\Models\Pertanyaan::where('id_pertanyaan', $jawaban->id_pertanyaan)->get() as $jawab)
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('fotouser')}}/{{$pertanyaan->user->foto}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$jawab->user->username}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">{{$jawab->kategori->kategori}} kelas {{$jawab->kelas->kelas}} - {{$jawab->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?php echo $jawab['pertanyaan']; ?>
                      </p>
                      <p>Jawab :
                        <b>{{$jawaban->jawaban}}</b> - Rating : <b>{{$jawaban->rating}}</b>
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                    @endforeach
                  @endforeach
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="timeline">
                    @foreach(App\Models\Jawaban::where('id_user', $users->id)->get() as $jawaban)
                      @foreach(App\Models\Pertanyaan::where('id_pertanyaan', $jawaban->id_pertanyaan)->get() as $jawab)
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{$jawaban->created_at->diffForHumans()}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>{{$jawab->created_at->diffForHumans()}}</span>

                          <h3 class="timeline-header"><a href="#">{{$jawab->user->username}}</a> mengajukan pertanyaan</h3>

                          <div class="timeline-body">
                            <?php echo $jawab['pertanyaan']; ?>
                          </div>
                          <div class="timeline-footer">
                            <a href="{{route('pertanyaan.show', [$jawab->id_pertanyaan])}}" class="btn btn-primary btn-sm">Read more</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i>{{$jawaban->created_at->diffForHumans()}}</span>

                          <h3 class="timeline-header"><a href="#">Anda</a> menjawab - Rating : {{$jawaban->rating}}</h3>

                          <div class="timeline-body">
                            {{$jawaban->jawaban}}
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                    @endforeach
                  @endforeach
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <form action="{{ route('user.update',[$users->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

              <div class="card-body">

                <div class="form-group">
                  <label for="username">username</label>
                  <input type="text" value="{{$users->username}}" name="username" maxlength="50" placeholder="Isi username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required id="username">
                  @error('username')
                      <span class="invalid-feedback" siswa="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="email">email</label>
                <input type="email" value="{{$users->email}}" name="email" maxlength="50" placeholder="Isi email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required id="email">
                @error('email')
                    <span class="invalid-feedback" siswa="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="password">New password<i style="color:red">*</i></label>
              <input type="password" name="password" maxlength="50" placeholder="Isi password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password">
              @error('password')
                  <span class="invalid-feedback" siswa="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>

                <div class="form-group">
                  <label for="pangkat">pangkat</label>
                  <input class="form-control" name="pangkat" value="{{$users->pangkat}}" id="pangkat" readonly>
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
                    <img id="preview" style="margin-top:10px;max-width:100px;" src="{{$users->foto}}" alt="" />
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@extends('admin.footer')
