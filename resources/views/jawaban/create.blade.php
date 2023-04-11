<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ingin Tahu | Tanyakan Pertanyaan Anda!</title>
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

  
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script defer src="https://unpkg.com/mathlive"></script>
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
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="{{ route('login') }}" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><img style="width:15%" src="{{asset('frontend/img/logo.jpg')}}">&nbsp;ingin Tahu</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#searchModal" class="btn btn-primary py-2 px-4 ms-3">Cari Pertanyaan yang sudah terjawab!</a>
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
                            <button type="submit" class="btn btn-primary em-4"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jawab Soal Ini</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('jawaban.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$pertanyaan->id_pertanyaan}}" name="id_pertanyaan"required>
            <input type="hidden" value="{{$pertanyaan->id_user}}" name="id_user" required> {{--ini nanti diganti --}}
            <input type="hidden" value="0" name="rating"required>
                <div class="card-body">
                    <div class="form-group"> <?php echo $pertanyaan->pertanyaan ?></div>
                  </div>
                
                  <div class="form-group">
                  <div id="editor"></div>
                    <math-field id="formula" style="width:100%;"></math-field>
                    <input type="hidden" name="jawaban"class="form-control  @error('jawaban') is-invalid @enderror" value="{{ old('jawaban') }}" maxlength="50" required id="jawaban">
                    @error('jawaban')
                        <span class="invalid-feedback" kelas="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>

                      <div class="form-group">
                        <label for="examplepertanyaanFile">Foto</label>
                        <div class="pertanyaan-group">
                          <div class="custom-file">
                            <input name="foto" id="foto" type="file" class="custom-file-pertanyaan" id="examplepertanyaanFile">
                             </div>
                        </div>
                        <div class="pertanyaan-group-append">
                          <img id="preview" style="margin-top:10px;max-width:100px;" src="#" alt="" />
                        </div>
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
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: 10px;">
      <div class="container pt-5">
          <div class="row g-5 pt-4">
              <div class="col-lg-3 col-md-6">
              <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"></i>Komunitas Ingi Tahu</p>
                    <p class="mb-2"></i>Pedoman Komunitas</p>
                    <p class="mb-0"></i>Kebijakan Privasi</p>
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
                  <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">ingin Tahu</a>. All Rights Reserved.</p>
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
    document.querySelector("input[name='jawaban']").value = quill.root.innerHTML+"<math-field read-only style='border:none'>"+mf.value+"</math-field>";
  });
  
  const mf = document.getElementById("formula");
  const latex = document.getElementById("jawaban");

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
