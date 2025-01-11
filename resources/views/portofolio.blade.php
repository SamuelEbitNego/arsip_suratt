<!DOCTYPE html>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kominfotik</title>
     <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

     <style>
          :root {
               --primary-color: #e31837;
               --secondary-color: #002147;
               --text-color: #333333;
               --transition: all 0.3s ease;
          }

          body {
               font-family: 'Poppins', sans-serif;
               color: var(--text-color);
               margin: 0;
               padding: 0;
               overflow-x: hidden;
          }

          .navbar-custom {
               background-color: white;
               box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
               padding: 0.5rem 1rem;
          }

          .navbar-custom .navbar-brand img {
               height: 80px;
               width: auto;
          }

          .navbar-custom .nav-link {
               color: var(--text-color);
               font-weight: 500;
               padding: 0.5rem 1rem;
               margin: 0 0.2rem;
               transition: var(--transition);
          }

          .navbar-custom .nav-link:hover,
          .navbar-custom .nav-link.active {
               color: white;
               background-color: var(--primary-color);
               border-radius: 6px;
          }

          .navbar-custom .login-btn {
               background-color: var(--primary-color);
               color: white;
               border-radius: 6px;
          }

          .navbar-custom .login-btn:hover {
               background-color: var(--secondary-color);
          }

          /* Hero Section */
          .hero {
               position: relative;
               min-height: 500px;
               margin-top: 70px;
               overflow: hidden;
          }

          .hero-img {
               width: 100%;
               height: 200%;
               filter: brightness(40%);
          }

          .hero-content {
               position: absolute;
               top: 50%;
               left: 50%;
               transform: translate(-50%, -50%);
               text-align: center;
               width: 90%;
               max-width: 1200px;
               z-index: 2;
          }

          .hero-title {
               color: white;
               font-size: 3rem;
               font-weight: 700;
               margin-bottom: 1.5rem;
               line-height: 1.2;
          }

          .hero-btn {
               background-color: var(--primary-color);
               color: white;
               padding: 0.8rem 2rem;
               border-radius: 6px;
               font-weight: 500;
               transition: var(--transition);
               text-decoration: none;
               display: inline-block;
          }

          .hero-btn:hover {
               background-color: var(--secondary-color);
               color: white;
               transform: translateY(-2px);
          }

          /* Footer */
          footer {
               text-align: center;
               background-color: #333333;
               color: white;
               padding: 30px 0;
          }

          /* Responsive Styles */
          @media (max-width: 767px) {
               .hero-title {
                    font-size: 1.8rem;
               }

               .navbar-custom .navbar-brand img {
                    height: 60px;
               }

               .navbar-custom .nav-link {
                    font-size: 0.9rem;
               }

               .hero-btn {
                    padding: 0.6rem 1.5rem;
                    font-size: 0.9rem;
               }

               footer {
                    padding-top: 20px;
                    font-size: 12px;
               }

               .container {
                    padding-left: 1rem;
                    padding-right: 1rem;
               }

               .hero {
                    height: 50vh;
               }

               .hero-img {
                    filter: brightness(50%);
               }

               .hero-content {
                    width: 100%;
               }
          }

          @media (max-width: 991px) {
               .hero-title {
                    font-size: 2.2rem;
               }

               .hero-btn {
                    padding: 0.8rem 1.8rem;
                    font-size: 1rem;
               }

               .navbar-custom .navbar-brand img {
                    height: 70px;
               }
          }

          /* Adjust section text alignment for small screens */
          @media (max-width: 576px) {
               .container h2 {
                    font-size: 1.5rem;
                    text-align: center;
               }

               .container p,
               .container ul {
                    font-size: 1rem;
                    text-align: justify;
               }

               .container .btn {
                    font-size: 0.9rem;
                    padding: 0.6rem 1.2rem;
               }
          }

          .card {
               background-color: white;
               border-radius: 8px;
               box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
               margin: 10px;
               padding: 20px;
               width: 45%;
               display: flex;
               align-items: center;
          }

          .card img {
               border-radius: 8px;
               margin-right: 20px;
          }

          .card h3 {
               margin: 0;
               font-size: 1.2em;
               color: #2c3e50;
          }

          .card p {
               margin: 5px 0 0;
               color: #7f8c8d;
          }

          .card hr {
               border: 0;
               border-top: 1px solid #ecf0f1;
               margin: 10px 0;
          }

          .header {
               display: flex;
               justify-content: space-between;
               align-items: center;
          }

          .header img {
               height: 50px;
          }

          .header nav {
               display: flex;
               gap: 10px;
          }

          .header nav a {
               text-decoration: none;
               color: white;
               background-color: orangered;
               padding: 10px 20px;
               border-radius: 5px;
          }

          .content {
               display: flex;
               justify-content: space-between;
               align-items: center;
               margin-top: 50px;
          }

          .content .text {
               max-width: 50%;
          }

          .content .text h1 {
               color: #333;
               font-size: 24px;
          }

          .content .text p {
               color: #333;
               font-size: 16px;
          }

          .content .text button {
               background-color: orangered;
               color: white;
               border: none;
               padding: 10px 20px;
               border-radius: 5px;
               cursor: pointer;
          }

          .content .image img {
               max-width: 100%;
          }

          @media (max-width: 768px) {
               .container {
                    padding: 20px;
               }

               .task-item {
                    padding: 15px 15px 15px 50px;
               }
          }

          .task-list {
               list-style: none;
               padding: 0;
               margin: 0;
          }

          .task-item {
               background: white;
               margin-bottom: 15px;
               padding: 20px 25px 20px 60px;
               border-radius: 12px;
               position: relative;
               transition: all 0.3s ease;
               border: 1px solid #e2e8f0;
               display: flex;
               align-items: center;
          }

          .task-item::before {
               content: '';
               position: absolute;
               left: 25px;
               width: 24px;
               height: 24px;
               background: var(--primary);
               border-radius: 50%;
               opacity: 0.2;
          }

          .task-item::after {
               content: '✓';
               position: absolute;
               left: 31px;
               color: var(--primary);
               font-size: 14px;
               font-weight: bold;
          }

          .task-item:hover {
               transform: translateY(-2px);
               box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
               border-color: var(--primary);
          }

          .task-content {
               color: var(--text);
               font-size: 16px;
               line-height: 1.6;
          }

          .task-number {
               position: absolute;
               right: 20px;
               top: 50%;
               transform: translateY(-50%);
               color: #94a3b8;
               font-size: 14px;
               font-weight: 600;
          }

          /* Styling umum */
          section {
               padding: 80px 0;
          }

          /* About section styling */
          .about-content {
               padding-right: 30px;
          }

          .feature-item {
               display: flex;
               align-items: center;
               margin-bottom: 15px;
          }

          .feature-item i {
               font-size: 1.2rem;
               margin-right: 15px;
               color: var(--primary-color);
          }

          .about-image img {
               border-radius: 15px;
               box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
               transition: transform 0.3s ease;
          }

          .about-image img:hover {
               transform: translateY(-10px);
          }

          /* Card styling */
          .card {
               border: none;
               border-radius: 15px;
               overflow: hidden;
               transition: transform 0.3s ease;
          }

          .card:hover {
               transform: translateY(-5px);
          }

          /* Responsive fixes */
          @media (max-width: 991px) {
               .about-content {
                    padding-right: 0;
                    text-align: center;
                    margin-bottom: 40px;
               }

               .feature-item {
                    justify-content: center;
               }
          }

          @media (max-width: 768px) {
               section {
                    padding: 60px 0;
               }

               .hero-title {
                    font-size: 2rem;
               }

               .card {
                    margin: 15px;
               }
          }

          /* Animation */
          .fade-in {
               animation: fadeIn 1s ease-in;
          }

          @keyframes fadeIn {
               from {
                    opacity: 0;
                    transform: translateY(20px);
               }

               to {
                    opacity: 1;
                    transform: translateY(0);
               }
          }

          /* Navbar improvements */
          .navbar-custom {
               transition: all 0.3s ease;
               padding: 1rem;
          }

          .navbar-custom.scrolled {
               padding: 0.5rem 1rem;
               background: rgba(255, 255, 255, 0.95);
          }

          /* Card grid improvements */
          .card-grid {
               display: grid;
               grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
               gap: 30px;
               padding: 20px;
          }

          /* Staff cards */
          .staff-card {
               background: white;
               border-radius: 15px;
               overflow: hidden;
               transition: all 0.3s ease;
               margin: 15px;
               width: 100%;
               max-width: 350px;
          }

          .staff-card:hover {
               transform: translateY(-10px);
               box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
          }

          .staff-card img {
               width: 100%;
               height: 250px;
               object-fit: cover;
          }

          .staff-info {
               padding: 20px;
               text-align: center;
          }

          .staff-info h3 {
               margin: 10px 0;
               color: var(--text-color);
          }

          .staff-info p {
               color: #666;
               margin-bottom: 0;
          }

          .contact-container {
               max-width: 500px;
               margin: 50px auto;
               padding: 20px;
               background: #ffffff;
               border-radius: 10px;
               box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
               text-align: center;
          }

          form {
               display: flex;
               flex-direction: column;
               gap: 15px;
          }

          .form-group {
               text-align: left;
          }

          label {
               font-size: 0.9rem;
               color: #555;
          }

          input,
          textarea {
               width: 100%;
               padding: 10px;
               margin-top: 5px;
               font-size: 0.9rem;
               border: 1px solid #ddd;
               border-radius: 5px;
               outline: none;
               transition: 0.3s;
          }

          input:focus,
          textarea:focus {
               border-color: #4facfe;
               box-shadow: 0 0 5px rgba(79, 172, 254, 0.5);
          }

          @media (max-width: 600px) {
               .contact-container {
                    margin: 20px;
                    padding: 15px;
               }
          }

          .footer {
               color: white;
               height: 100%;
               text-align: left;
               font-size: 14px;
               padding-left: 45px;
          }

          footer {
               font-size: 14px;
          }
     </style>

