<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard Repository Dosen</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Login Bar */
        .login-bar {
            display: none;
        }

        .nav-bar {
            display: flex;
            gap: 20px;
            justify-content: flex-start;
            background-color: #009688;
            padding: 10px 20px;
            align-items: center;
        }

        .nav-bar .login-button-container {
            margin-left: auto;
        }

        /* Tombol Login */
        .nav-bar .login-bar-button {
            background-color: #d9534f;
            color: white;
            padding: clamp(6px, 2vw, 8px) clamp(15px, 4vw, 20px);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: clamp(14px, 2vw, 16px);
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .nav-bar .login-bar-button:hover {
            background-color: #c9302c;
        }

        /* Link */
        .nav-bar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 8px;
            border-radius: 5px;
            font-weight: 500;
            transition: background-color 0.3s, transform 0.3s;
            line-height: 1.6;
        }

        .nav-bar a:hover {
            background-color: #555;
            transform: translateY(-2px);
        }

        .nav-bar .login-button-container a:hover {
            background-color: transparent; /* Menghilangkan background hover pada tombol login */
        }

        /* Header Title */
        .header {
            background-color: #008080;
            padding: clamp(15px, 4vw, 20px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: clamp(45px, 5vw, 50px);
            font-weight: bold;
            margin: 0;
        }

        .header .title-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: clamp(70px, 10vw, 100px);
            height: auto;
            margin-right: clamp(10px, 3vw, 15px);
        }

        .header-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: white;
        }

        .header-link:hover, .header-link:focus {
            color: white;
            text-decoration: none;
        }

        /* Content Section */
        .content {
            padding: 20px;
        }

        /* Section Title */
        .section-title {
            font-size: 22px;
            color: #00796b;
            margin-bottom: 15px;
            margin-bottom: clamp(10px, 2vw, 15px);
        }

        .section-research-title {
            font-size: 22px;
            color: #00796b;
            margin-top: clamp(15px, 2vw, 30px);
            margin-bottom: clamp(10px, 2vw, 15px);
        }

        /* File List */
        .file-list {
            list-style-type: none;
            padding: 0;
        }

        .file-item a {
            color: #00796b;
            font-weight: bold;
            text-decoration: none;
            flex-grow: 1;
            font-size: clamp(14px, 2vw, 16px);
        }

        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: clamp(10px, 2vw, 15px);
            margin-bottom: clamp(5px, 1vw, 10px);
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            flex-wrap: wrap;
        }

        .file-item button {
            background-color: #00796b;
            color: white;
            font-size: clamp(11px, 2vw, 13px);
            padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .file-item button:hover {
            background-color: #005f56;
        }

        /* Research List */
        .research-list {
            list-style-type: none;
            padding: 0;
        }

        .research-item a {
            color: #00796b;
            font-weight: bold;
            text-decoration: none;
            flex-grow: 1;
            font-size: clamp(14px, 2vw, 16px);
        }

        .research-item {
            display: grid;
            grid-template-columns: 2fr 2fr 2fr auto;
            gap: 10px;
            align-items: center;
            padding: clamp(10px, 2vw, 15px);
            margin-bottom: clamp(5px, 1vw, 10px);
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            flex-wrap: wrap;
        }

        .research-item button {
            background-color: #00796b;
            color: white;
            font-size: clamp(11px, 2vw, 13px);
            padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .research-item button:hover {
            background-color: #005f56;
        }

        .research-details {
            font-size: clamp(12px, 2vw, 14px);
            color: #666;
        }

        .research-item p {
            color: #444;
            font-size: clamp(12px, 2vw, 14px);
        }

        .repo-info {
            background-color: #e0f2f1;
            padding: clamp(10px, 2vw, 15px);
            border-radius: 5px;
            margin-bottom: 15px;
            color: #004d40;
            font-size: clamp(12px, 2.5vw, 16px);
        }

        form {
            display: contents;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        .search-bar input {
            width: clamp(50%, 60%, 70%);
            padding: clamp(10px, 3vw, 15px) clamp(15px, 5vw, 20px);
            font-size: clamp(14px, 4vw, 18px);
            border: 1px solid #ddd;
            border-radius: 30px 0 0 30px;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 150, 136, 0.4);
            transition: box-shadow 0.3s;
        }

        .search-bar input:focus {
            box-shadow: 0 4px 8px rgba(0, 150, 136, 0.6);
        }

        .search-bar button {
            background-color: #00796b;
            color: white;
            border: none;
            padding: clamp(10px, 3vw, 15px) clamp(15px, 5vw, 25px);
            font-size: clamp(14px, 4vw, 18px);
            cursor: pointer;
            border-radius: 0 30px 30px 0;
            transition: background-color 0.3s;
            box-shadow: 0 2px 4px rgba(0, 150, 136, 0.4);
        }

        .search-bar button:hover {
            background-color: #005f56;
            box-shadow: 0 4px 8px rgba(0, 150, 136, 0.6);
        }

        .btn-custom {
            background-color: #00796b;
            color: white;
            padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            border-radius: clamp(10px, 2vw, 20px);
            border: none;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-custom:hover {
            background-color: #005f56;
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:active {
            background-color: #1e7e34;
            transform: translateY(1px);
        }

        /* Contact / Help Section */
        .botom-page {
            display: flex;
            background-color: #009688;
            padding: clamp(20px, 3vw, 30px);
        }

        @media (max-width: 1023px) {
            /* Profile Bar */
            .login-bar {
                padding: clamp(10px, 3vw, 20px);
                justify-content: space-between;
                background-color: #008080;
                padding: 10px 20px;
                display: flex;
                align-items: center;
                position: relative;
            }

            .login-bar .login-bar-button {
                background-color: #d9534f;
                color: white;
                padding: clamp(4px, 2vw, 6px) clamp(15px, 4vw, 18px);
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: clamp(12px, 2vw, 14px);
                font-weight: bold;
                transition: background-color 0.3s;
            }

            /* Nav Bar */
            .nav-bar {
                display: none;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                flex-direction: column;
                background-color: #008080;
                z-index: 100;
                text-align: left;
            }

            .nav-bar a {
                text-align: left;
                padding: 10px 0;
                width: 100%;
            }

            .nav-bar .login-button-container{
                display: none;
            }

            /* Hamburger Menu */
            .hamburger-menu {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                width: clamp(20px, 5vw, 30px);
                height: clamp(20px, 5vw, 30px);
                background: none;
                border: none;
                cursor: pointer;
            }

            .hamburger-menu span {
                display: block;
                height: 3px;
                background-color: white;
                width: 100%;
                border-radius: 5px;
            }

            /* Header */
            .header {
                display: none;
            }

            /* info */
            .repo-info {
                font-size: clamp(11px, 3vw, 15px);
                padding: clamp(8px, 3vw, 13px);
            }

            /* Search Bar */
            .search-bar {
                margin: 15px 0;
            }

            .search-bar input {
                width: clamp(55%, 60%, 75%);
                padding: clamp(12px, 3vw, 18px) clamp(16px, 5vw, 22px);
                font-size: clamp(16px, 4vw, 20px);
            }

            .search-bar button {
                padding: clamp(12px, 3vw, 18px) clamp(18px, 5vw, 28px);
                font-size: clamp(16px, 4vw, 20px);
            }

            .section-title {
                font-size: clamp(20px, 4vw, 22px);
                margin-bottom: clamp(8px, 3vw, 12px);
            }

            .section-research-title {
                font-size: clamp(20px, 4vw, 22px);
                margin-top: clamp(10px, 3vw, 20px);
                margin-bottom: clamp(8px, 3vw, 12px);
            }

            /* Jadwal */
            .file-item, .research-item {
                flex-direction: column;
                align-items: flex-start;
                gap: clamp(5px, 2vw, 10px);
            }

            .file-item a, .research-item a {
                margin-bottom: clamp(5px, 2vw, 10px);
            }

            .file-item button, .research-item button {
                width: 100%;
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            }

            /* Research */
            .research-item {
                grid-template-columns: 1fr; /* Adjust grid layout to single column */
            }

            .research-details {
                font-size: clamp(12px, 2vw, 14px);
            }

            .research-item p {
                font-size: clamp(12px, 2vw, 14px);
            }

            .botom-page {
                padding: clamp(15px, 4vw, 25px);
            }
        }
    </style>
</head>
<body>

    <!-- Login Bar -->
    <div class="login-bar">
        <button class="hamburger-menu" id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a href="{{ route('login') }}">
            <button class="login-bar-button" id="login-bar-button">Login</button>
        </a>
    </div>

    <!-- Header Title -->
    <div class="header">
        <div class="title-container">
            <a href="{{ url('/dashboard') }}" class="header-link">
                <img src="{{ asset('logo/Logo PNJ.png') }}" alt="Logo PNJ" class="logo">
                <h1>Dashboard Repository</h1>
            </a>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="nav-bar" id="nav-bar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('administration') }}">Administration</a>
        <a href="#">Course</a>
        <a href="#">Research</a>
        <a href="#">Collaboration</a>
        <div class="login-button-container">
            <a href="{{ route('login') }}">
                <button class="login-bar-button" id="login-bar-button">Login</button>
            </a>
        </div>
    </div>

    <!-- Repository Information Section -->
    <div class="content">
        <div class="repo-info">
            <p><strong>Repository Overview:</strong> This repository contains various academic resources for lecturers at Politeknik Negeri Jakarta, including course schedules, research publications, administrative documents, and collaboration materials. Resources are regularly updated to support academic and research activities.</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" id="search" name="search" placeholder="Search by keyword...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Jadwal Section -->
        <h2 class="section-title">Jadwal (Perkuliahan)</h2>
        <ul class="file-list">
            @foreach ($jadwalFiles as $file)
            <li class="file-item">
                <a href="{{ Storage::url('RepoDosen/' . $file->file_path) }}" target="_blank">
                    {{ pathinfo($file->file_name, PATHINFO_FILENAME) }}
                </a>
                <button onclick="window.location.href='{{ route('file.download', ['category' => 'admin', 'id' => $file->id]) }}'">Download</button>
            </li>
            @endforeach
            @if ($jadwalFiles->isEmpty())
            <li class="file-item">Tidak ada jadwal yang tersedia.</li>
            @endif
        </ul>
        <div class="text-center mt-3">
            <button class="btn btn-custom" onclick="window.location.href='{{ route('jadwal.index') }}'">Lihat Semua</button>
        </div>

        <!-- Research Section -->
        <h2 class="section-research-title">Publikasi Penelitian</h2>
        <ul class="file-list">
            @foreach ($researchPublications as $research)
                <li class="research-item">
                    <div class="research-title">
                        <a href="{{ Storage::url('RepoDosen/' . $file->file_path) }}" target="_blank">
                            {{ $research->title }}
                        </a>
                    </div>
                    <div class="research-details">
                        Peneliti: {{ $research->researcher_name }} | Tahun: {{ $research->year }}
                    </div>
                    <p>{{ $research->topic }}</p>
                    <button onclick="window.location.href='{{ route('file.download', ['category' => 'research', 'id' => $research->id]) }}'">Download</button>
                </li>
            @endforeach
            @if ($researchPublications->isEmpty())
                <li class="research-item">Tidak ada publikasi yang tersedia.</li>
            @endif
        </ul>
        <div class="text-center mt-3">
            <button class="btn btn-custom" onclick="window.location.href='{{ route('research.index') }}'">Lihat Semua</button>
        </div>
    </div>

    <!-- Bottom Page -->
    <div class="botom-page">
    </div>
</body>
</html>
<script>
    const body = document.body;

    window.addEventListener('resize', function () {
        const navBar = document.getElementById('nav-bar');
        const windowWidth = window.innerWidth;

        // Periksa jika ukuran layar lebih besar dari 1023px
        if (windowWidth > 1023) {
            navBar.style.display = 'flex';  // Menampilkan navbar
        } else {
            navBar.style.display = 'none';  // Menyembunyikan navbar
        }
    });

    document.getElementById('hamburger-menu').addEventListener('click', function(event) {
        const navBar = document.getElementById('nav-bar');
        // Toggle the display of the navbar
        navBar.style.display = navBar.style.display === 'flex' ? 'none' : 'flex';
        // Prevent click event from propagating to the document
        event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
        const navBar = document.getElementById('nav-bar');
        const hamburgerMenu = document.getElementById('hamburger-menu');
        
        // Close the navbar if the click is outside of the hamburger menu or navbar
        if (navBar && !navBar.contains(event.target) && event.target !== hamburgerMenu) {
            navBar.style.display = 'none';
        }
    });
</script>