<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pengaduan Sekolah - Ujian Sertifikasi Hari ini!</title>
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

  <!-- Template Main CSS File -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
  <style>
    .service-title{
      color:aqua;
      font-weight:bold;
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

        <h1>Selamat Datang di Pengaduan Sekolah</h1>
        <h2>Kami <span class="typed" data-typed-items="Melayani dengan Baik, Membantu dan Mendampingi, Mendengarkan Aspirasi Siswa"></span></h2>
        <div class="actions">
          <a href="#cari" class="btn-get-started">Mulai Sekarang</a>
          <a href="/tentang" class="btn-services">Tentang Kami</a>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('login') }}" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><img style="width:8%" src="{{asset('frontend/img/logo.png')}}">&nbsp;Pengaduan Sekolah</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                </div>
            <a href="#lapor" class="btn btn-primary py-2 px-4 ms-3">Pelaporan</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Banner Start -->
    {{-- <div class="container-fluid">
        <div class="container">
            <div class="row gx-0"  id="cari">
                
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Cari Tau Status Pelaporan</h3>
                        <p class="text-white mb-3" style="font-size:15px;">*Masukan kode unik pelaporan kalian untuk melihat tanggapan dan status pelaporan kalian.</p>
                        <form action="/cari" method="post">
                            @csrf
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                            name="cari" placeholder="Masukan Kode Pelaporan" value="{{ old('cari') }}"style="height: 40px;">
                        </div>
                        
                        <input type="submit" class="btn btn-light">
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5">
                        <h3 class="text-white">Hasil Pencarian</h3>
                            @if(!empty($spesifik))
                                <table style="border:none;color:white;">
                                    <tr>
                                        <th style="width:30%;" class="detailtable">NIS</th>
                                        <td><b>: {{$spesifik->siswa->nis}}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">kategori</th>
                                        <td><b>: {{$spesifik->kategori->ket_kategori}}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Status</th>
                                        <td><b>: 
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
                                                <span class="px-3 bg-gradient-invalid rounded text-white">Belum Ditanggapi
                                                </span>
                                            @endif
                                        </b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Isi Laporan</th>
                                        <td><b>: {{$spesifik->ket}}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="detailtable">Foto</th>
                                        <td><b>: <img src="{{asset('foto')}}/{{$spesifik->foto}}" style="width:100px;"></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>
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
                                @if(empty($aspirasis->feedback))
                                <div class="form-group"><br>
                                    <a href="{{route('aspirasi.show',[$spesifik->id_pelaporan])}}">
                                        <button class="btn btn-primary">Beri Tanggapan</button>
                                    </a>

                                @else
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
    </div> --}}
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
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Ajukan Pertanyaan Sekarang!</h1>
                        <form action="{{ route('pertanyaan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <textarea name="pertanyaan"class="form-control  @error('pertanyaan') is-invalid @enderror" value="{{ old('pertanyaan') }}" maxlength="50" required id="pertanyaan">Isi pertanyaan{{ old('pertanyaan') }}</textarea>
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
                                    <select class="form-select bg-light border-0" name="id_kategori" style="height: 55px;">
                                        <option selected disabled><b>Kategori</b></option>
                                        @if(count(App\Models\Kategori::all())>0)
                                            @foreach($kategoris as $kategori)
                                                <option value="{{$kategori->id_kategori}}">{{$kategori->kategori}}</option>
                                            @endforeach
                                        @else
                                                <option disabled selected value="">-- Tidak ada kategori --</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" name="id_kelas" style="height: 55px;">
                                        <option selected disabled><b>kelas</b></option>
                                        @if(count(App\Models\Kelas::all())>0)
                                            @foreach($kelass as $kelas)
                                                <option value="{{$kelas->id_kelas}}">{{$kelas->kelas}}</option>
                                            @endforeach
                                        @else
                                                <option disabled selected value="">-- Tidak ada kelas --</option>
                                        @endif
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
</body>

</html>