</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
          <div class="container">
               <a class="navbar-brand" href="#Beranda">
                    <img src="{{ asset('assets/img/kominfotik.jpg') }}" alt="Kominfotik Logo">
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars"></i>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <a href="#Beranda" class="nav-link">Beranda</a>
                         </li>
                         <li class="nav-item">
                              <a href="#TataUsaha" class="nav-link">Tata Usaha</a>
                         </li>
                         <li class="nav-item">
                              <a href="{{ route('tentang') }}" class="nav-link">Tentang</a>
                         </li>
                         <li class="nav-item">
                              <a href="#Kontak" class="nav-link">Kontak</a>
                         </li>
                         <li class="nav-item">
                              <a href="{{ url('/login') }}" class="nav-link">Login</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>

     <section id="Beranda" class="hero">
          <img src="{{ asset('assets/img/jkt.png') }}" alt="Jakarta Timur" class="hero-img">
          <div class="hero-content">
               <h2 class="hero-title">Suku Dinas Komunikasi, Informatika dan Statistik<br>Kota Administrasi Jakarta Timur</h2>
               <a href="#Profile" class="hero-btn">
                    Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
               </a>
          </div>
     </section>

     <section id="TataUsaha" class="container py-5">
          <h2 class="text-center mb-4"><b>Tata Usaha</b></h2>
          <h3 class="text-left"><b>Kedudukan dan Tugas</b></h3>
          <p>Kepala Subbagian Tata Usaha berkedudukan di bawah dan bertanggung jawab kepada Kepala Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</p>
          <p>Subbagian Tata Usaha mempunyai tugas :
          </p>
          <ul class="task-list">
               <li class="task-item">
                    <div class="task-content">melaksanakan pengelolaan barang milik daerah Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengelolaan kerumahtanggaan, ketatalaksanaan, ketatausahaan, kearsipan dan kehumasan Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengelolaan dan pengoordinasian data dan sistem informasi Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengelolaan kepegawaian Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan penyusunan bahan analisis jabatan dan analisis beban kerja Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan penyusunan rincian tugas dan fungsi Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengoordinasian penyusunan Rencana Strategis, Rencana Kerja, dan Rencana Kerja dan Anggaran Dinas Komunikasi, Informatika dan Statistik sesuai lingkup tugasnya</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengoordinasian pelaksanaan Rencana Strategis dan Dokumen Pelaksanaan Anggaran Dinas Komunikasi, Informatika dan Statistik sesuai lingkup tugasnya</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pemantauan dan evaluasi pelaksanaan Rencana Strategis dan Dokumen Pelaksanaan Anggaran Dinas Komunikasi, Informatika dan Statistik sesuai lingkup tugasnya</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengoordinasian penyusunan proses bisnis, standar, dan prosedur Suku Dinas Komunikasi, Informatika dan Statistik Kota Administras</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan pengoordinasian dan penyusunan pelaporan kinerja, kegiatan, dan akuntabilitas Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">Melaksanakan penatausahaan keuangan Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">melaksanakan pengoordinasian dan penyusunan laporan keuangan Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
               <li class="task-item">
                    <div class="task-content">melaksanakan pengoordinasian penyelesaian tindak lanjut hasil pemeriksaan dan/atau pengawasan Badan Pemeriksa Keuangan dan Aparat Pengawasan Internal Pemerintah pada Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi</div>
                    <span class="task-number"></span>
               </li>
          </ul>
     </section>

     <section id="TataUsaha" class="container py-5">
          <h2 class="text-left"><b>ASN Subbagian Tata Usaha</b></h2>
          <center>
               <div class="card">
                    <img alt="Portrait of Eva Monica" height="190" src="assets/img/11.jpg" width="180" />
                    <div>
                         <h3>
                              Eva Monica
                         </h3>
                         <hr />
                         <p>
                              Kepala Sub Bagian Tata Usaha
                         </p>
                    </div>
               </div>
               <div class="card">
                    <img alt="Portrait of Rodin Daulat G.T" height="200" src="assets/img/12.jpg" width="150" />
                    <div>
                         <h3>
                              Rodin Daulat G.T
                         </h3>
                         <hr />
                         <p>
                              Staf Sub Bagian Tata Usaha
                         </p>
                    </div>
               </div>
               <div class="card">
                    <img alt="Portrait of Arifiadi Patahuddi" height="200" src="assets/img/13.jpg" width="150" />
                    <div>
                         <h3>
                              Arifiadi Patahuddi
                         </h3>
                         <hr />
                         <p>
                              Staf Sub Bagian Tata Usaha
                         </p>
                    </div>
               </div>
     </section>

     <section id="Tentang" class="container py-5">
          <h2 class="text-center mb-5"><b>Tentang Aplikasi</b></h2>
          <div class="row align-items-center">
               <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-content">
                         <h3 class="mb-4">Aplikasi (SURATKU) Surat Masuk & Keluar</h3>
                         <p class="lead mb-4">
                              Selamat Datang di Aplikasi SURATKU! Sistem list surat masuk dan surat keluar yang dirancang khusus untuk Kominfotik Jakarta Timur.
                         </p>
                         <div class="features">
                              <div class="feature-item">
                                   <i class="fas fa-check-circle text-primary"></i>
                                   <span>Mengelola list surat masuk dan keluar</span>
                              </div>
                              <div class="feature-item">
                                   <i class="fas fa-check-circle text-primary"></i>
                                   <span>Export PDF & Excel</span>
                              </div>
                              <div class="feature-item">
                                   <i class="fas fa-check-circle text-primary"></i>
                                   <span>Import Excel</span>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-6">
                    <div class="about-image">
                         <center>
                              <img src="assets/img/sirakus.jpg" alt="SURATKU App" class="img-fluid rounded shadow" width="300" height="300">
                         </center>
                    </div>
               </div>
          </div>
     </section>
     
     <center>
          <h2>Lokasi</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3769643702744!2d106.94143267387672!3d-6.213914860862175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b61dd05f57b%3A0x7601c31f974bfca7!2sKantor%20Walikota%20Jakarta%20Timur!5e0!3m2!1sid!2sid!4v1731734729976!5m2!1sid!2sid" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </center>
     <br>
     <footer>
          <h3 class="footer">Kontak Kami</h3>
          <p class="footer">JL. Dr. Sumarno Pulogebang</p>
          <p class="footer">Gedung Blok B1 LT.3</p>
          <p class="footer"><strong>Heldesk:</strong> <i class="fa-solid fa-phone"></i> +62821-2509-6819</p>
          <p class="footer"><strong>Email:</strong> <i class="fa-solid fa-envelope"></i> kominfotikjt@jakarta.go.id</p>
          <br>
          <p>&copy; 2024 Sudin <b>Kominfotik Jakarta Timur</b></p>
     </footer>

     <!-- JS Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>