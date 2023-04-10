<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Otak-otak | Website mirip Brainly</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('backend/dist/img/logo-siganteng.png')}}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/lib/twentytwenty/twentytwenty.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">


    <!-- Favicons -->
  <link href="{{asset('frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Include stylesheet -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script defer src="https://unpkg.com/mathlive"></script>
  
  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
  <style>
    .service-title{
      color:aqua;
      font-weight:bold;
    }
    .pertanyaan{
        width:100%;
        margin:10px 10px 10px 0px; 
        padding:10px;
    }
    .btn{
        margin:0px 10px 0px 10px;
        padding:10px;
        width: fit-content;
        font-size:1vw;
        float:right;
    }
  </style>
</head>

<body>
      <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div data-aos="fade-in">
        <div class="hero-logo">
          <!-- <img class="" src="{{asset('frontend/assets/img/logo.png')}}" alt="Imperial"> -->
        </div>

        <h1>Selamat Datang di Otak-otak!</h1>
        <h2>Kami <span class="typed" data-typed-items="Menampung pertanyaan kalian, Mencoba menjawab, Membuka tempat diskusi"></span></h2>
        <div class="actions">
          <a href="#tanya" class="btn-get-started">Mulai Bertanya Sekarang</a>
          <a href="#jawab" class="btn-services">Coba Jawab Pertanyaan</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('login') }}" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><img style="width:8%" src="{{asset('frontend/img/logo.png')}}">&nbsp;Otak-otak</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
            </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#searchModal" class="btn btn-primary py-2 px-4 ms-3">Cari Pertanyaan yang sudah terjawab!</a>
                
            @if(Auth::check())
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('login') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-item nav-link active">Log Out
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
            </div>
            @endif
        </div>
    </nav>
    <!-- Navbar End -->

        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <form action="/list" method="post">
                                @csrf
                            <input type="text" name="cari" style="width:100%;" class="form-control bg-transparent border-primary p-3" placeholder="Cari jawabannya!">
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

    <!-- Banner Start -->
    <div class="container-fluid" id="jawab">
        <div class="container">
            <div class="row gx-0">
                
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}</div>
                @endif
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Filter Pertanyaan</h3>
                        <form action="/cari" method="post">
                            @csrf
                            <table><tr><td>
                            <div class="date mb-3 form-group">
                                <select class="custom-select form-control-border" name="kelas" id="kelas">
                                @if(count($kelass)>0)
                                <option disabled selected>Semua Kelas</option>
                                  @foreach($kelass as $kelas)
                                  <option value="{{$kelas->id_kelas}}">{{$kelas->kelas}}</option>
                                  @endforeach
                                @else
                                  <option disabled selected>-- Tidak ada kelas --</option>
                                @endif
                                </select>
                              </div>
                            </td><td>
                              <div class="date mb-3 form-group">
                                <select class="custom-select form-control-border" name="kategori" id="kategori">
                                @if(count($kategoris)>0)
                                    <option disabled selected>Semua Kategori</option>
                                  @foreach($kategoris as $kategori)
                                  <option value="{{$kategori->id_kategori}}">{{$kategori->kategori}}</option>
                                  @endforeach
                                  @else
                                    <option disabled selected>-- Tidak ada kategori --</option>
                                  @endif
                                </select>
                              </div>
                            </td></tr><tr><td colspan="2">
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                            name="cari" placeholder="Cari pertanyaan" value="{{ old('cari') }}"style="height: 40px;">
                        </div>
                    </td></tr><tr><td>
                        <div class=" date mb-3 form-group">
                            <select class="custom-select form-control-border" name="status" id="status">
                            <option disabled selected>Semua Status</option>
                              <option value="menunggu">Menunggu</option>
                              <option value="dijawab">Dijawab</option>
                              <option value="terjawab">Terjawab</option>
                            </select>
                          </div>
                        </td><td>
                        <input type="submit" class="btn btn-light">
                        </td></tr></table>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5">
                        <h3 class="text-white">List Pertanyaan</h3>
                            @foreach($pertanyaans as $pertanyaan)
                                <a href="{{route('pertanyaan.show', [$pertanyaan->id_pertanyaan])}}" style="cursor: default; color: black; text-decoration:none;">
                                <div class="row pertanyaan" style="background-color:white">
                                    <span><b>{{$pertanyaan->user->username}}</b> - {{$pertanyaan->kategori->kategori}} kelas {{$pertanyaan->kelas->kelas}} - {{$pertanyaan->created_at->diffForHumans()}}</span>
                                    <p style="margin-top:10px;margin-bottom:10px;"><?php echo $pertanyaan['pertanyaan']; ?></p>
                                    @if($pertanyaan->status=="menunggu")
                                        <button type="button" class="btn btn-success">Berikan Jawaban</button>
                                    @elseif($pertanyaan->status=="dijawab")
                                        <button type="button" class="btn btn-success">Jawab dengan lebih baik</button>
                                    @endif
                                </div>
                                </a>
                            @endforeach
                                
                                {{-- <table style="border:none;color:white;">
                                    <tr>
                                        <th style="width:30%;" class="detailtable">NIS</th>
                                        <td><b>: </b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">kategori</th>
                                        <td><b>: </b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Status</th>
                                        <td><b>: 
                                            
                                                
                                                <span class="px-3 bg-gradient-danger rounded text-white">status
                                                </span>
                                        </b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Isi Laporan</th>
                                        <td><b>: </b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Foto</th>
                                        <td><b>: <img src="{{asset('foto')}}/" style="width:100px;"></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>
                                            
                                                    <i>waktu</i> -> <b>feedback</b><br/>
                                        </b></td>
                                    </tr>
                                </table> --}}

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" id="lapor"data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">Kolaborasi dalam Pelaporan, Wujudkan Transparansi dan Akuntabilitas yang Lebih Baik!</h1>
                        <p class="text-white mb-0">Perlu diingat, setiap pelaporan yang kalian buat akan mendapatkan kode unik yang berbeda-beda. Kode unik ini nantinya akan beguna di saat kalian mengecek status dan tanggapan dari pelaporan.</p>
                    </div>
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}</div>
                        @endif
                </div>
                <div class="col-lg-6">
                    <div id="tanya" class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Ajukan Pertanyaan Sekarang!</h1>
                        <form action="{{ route('pertanyaan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="">
                                    <div id="editor" style="height:40%;">Isi Pertanyaan</div>
                                    <math-field id="formula" style="width:100%;"></math-field>
                                    <input type="hidden" name="pertanyaan" id="pertanyaan" class="form-control  @error('pertanyaan') is-invalid @enderror" value="{{ old('pertanyaan') }}" maxlength="50" required>
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="nis" style="height: 55px;">
                                            <option selected disabled><b>NIS Siswa</b></option>
                                        @if(count($siswas)>0)
                                            @foreach($siswas as $siswa)
                                            <option value="{{$siswa->nis}}">{{$siswa->nis}}</option>
                                            @endforeach
                                        @else
                                            <option disabled selected value="">-- Tidak ada siswa --</option>
                                        @endif
                                    </select>
                                </div> --}}
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="id_kategori" style="height: 55px;" required>
                                        <option selected disabled><b>Kategori</b></option>
                                        @if(count(App\Models\Kategori::all())>0)
                                            @foreach($kategoris as $kategori)
                                                <option value="{{$kategori->id_kategori}}">{{$kategori->kategori}}</option>
                                            @endforeach
                                        @else
                                                <option disabled selected value="">-- Tidak ada kategori --</option>
                                        @endif
                                        @error('id_kategori')
                                            <span class="invalid-feedback" kelas="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="id_kelas" style="height: 55px;" required>
                                        <option selected disabled><b>kelas</b></option>
                                        @if(count(App\Models\Kelas::all())>0)
                                            @foreach($kelass as $kelas)
                                                <option value="{{$kelas->id_kelas}}">{{$kelas->kelas}}</option>
                                            @endforeach
                                        @else
                                                <option disabled selected value="">-- Tidak ada kelas --</option>
                                        @endif
                                        @error('id_kelas')
                                            <span class="invalid-feedback" kelas="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <h5 style="color:#e5e5e5;font-weight:bolder;text-align:left;"class="custom-file-label"><b>Foto</b><span style="font-size:10px;">&nbsp*tidak wajib</span></h5>
                                    <input name="foto" id="foto" type="file" class="custom-file-input btn btn-light w-100 py-3" id="exampleInputFile">
                                </div>
                                <div class="col-12">
                                    <img id="preview" style="margin-top:10px;max-width:100px;" src="#" alt="" />
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Buat Laporan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 10px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Jl. Kamal Raya Outer Ring Road No.20, RT.7/RW.14</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>vinsensutanto@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-light py-4" style="background: #051225;">
        <div class="container">
            <div class="row g-0">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">Pengaduan Sekolah</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

<script type="text/javascript">
foto.onchange = evt => {
  const [file] = foto.files
  if (file) {
    preview.src = URL.createObjectURL(file)
  }
}
</script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('frontend/lib/twentytwenty/jquery.event.move.js')}}"></script>
    <script src="{{asset('frontend/lib/twentytwenty/jquery.twentytwenty.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

      <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>
  
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
    document.querySelector("input[name='pertanyaan']").value = quill.root.innerHTML+"<math-field read-only style='border:none'>"+mf.value+"</math-field>";
  });
  
  const mf = document.getElementById("formula");
  const latex = document.getElementById("pertanyaan");

  mf.addEventListener("input",(ev) => latex.value = quill.root.innerHTML+"<math-field read-only style='border:none'>"+mf.value+"</math-field>");

  latex.value = quill.root.innerHTML+"<math-field read-only style='border:none'>"+mf.value+"</math-field>";

  // Listen for changes in the "latex" text field, and reflect its value in
  // the mathfield.

  latex.addEventListener("input", (ev) =>
  mf.setValue( ev.target.value, {suppressChangeNotifications: true})
  );
</script>
</body>

</html>