<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporPak.com</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            color: #333;
        }
        
        header {
            background-color: #ffffff;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header img {
            height: 40px;
        }
        
        header .logo-1 {
            float: left;
            font-size: 25px;
            font-weight: bold;
            color: #4472C2;
        }
        
        .logo {
            display: flex;
            gap: 10px;
        }
        
        header nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }
        
        header nav ul li a {
            position: relative;
            color: black;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 15px;
            transition: color 0.3s ease;
        }
        
        header nav ul li a:hover {
            color: #4472C2;
        }
        
        header nav ul li a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #4472C2;
            transition: width 0.3s ease;
        }
        
        header nav ul li a:hover::after {
            width: 100%;
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
        }
        
        .hamburger i {
            font-size: 24px;
            color: black;
        }
        
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/tes12.jpg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
            filter: brightness(0.8) contrast(1.2) saturate(1);
        }
        
        .hero h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        
        .hero button {
            background-color: #4472C2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
        }
        
        .steps {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 50px 0;
            background-color: #ffffff;
        }
        
        .steps-content {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 150px;
            flex-wrap: wrap;
        }
        
        .step {
            text-align: center;
            max-width: 250px;
            margin-bottom: 30px;
        }
        
        .icon {
            display: inline-block;
            text-align: center;
            background-color: #000;
            color: #000;
            padding: 20px;
            border-radius: 50%;
            font-size: 40px;
            margin-bottom: 20px;
            width: 95px;
            height: 95px;
        }
        
        .steps .step:nth-child(1) .icon {
            background-color: #4970BB;
        }
        
        .steps .step:nth-child(2) .icon {
            background-color: #DDF5C1;
        }
        
        .steps .step:nth-child(3) .icon {
            background-color: #FFE5B4;
        }
        
        h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        
        p {
            font-size: 1rem;
        }
        
        .why-choose-us {
            background-color: #D1DFF6;
            padding: 10px 10px;
            text-align: center;
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .stat {
            padding: 30px 20px;
            border-radius: 10px;
            width: 220px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .stat i {
            font-size: 40px;
            color: #5B82CA;
            margin-bottom: 15px;
        }
        
        .stat h3 {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }
        
        .stat h4 {
            font-size: 18px;
            color: #666;
            margin-top: 5px;
        }
        
        .services {
            background-color: #ffffff;
            padding: 60px 20px;
            text-align: center;
        }
        
        .services h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        
        .services p {
            font-size: 1.1rem;
            margin-bottom: 40px;
            color: #555;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .service-list {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            padding: 20px;
            margin: 0 auto;
        }
        
        .service {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .service h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: black;
        }
        
        .service p {
            font-size: 1rem;
            color: #666;
        }
        
        .fire-report {
            background-color: #DDFBC0;
        }
        
        .medical-report {
            background-color: #D3DFF7;
        }
        
        .theft-report {
            background-color: #F2D4AE;
        }
        
        .read-more {
            background-color: #ffffff;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
        }
        
        .read-more:hover {
            background-color: #0056b3;
        }
        
        .partners-section {
            background-color: #ffffff;
            padding: 40px 0;
            text-align: center;
            overflow: hidden;
        }
        
        .partners-section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        
        .partners-logos {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            animation: scroll 25s linear infinite;
        }
        
        .partners-logos img {
            width: 200px;
            height: 200px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        
        .partners-logos img:hover {
            transform: scale(1.1);
        }
        
        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        
        .partners-section {
            margin: 20px 0;
        }
        
        .footer {
            background-color: #1a2b48;
            color: #ffffff;
            padding: 40px 20px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-content div {
            width: 23%;
        }
        
        .footer-content h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .footer-content p,
        .footer-content ul {
            font-size: 14px;
            line-height: 1.6;
        }
        
        .footer-content ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-content ul li {
            margin-bottom: 8px;
        }
        
        .footer-content ul li a {
            color: #ffffff;
            text-decoration: none;
        }
        
        .footer-content ul li a:hover {
            text-decoration: underline;
        }
        /* Responsive Media Queries */
        
        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                align-items: flex-start;
            }
            nav ul {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: white;
                position: absolute;
                top: 60px;
                left: 0;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            /* Menampilkan hamburger icon di layar kecil */
            .hamburger {
                display: flex;
            }
            /* Menampilkan menu saat hamburger diklik */
            nav ul.active {
                display: flex;
            }
            .steps-content {
                flex-direction: column;
                gap: 40px;
            }
            .steps .step {
                max-width: 100%;
            }
            .service-list {
                gap: 20px;
            }
            .partners-logos {
                flex-direction: column;
                gap: 20px;
            }
            .partners-section h2 {
                font-size: 1.5rem;
            }
            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
            .footer-content div {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="img/2.png" alt="logo">
                <h1 class="logo-1">LaporPak.com</h1>
            </div>
            <nav>
                <!-- Hamburger Icon dari Font Awesome -->
                <div class="hamburger" id="hamburger-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="nav-links">
                    <li><a href="/login" class="disabled-link">Masuk</a></li>
                    <li><a href="/register" class="disabled-link">Daftar</a></li>

                    <li><a href="/home">Home</a></li>
                    <li><a href="#contac">Contact us</a></li>
                </ul>
            </nav>
            <div class="profile" onclick="toggleDropdown()">
                <img src="img/5.png" alt="Profile Image">
                <span>{{ $nama }} ▼</span>
                
                <!-- Dropdown Menu -->
                <div class="dropdown-menu" id="dropdownMenu">
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" style="border: none; background: none; padding: 8px 12px; color: #333; cursor: pointer;">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
            
            
            
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
            <p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
            <button onclick="scrollToContact()">Contact us</button>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="steps">
        <div class="container">
            <div class="steps-content">
                <div class="step">
                    <div class="icon"><i class="fas fa-folder"></i></div>
                    <h3>Tulis Laporan</h3>
                    <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                    <h3>Proses Tindak Lanjut</h3>
                    <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-star"></i></div>
                    <h3>Beri Tanggapan</h3>
                    <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="why-choose-us">
            <div class="stats">
                <div class="stat">
                    <i class="fas fa-handshake"></i>
                    <h3>34</h3>
                    <h3>Kementerian</h3>
                </div>

                <!-- Lembaga with chart logo -->
                <div class="stat">
                    <i class="fas fa-chart-line"></i>
                    <h3>100</h3>
                    <h3>Lembaga</h3>
                </div>

                <!-- Pemkab with people logo -->
                <div class="stat">
                    <i class="fas fa-users"></i>
                    <h3>396</h3>
                    <h3>Pemkab</h3>
                </div>

                <!-- Pemprov with phone logo -->
                <div class="stat">
                    <i class="fas fa-phone-alt"></i>
                    <h3>34</h3>
                    <h3>Pemprov</h3>
                </div>
            </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <h1>Services</h1>
        <p>Laporpak.com dibentuk untuk merealisasikan kebijakan "no wrong door policy" yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang menangani.</p>

        <!-- Service List Section -->
        <div class="service-list">
            <div class="service fire-report">
                <h3>Laporan Kebakaran</h3>
                <p>Laporankan terkait kebakaran yang terjadi disekitarmu.</p>
                <button onclick="window.location.href='{{ auth()->user()->role == 'User' ? '/kebakaranU' : '/kebakaran' }}'" class="read-more">Ajukan Laporan</button>
            </div>
            <div class="service medical-report">
                <h3>Laporan Medis</h3>
                <p>Laporankan terkait Medis yang terjadi disekitarmu.</p>
                <button onclick="window.location.href='{{ auth()->user()->role == 'User' ? '/medisU' : '/medis' }}'" class="read-more">Ajukan Laporan</button>
            </div>
            <div class="service theft-report">
                <h3>Laporan Pencurian</h3>
                <p>Laporankan terkait pencurian yang terjadi disekitarmu.</p>
                <button onclick="window.location.href='{{ auth()->user()->role == 'User' ? '/pencurianU' : '/pencurian' }}'" class="read-more">Ajukan Laporan</button>
            </div>
        </div>
        
    </section>




    <!-- Partners Section -->
    <section class="partners-section">
        <h2>Dikelolah Oleh</h2>
        <div class="partners-logos">
            <img src="img/3.png" alt="Partner 1">
            <img src="img/4.png" alt="Partner 2">
            <img src="img/p3.png" alt="Partner 3">
            <img src="img/p4.png" alt="Partner 4"> 
            <img src="img/p6.png" alt="Partner 5"> 
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content container">
            <div>
                <h3>LaporPak.com</h3>
                <p>Platform pengaduan dan aspirasi rakyat untuk mempermudah komunikasi antara masyarakat dan instansi pemerintah</p>
            </div>
            <div>
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li>
                        <a href="{{ auth()->user()->role == 'User' ? '/kebakaranU' : '/kebakaran' }}">
                            Laporan Kebakaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ auth()->user()->role == 'User' ? '/medisU' : '/medis' }}">
                            Laporan Medis
                        </a>
                    </li>
                    <li>
                        <a href="{{ auth()->user()->role == 'User' ? '/pencurianU' : '/pencurian' }}">
                            Laporan Pencurian
                        </a>
                    </li>
                </ul>
            </div>
            <div id="contac">
                <h3>Contact Us</h3>
                <p>Jl. Raya No. 123, Surabaya</p>
                <p>Phone: (021) 123-4567</p>
                <p>Email: support@laporpak.com</p>
            </div>
        </div>
    </footer>

    <script>
        function scrollToContact() {
            document.getElementById('contac').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
    <style>
        .disabled-link {
    color: transparent; /* Membuat teks transparan */
    pointer-events: none; /* Menonaktifkan klik */
    cursor: default; /* Mengubah cursor agar tidak menunjukkan link */
    }

    .profile {
    position: relative;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    }

    .profile span {
        margin-left: 8px;
        font-weight: bold;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 1000;
    }

    .dropdown-menu button {
        display: block;
        width: 100%;
        text-align: left;
        color: #333;
        background: none;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        font-size: 14px;
    }

    .dropdown-menu button:hover {
        background-color: #f5f5f5;
    }

    </style>

    <script>
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
}

// Menutup dropdown jika pengguna mengklik di luar area dropdown
window.onclick = function(event) {
    if (!event.target.closest(".profile")) {
        document.getElementById("dropdownMenu").style.display = "none";
    }
}


    </script>
</body>
<<<<<<< HEAD

</html>
=======
</html>

---Home Page---
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporPak.com</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            color: #333;
        }
        
        header {
            background-color: #ffffff;
            padding: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header img {
            height: 40px;
        }
        
        header .logo-1 {
            float: left;
            font-size: 25px;
            font-weight: bold;
            color: #4472C2;
        }
        
        .logo {
            display: flex;
            gap: 10px;
        }
        
        header nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }
        
        header nav ul li a {
            position: relative;
            color: black;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 8px 15px;
            transition: color 0.3s ease;
        }
        
        header nav ul li a:hover {
            color: #4472C2;
        }
        
        header nav ul li a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #4472C2;
            transition: width 0.3s ease;
        }
        
        header nav ul li a:hover::after {
            width: 100%;
        }
        
        .hamburger {
            display: none;
            cursor: pointer;
        }
        
        .hamburger i {
            font-size: 24px;
            color: black;
        }
        
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./img/1.jpeg') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
            filter: brightness(0.8) contrast(1.2) saturate(1);
        }
        
        .hero h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        
        .hero button {
            background-color: #4472C2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
        }
        
        .steps {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 50px 0;
            background-color: #ffffff;
        }
        
        .steps-content {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 150px;
            flex-wrap: wrap;
        }
        
        .step {
            text-align: center;
            max-width: 250px;
            margin-bottom: 30px;
        }
        
        .icon {
            display: inline-block;
            text-align: center;
            background-color: #000;
            color: #000;
            padding: 20px;
            border-radius: 50%;
            font-size: 40px;
            margin-bottom: 20px;
            width: 95px;
            height: 95px;
        }
        
        .steps .step:nth-child(1) .icon {
            background-color: #4970BB;
        }
        
        .steps .step:nth-child(2) .icon {
            background-color: #DDF5C1;
        }
        
        .steps .step:nth-child(3) .icon {
            background-color: #FFE5B4;
        }
        
        h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        
        p {
            font-size: 1rem;
        }
        
        .why-choose-us {
            background-color: #D1DFF6;
            padding: 10px 10px;
            text-align: center;
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .stat {
            padding: 30px 20px;
            border-radius: 10px;
            width: 220px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat:hover {
            transform: translateY(-10px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .stat i {
            font-size: 40px;
            color: #5B82CA;
            margin-bottom: 15px;
        }
        
        .stat h3 {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }
        
        .stat h4 {
            font-size: 18px;
            color: #666;
            margin-top: 5px;
        }
        
        .services {
            background-color: #ffffff;
            padding: 60px 20px;
            text-align: center;
        }
        
        .services h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }
        
        .services p {
            font-size: 1.1rem;
            margin-bottom: 40px;
            color: #555;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .service-list {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            padding: 20px;
            margin: 0 auto;
        }
        
        .service {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .service h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: black;
        }
        
        .service p {
            font-size: 1rem;
            color: #666;
        }
        
        .fire-report {
            background-color: #DDFBC0;
        }
        
        .medical-report {
            background-color: #D3DFF7;
        }
        
        .theft-report {
            background-color: #F2D4AE;
        }
        
        .read-more {
            background-color: #ffffff;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
        }
        
        .read-more:hover {
            background-color: #0056b3;
        }
        
        .partners-section {
            background-color: #ffffff;
            padding: 40px 0;
            text-align: center;
            overflow: hidden;
        }
        
        .partners-section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        
        .partners-logos {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            animation: scroll 25s linear infinite;
        }
        
        .partners-logos img {
            width: 200px;
            height: 200px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        
        .partners-logos img:hover {
            transform: scale(1.1);
        }
        
        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        
        .partners-section {
            margin: 20px 0;
        }
        
        .footer {
            background-color: #1a2b48;
            color: #ffffff;
            padding: 40px 20px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-content div {
            width: 23%;
        }
        
        .footer-content h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .footer-content p,
        .footer-content ul {
            font-size: 14px;
            line-height: 1.6;
        }
        
        .footer-content ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-content ul li {
            margin-bottom: 8px;
        }
        
        .footer-content ul li a {
            color: #ffffff;
            text-decoration: none;
        }
        
        .footer-content ul li a:hover {
            text-decoration: underline;
        }
        /* Responsive Media Queries */
        
        @media (max-width: 768px) {
            header .container {
                flex-direction: column;
                align-items: flex-start;
            }
            nav ul {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: white;
                position: absolute;
                top: 60px;
                left: 0;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            }
            /* Menampilkan hamburger icon di layar kecil */
            .hamburger {
                display: flex;
            }
            /* Menampilkan menu saat hamburger diklik */
            nav ul.active {
                display: flex;
            }
            .steps-content {
                flex-direction: column;
                gap: 40px;
            }
            .steps .step {
                max-width: 100%;
            }
            .service-list {
                gap: 20px;
            }
            .partners-logos {
                flex-direction: column;
                gap: 20px;
            }
            .partners-section h2 {
                font-size: 1.5rem;
            }
            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
            .footer-content div {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="./img/2.png" alt="logo">
                <h1 class="logo-1">LaporPak.com</h1>
            </div>
            <nav>
                <!-- Hamburger Icon dari Font Awesome -->
                <div class="hamburger" id="hamburger-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Masuk</a></li>
                    <li><a href="#">Daftar</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
            <p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
            <button>Contact us</button>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="steps">
        <div class="container">
            <div class="steps-content">
                <div class="step">
                    <div class="icon"><i class="fas fa-folder"></i></div>
                    <h3>Tulis Laporan</h3>
                    <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                    <h3>Proses Tindak Lanjut</h3>
                    <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-star"></i></div>
                    <h3>Beri Tanggapan</h3>
                    <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="why-choose-us">
            <div class="stats">
                <div class="stat">
                    <i class="fas fa-handshake"></i>
                    <h3>34</h3>
                    <h3>Kementerian</h3>
                </div>

                <!-- Lembaga with chart logo -->
                <div class="stat">
                    <i class="fas fa-chart-line"></i>
                    <h3>100</h3>
                    <h3>Lembaga</h3>
                </div>

                <!-- Pemkab with people logo -->
                <div class="stat">
                    <i class="fas fa-users"></i>
                    <h3>396</h3>
                    <h3>Pemkab</h3>
                </div>

                <!-- Pemprov with phone logo -->
                <div class="stat">
                    <i class="fas fa-phone-alt"></i>
                    <h3>34</h3>
                    <h3>Pemprov</h3>
                </div>
            </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <h1>Services</h1>
        <p>Laporpak.com dibentuk untuk merealisasikan kebijakan "no wrong door policy" yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang menangani.</p>

        <!-- Service List Section -->
        <div class="service-list">
            <div class="service fire-report">
                <h3>Laporan Kebakaran</h3>
                <p>Laporankan terkait kebakaran yang terjadi disekitarmu.</p>
                <button class="read-more">Read More</button>
            </div>
            <div class="service medical-report">
                <h3>Laporan Medis</h3>
                <p>Laporankan terkait Medis yang terjadi disekitarmu.</p>
                <button class="read-more">Read More</button>
            </div>
            <div class="service theft-report">
                <h3>Laporan Pencurian</h3>
                <p>Laporankan terkait pencurian yang terjadi disekitarmu.</p>
                <button class="read-more">Read More</button>
            </div>
        </div>
    </section>




    <!-- Partners Section -->
    <section class="partners-section">
        <h2>Dikelolah Oleh</h2>
        <div class="partners-logos">
            <img src="./img/3.png" alt="Partner 1">
            <img src="./img/4.png" alt="Partner 2">
            <img src="./img/5.png" alt="Partner 3">
            <img src="./img/6.png" alt="Partner 4">
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content container">
            <div>
                <h3>LaporPak.com</h3>
                <p>Platform pengaduan dan aspirasi rakyat untuk mempermudah komunikasi antara masyarakat dan instansi pemerintah</p>
            </div>
            <div>
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Masuk</a></li>
                    <li><a href="#">Daftar</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Jl. Raya No. 123, Surabaya</p>
                <p>Phone: (021) 123-4567</p>
                <p>Email: support@laporpak.com</p>
            </div>
        </div>
    </footer>

</body>

</html>
>>>>>>> c0ce3ffdff5d4c2b4b302d68216e9d84d3bbedbf
