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

        /* Profile Picture Area */
        .profile-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #008080;
            padding: 10px 20px;
            position: relative;
        }

        .profile-menu {
            display: flex;
            align-items: center;
            position: relative;
        }

        .profile-picture {
            width: clamp(30px, 8vw, 50px);
            height: clamp(30px, 8vw, 50px);
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid white;
            margin-right: 10px;
        }

        /* Dropdown Menu */
        .profile-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            z-index: 10;
            min-width: 180px; 
        }

        .profile-dropdown a,
        .profile-dropdown button {
            display: block;
            padding: clamp(8px, 2vw, 12px) 20px;
            color: #333;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: clamp(12px, 3vw, 14px);
            line-height: 1.5;
        }

        .profile-dropdown a:hover,
        .profile-dropdown button:hover {
            background-color: #f0f0f0;
        }
        
        .hamburger-menu {
            display: none; /* Default disembunyikan */
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

        /* Navigation Bar */
        .nav-bar {
            display: flex;
            gap: 20px;
            justify-content: left;
            background-color: #009688;
            padding: 10px 20px;
        }

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

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #00796b;
            color: white;
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
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            color: #004d40;
            font-size: 16px;
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
        
        /* Floating Upload Button */
        .floating-upload {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: clamp(50px, 8vw, 60px);
            height: clamp(50px, 8vw, 60px);
            background-color: #00796b;
            color: white;
            font-size: clamp(24px, 5vw, 30px);
            text-align: center;
            line-height: clamp(50px, 8vw, 60px);
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1000;
            transition: background-color 0.3s, transform 0.3s;
        }

        .floating-upload:hover {
            background-color: #005f56;
            transform: scale(1.1);
        }

        /* Modal Upload */
        .upload-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: clamp(15px, 3vw, 20px);
            border-radius: 8px;
            width: clamp(300px, 50%, 400px);
            max-width: 90%;
            margin: auto;
            text-align: left;
        }

        /* Judul */
        .modal-content h2 {
            margin-bottom: clamp(15px, 3vw, 20px);
            font-size: clamp(16px, 4vw, 18px);
            font-weight: bold;
        }

        /* Styling untuk input dan elemen form */
        .modal-content input[type="text"],
        .modal-content select,
        .modal-content textarea {
            width: 100%;
            padding: clamp(8px, 2vw, 10px);
            margin: clamp(8px, 1.5vw, 10px) 0 clamp(15px, 3vw, 20px);
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: clamp(12px, 2.5vw, 14px);
        }

        /* Styling untuk input tahun penelitian agar lebih konsisten */
        .modal-content input[type="number"],
        .modal-content select,
        .modal-content textarea {
            width: 100%;
            padding: clamp(8px, 2vw, 10px);
            margin: clamp(8px, 1.5vw, 10px) 0 clamp(15px, 3vw, 20px);
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: clamp(12px, 2.5vw, 14px);
        }

        /* Label untuk elemen form */
        .modal-content label {
            font-weight: bold;
            margin-bottom: clamp(6px, 1.5vw, 8px);
            display: block;
            font-size: clamp(12px, 2.5vw, 14px);
        }

        /* Menyesuaikan margin pada elemen form agar lebih rapih */
        .modal-content .form-group {
            margin-bottom: clamp(12px, 2.5vw, 15px);
        }

        /* Memberikan jarak antara input file dan tombol upload */
        .modal-content input[type="file"] {
            margin-bottom: clamp(15px, 3vw, 20px);
        }

        /* Button */
        .modal-content button {
            width: 48%;
            padding: clamp(8px, 2vw, 10px);
            border-radius: 5px;
            cursor: pointer;
            font-size: clamp(14px, 3vw, 16px);
            border: none;
        }

        .modal-content button[type="submit"] {
            background-color: #00796b;
            color: white;
        }

        .modal-content button[type="submit"]:hover {
            background-color: #005f56;
        }

        .modal-content button[type="button"] {
            background-color: #d9534f;
            color: white;
        }

        .modal-content button[type="button"]:hover {
            background-color: #c9302c;
        }

        /* Menambahkan margin untuk tombol */
        .modal-content .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .custom-dropdown {
            user-select: none;
            position: relative;
            width: clamp(100px, 25vw, 120px);
            font-size: clamp(14px, 3vw, 16px);
            margin-bottom: clamp(6px, 1.5vw, 8px);
        }

        .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: clamp(4px, 1.5vw, 6px) clamp(8px, 2vw, 12px);
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            height: clamp(25px, 5vw, 30px);
            background-color: white;
            user-select: none;
            position: relative;
        }

        .dropdown-btn::after {
    content: "⌄"; /* Simbol panah ke bawah */
    font-size: 12px; /* Sesuaikan ukuran simbol */
    color: #666; /* Warna panah */
    margin-left: auto; /* Tarik ke kanan */
    pointer-events: none; /* Supaya klik tidak memengaruhi panah */
}

        .icon {
            width: 20px;
            height: auto;
            margin-right: 8px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 100%;
            border: 1px solid #ccc;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
            overflow: hidden;
            user-select: none;
        }

        .dropdown-item {
            padding: 8px 12px;
            display: flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .custom-dropdown:hover .dropdown-content {
            display: block;
        }

        /* Drag-and-Drop Area */
        body.dragging {
            border: 2px dashed #007bff;
            background-color: rgba(0, 123, 255, 0.1);
            transition: background-color 0.2s ease;
        }

        @media (max-width: 1023px) {
            /* Profile Bar */
            .profile-bar {
                padding: clamp(10px, 3vw, 20px);
                justify-content: space-between;
            }

            .profile-picture {
                width: clamp(30px, 8vw, 50px);
                height: clamp(30px, 8vw, 50px);
            }

            .profile-dropdown a,
            .profile-dropdown button {
                padding: clamp(8px, 2vw, 12px) 20px;
                font-size: clamp(12px, 3vw, 14px);
            }

            /* Header */
            .header {
                display: none;
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
            }

            .nav-bar a {
                text-align: left;
                padding: 10px 0;
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

            /* Search Bar */
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

            .floating-upload {
                width: clamp(50px, 10vw, 60px);
                height: clamp(50px, 10vw, 60px);
                font-size: clamp(20px, 4vw, 24px);
                line-height: clamp(50px, 10vw, 60px);
            }

            /* modal-content */
            .modal-content {
                width: clamp(250px, 80%, 350px);
                padding: clamp(10px, 3vw, 15px);
            }


            .modal-content h2 {
                font-size: clamp(12px, 5vw, 16px);
                margin-bottom: clamp(10px, 3vw, 12px);
            }

            .modal-content input[type="text"],
            .modal-content select,
            .modal-content textarea {
                padding: clamp(6px, 2vw, 8px);
                margin: clamp(6px, 1.5vw, 8px) 0 clamp(6px, 1.5vw, 8px);
                font-size: clamp(11px, 4vw, 13px);
            }

            .modal-content input[type="number"],
            .modal-content select,
            .modal-content textarea {
                padding: clamp(6px, 2vw, 8px);
                margin: clamp(6px, 1.5vw, 8px) 0 clamp(6px, 1.5vw, 8px);
                font-size: clamp(11px, 4vw, 13px);
            }

            .modal-content label {
                font-size: clamp(11px, 4vw, 13px);
                margin-bottom: 0;
            }

            .modal-content .form-group {
                margin-bottom: clamp(10px, 2vw, 12px);
            }

            .modal-content input[type="file"] {
                margin-bottom: clamp(12px, 3vw, 15px);
            }

            /* Button */
            .modal-content button {
                width: 48%;
                padding: clamp(8px, 2vw, 10px);
                font-size: clamp(12px, 5vw, 14px);
            }

        }
    </style>
</head>
<body>

    <div class="profile-bar"> 
        <button class="hamburger-menu" id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="profile-menu">
            <!-- Gambar Profil -->
            <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Picture" class="profile-picture" id="profile-pic">
            <!-- Dropdown Menu -->
            <div class="profile-dropdown" id="profile-dropdown">
                <a href="{{ route('profile.show') }}">Edit Profile</a>
                <a href="">Manage File</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
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
        <a href="#">Dashboard</a>
        <a href="#">Administration</a>
        <a href="#">Course</a>
        <a href="#">Research</a>
        <a href="#">Collaboration</a>
    </div>

    <!-- Repository Information Section -->
    <div class="content">
        <div class="repo-info">
            <p><strong>Repository Overview:</strong> This repository contains various academic resources for lecturers at Politeknik Negeri Jakarta, including course schedules, research publications, administrative documents, and collaboration materials. Resources are regularly updated to support academic and research activities.</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search" name="search" placeholder="Search by keyword...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>

        <!-- Jadwal Section -->
        <h2 class="section-title">Jadwal (Perkuliahan)</h2>
        <ul class="file-list">
            @foreach ($jadwalFiles as $file)
            <li class="file-item">
                <a href="{{ Storage::url('RepoDosen/' . $file->file_path) }}" target="_blank">
                    {{ pathinfo($file->file_name, PATHINFO_FILENAME) }}
                </a>
                <button onclick="window.location.href='{{ route('admin.download', $file->id) }}'">Download</button>
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
                    <button onclick="window.location.href='{{ route('research.download', $research->id) }}'">Download</button>
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

    <!-- Floating Upload Button -->
    <div class="floating-upload" onclick="openUploadModal()">
    +
    </div>

    <!-- Upload Modal -->
    <div class="upload-modal" id="uploadModal">
        <div class="modal-content">
            <h2>Unggah File</h2>
            <form id="uploadForm" enctype="multipart/form-data" method="POST" action="{{ route('upload') }}">
                @csrf

                <label for="type">Pilih Kategori:</label>
                <select name="type" id="type" onchange="updateTypeOptions()" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="administrator">Administrasi</option>
                    <option value="collaboration">Kolaborasi</option>
                    <option value="courses">Course</option>
                    <option value="research">Research</option>
                </select>

                <!-- Pilihan untuk Administrator -->
                <div class="administrator-fields" style="display:none;">
                    <label for="administrator_type">Pilih Jenis Administrasi:</label>
                    <select name="administrator_type" id="administrator_type" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="jadwal_kuliah">Jadwal Kuliah</option>
                        <option value="silabus">Silabus</option>
                        <option value="form_administrasi">Form Administrasi Lainnya</option>
                    </select>
                </div>

                <!-- Field untuk Kolaborasi -->
                <div class="collaboration-fields" style="display:none;">
                    <label for="collaboration_project_name">Nama Proyek Kolaborasi:</label>
                    <input type="text" name="collaboration_project_name" id="collaboration_project_name" placeholder="Nama Proyek Kolaborasi" required>
                </div>

                <!-- Pilihan untuk Mata Kuliah -->
                <div class="courses-fields" style="display:none;">
                    <label for="courses_type">Pilih Course:</label>
                    <select name="courses_type" id="courses_type" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="lecture_notes">Materi Kuliah</option>
                        <option value="assignment">Tugas</option>
                        <option value="exams">Ujian</option>
                        <option value="project">Proyek</option>
                    </select>

                    <label for="prodi">Pilih Program Studi:</label>
                    <select name="prodi" id="prodi" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="tmj">TMJ</option>
                        <option value="ti">TI</option>
                        <option value="tmd">TMD</option>
                        <option value="tkj">TKJ</option>
                    </select>

                    <label for="class">Nama Kelas:</label>
                    <input type="text" name="class" id="class" placeholder="Nama Kelas" required>
                </div>

                <!-- Field khusus untuk Penelitian -->
                <div class="research-fields" style="display:none;">
                    <label for="research_title">Judul Penelitian:</label>
                    <input type="text" name="research_title" id="research_title" placeholder="Judul Penelitian" required>

                    <label for="research_topic">Topik Penelitian:</label>
                    <input type="text" name="research_topic" id="research_topic" placeholder="Topik Penelitian" required>

                    <label for="researcher_name">Nama Peneliti:</label>
                    <input type="text" name="researcher_name" id="researcher_name" placeholder="Nama Peneliti" required>

                    <label for="research_year">Tahun Penelitian:</label>
                    <input type="number" name="research_year" id="research_year" placeholder="Tahun Penelitian" required>

                    <label for="research_description">Deskripsi Penelitian/Abstak:</label>
                    <textarea name="research_description" id="research_description" rows="4" placeholder="Deskripsi singkat penelitian" required></textarea>
                </div>

                <!-- Deskripsi file yang hanya muncul untuk kategori selain Penelitian -->
                <div class="file-description" style="display:none;">
                    <label for="file-description">Deskripsi File:</label>
                    <textarea name="file_description" id="file-description" rows="4" placeholder="Deskripsi singkat file"></textarea>
                </div>

                <div class="custom-dropdown">
                    <div id="visibility" class="dropdown-btn">
                        <img src="{{ asset('logo/Globe.png') }}" alt="Globe" class="icon"> Public
                    </div>
                    <div class="dropdown-content">
                        <div data-value="public" class="dropdown-item">
                            <img src="{{ asset('logo/Globe.png') }}" alt="Globe" class="icon"> Public
                        </div>
                        <div data-value="private" class="dropdown-item">
                            <img src="{{ asset('logo/Lock 02.png') }}" alt="Lock" class="icon"> Private
                        </div>
                    </div>
                    <input type="hidden" name="visibility" id="visibility-input" value="public">
                </div>

                <label for="file">Pilih File:</label>
                <input type="file" name="file" id="file" required>

                <button type="submit">Unggah</button>
                <button type="button" id="cancelButton" onclick="closeUploadModal()">Batal</button>
            </form>
        </div>
    </div>

    <!-- Contact / Help Section -->
    <div class="botom-page">
    </div>
</body>
</html>

<script>
    const uploadModal = document.getElementById('uploadModal');
    const dragDropArea = document.getElementById('dragDropArea');
    const fileInput = document.getElementById('file');
    const body = document.body;

    // Floating button functionality
    function openUploadModal() {
        uploadModal.style.display = 'flex';
    }

    function closeUploadModal() {
        // Reset dropdown kategori ke pilihan pertama
        const typeDropdown = document.getElementById('type');
        if (typeDropdown) {
            typeDropdown.selectedIndex = 0;
        }

        // Reset dropdown spesifik berdasarkan kategori ke pilihan pertama dan sembunyikan
        const specificTypeDropdown = document.getElementById('specificType');
        if (specificTypeDropdown) {
            specificTypeDropdown.selectedIndex = 0;
            specificTypeDropdown.style.display = 'none';
        }

        // Reset input file
        const fileInput = document.getElementById('file');
        if (fileInput) {
            fileInput.value = "";
        }

        // Reset input deskripsi file
        const fileDescriptionField = document.querySelector('.file-description');
        if (fileDescriptionField) {
            fileDescriptionField.style.display = 'none'; // Sembunyikan seluruh div, termasuk label dan textarea
            const fileDescriptionTextarea = document.getElementById('file-description');
            if (fileDescriptionTextarea) {
                fileDescriptionTextarea.value = ""; // Reset textarea
            }
        }

        // Reset semua input khusus Research
        const researchFields = document.querySelector('.research-fields');
        if (researchFields) {
            researchFields.style.display = 'none';
            const researchInputs = researchFields.querySelectorAll('input, textarea');
            researchInputs.forEach(input => input.value = "");
        }

        // Reset field untuk Administrator
        const administratorFields = document.querySelector('.administrator-fields');
        if (administratorFields) {
            administratorFields.style.display = 'none';
            const adminInputs = administratorFields.querySelectorAll('input, select, textarea');
            adminInputs.forEach(input => input.value = "");
        }

        // Reset field untuk Collaboration
        const collaborationFields = document.querySelector('.collaboration-fields');
        if (collaborationFields) {
            collaborationFields.style.display = 'none';
            const collaborationInputs = collaborationFields.querySelectorAll('input, select, textarea');
            collaborationInputs.forEach(input => input.value = "");
        }

        // Reset field untuk Courses
        const coursesFields = document.querySelector('.courses-fields');
        if (coursesFields) {
            coursesFields.style.display = 'none';
            const coursesInputs = coursesFields.querySelectorAll('input, select, textarea');
            coursesInputs.forEach(input => input.value = "");
        }

        // Tutup modal
        const modal = document.getElementById('uploadModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    function updateTypeOptions() {
        const typeDropdown = document.getElementById('type');
        const visibilityDropdown = document.getElementById('visibility');
        const selectedType = typeDropdown.value;

        const administratorFields = document.querySelectorAll('.administrator-fields');
        const collaborationFields = document.querySelectorAll('.collaboration-fields');
        const coursesFields = document.querySelectorAll('.courses-fields');
        const researchFields = document.querySelectorAll('.research-fields');
        const fileDescriptionField = document.querySelectorAll('.file-description');

        // Semua kategori disimpan dalam satu objek
        const categories = {
            administrator: administratorFields,
            collaboration: collaborationFields,
            courses: coursesFields,
            research: researchFields,
        };

        // Reset semua field
        Object.keys(categories).forEach(category => {
            categories[category].forEach(field => {
                field.style.display = 'none'; 
                field.querySelectorAll('input, textarea, select').forEach(input => {
                    input.value = "";
                    input.removeAttribute('required');
                });
            });
        });

        // Reset file description
        fileDescriptionField.forEach(field => {
            field.style.display = 'none';
            field.querySelectorAll('textarea').forEach(input => {
                input.value = ""; 
                input.removeAttribute('required');
            });
        });

        // Tampilkan field sesuai kategori yang dipilih
        if (categories[selectedType]) {
            categories[selectedType].forEach(field => {
                field.style.display = 'block';
                field.querySelectorAll('input, textarea, select').forEach(input => {
                    input.setAttribute('required', '');
                });
            });
        }

        // Atur file description jika bukan research
        if (selectedType !== 'research') {
            fileDescriptionField.forEach(field => {
                field.style.display = 'block';
                field.querySelectorAll('textarea').forEach(input => {
                    input.setAttribute('required', '');
                });
            });
        }

        // Pastikan dropdown visibility tidak direset
        if (visibilityDropdown) {
            visibilityDropdown.value = visibilityDropdown.value;
        }
    }

    // Universal Drag-and-drop functionality
    let isDragging = false;

    document.addEventListener('dragover', (event) => {
        event.preventDefault();
        if (!isDragging) {
            isDragging = true;
        }
    });

    document.addEventListener('dragleave', (event) => {
        if (!event.relatedTarget || event.relatedTarget === document.documentElement) {
            isDragging = false;
        }
    });

    document.addEventListener('drop', (event) => {
        event.preventDefault();
        isDragging = false;

        const files = event.dataTransfer.files;

        // Jika ada file yang di-drop
        if (files.length > 0) {
            openUploadModal();
            fileInput.files = files;
        }
    });

    // Update file input jika file dipilih manual
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            openUploadModal();
        }
    });

    document.getElementById("profile-pic").addEventListener("click", function() {
        var dropdown = document.getElementById("profile-dropdown");
        
        // Toggle dropdown visibility
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    });

    // Menutup dropdown jika pengguna mengklik di luar dropdown
    window.addEventListener("click", function(event) {
        var dropdown = document.getElementById("profile-dropdown");
        var profilePic = document.getElementById("profile-pic");

        if (!profilePic.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = "none";
        }
    });

    document.getElementById('hamburger-menu').addEventListener('click', function () {
        const navBar = document.getElementById('nav-bar');
        navBar.style.display = navBar.style.display === 'flex' ? 'none' : 'flex';
        event.stopPropagation();
    });

    document.addEventListener('click', function () {
        const navBar = document.getElementById('nav-bar');
        if (navBar && navBar.style.display === 'flex') {
            navBar.style.display = 'none';
        }
    });

    document.querySelector('.dropdown-btn').addEventListener('click', function (e) {
        // Prevent click event from propagating and closing the dropdown
        e.stopPropagation();

        // Toggle the display of the dropdown content
        const dropdownContent = document.querySelector('.dropdown-content');
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });

    // Add event listener for each dropdown item
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent dropdown from closing immediately

            const value = this.getAttribute('data-value');
            const text = this.innerHTML;

            // Update dropdown button content
            const dropdownBtn = document.querySelector('.dropdown-btn');
            dropdownBtn.innerHTML = text;

            // Update hidden input value
            const input = document.querySelector('#visibility-input');
            input.value = value;

            // Close the dropdown
            document.querySelector('.dropdown-content').style.display = 'none';
        });
    });

    // Close dropdown on clicking outside
    document.addEventListener('click', function () {
        const dropdownContent = document.querySelector('.dropdown-content');
        dropdownContent.style.display = 'none';
    });
</script>
