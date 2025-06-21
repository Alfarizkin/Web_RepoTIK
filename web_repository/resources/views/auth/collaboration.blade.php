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
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            font-size: clamp(20px, 4vw, 22px);
            color: #00796b;
            margin-bottom: 15px;
            margin-bottom: clamp(10px, 2vw, 15px);
        }

        .no-result{
            font-size: clamp(20px, 4vw, 22px);
            color: #00796b;
            margin-bottom: 15px;
            margin-bottom: clamp(10px, 2vw, 15px);
        }

        /* File List */
        .file-list {
            list-style-type: none;
            padding: 0;
        }

        .file-item {
            display: grid;
            gap: 10px;
            align-items: center;
            padding: clamp(10px, 2vw, 15px);
            margin-bottom: clamp(5px, 1vw, 10px);
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            flex-wrap: wrap;
        }

        .file-item.collab {
            grid-template-columns: 2fr 2fr 2fr auto;
        }

        /* Title Link Style */
        .file-item a {
            color: #00796b;
            font-weight: bold;
            text-decoration: none;
            flex-grow: 1;
            font-size: clamp(14px, 2vw, 16px);
        }

        /* Button Style */
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

        /* General Description Style */
        .file-item p {
            color: #444;
            font-size: clamp(12px, 2vw, 14px);
        }

        /* Spacing between sections */
        .file-item div {
            margin-right: 10px;
        }

        /* Align button to the right */
        .file-item button {
            justify-self: flex-end;
        }

        .collab-title {
            font-size: clamp(14px, 2vw, 16px);
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

        /* Style for pagination container */
        .pagination-container {
            display: inline-flex;
            flex-direction: column;
            align-items: left;
            width: 100%;
        }

        .pagination-top {
            display: inline-flex;
            list-style: none;
            justify-content: left;
            padding: 0;
            margin: 10px 0;
        }

        .pagination-top span {
            color: #00796b;
            padding: clamp(6px, 1vw, 8px) clamp(8px, 1.5vw, 12px);
            margin: 0 clamp(2px, 1vw, 4px);
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .pagination-bottom {
            display: inline-flex;
            list-style: none;
            justify-content: left;
            padding: 0;
            margin: 10px 0;
        }

        .pagination-bottom a, .pagination-bottom span {
            color: #00796b;
            padding: clamp(6px, 1vw, 8px) clamp(8px, 1.5vw, 12px);
            margin: 0 clamp(2px, 1vw, 4px);
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .pagination-bottom a:hover {
            background-color: #00796b;
            color: #fff;
        }

        .pagination-bottom .active span {
            font-weight: bold;
            background-color: #00796b;
            color: #fff;
        }

        .pagination-bottom svg {
            width: clamp(14px, 2vw, 16px);
            height: clamp(14px, 2vw, 16px);
            vertical-align: middle;
        }

        .pagination-bottom ul {
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 20px 0;
            list-style: none;
        }

        .pagination-bottom li {
            margin: 0 0px;
        }
        
        /* Contact / Help Section */
        .botom-page {
            display: flex;
            background-color: #009688;
            padding: clamp(20px, 3vw, 30px);
            margin-top: auto;
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
            z-index: 1000;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            max-height: 90vh; /* Tambahkan batas ketinggian maksimum */
            overflow-y: auto;
            text-align: left;
        }

        /* Title Styling */
        .modal-content h2 {
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        /* Input, Select, and Textarea Styling */
        .modal-content input[type="text"],
        .modal-content input[type="number"],
        .modal-content select,
        .modal-content textarea,
        .modal-content input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Label Styling */
        .modal-content label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }

        /* Button Container */
        .modal-content .btn-container {
            display: flex;
            justify-content: space-between;
        }

        /* Buttons */
        .modal-content button {
            width: 48%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
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

        /* Custom Dropdown */
        .custom-dropdown {
            position: relative;
            width: 120px;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            width: 100%;
            border: 1px solid #ccc;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
        }

        .dropdown-item {
            padding: 8px 12px;
            cursor: pointer;
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
                font-size: clamp(16px, 4vw, 18px);
                margin-bottom: clamp(8px, 3vw, 12px);
            }

            .file-item {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: clamp(5px, 2vw, 10px);
            }

            /* Research - 1 Column */
            .file-item.collab{
                grid-template-columns: 1fr;
            }

            /* Title Link Style */
            .file-item a {
                margin-bottom: clamp(5px, 2vw, 10px);
            }

            /* Button Style */
            .file-item button {
                width: 100%;
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            }

            /* General Description Style */
            .file-item p {
                font-size: clamp(12px, 2vw, 14px);
            }

            /* Adjust button and other elements to be more responsive */
            .file-item button {
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px); /* Adjust padding for smaller screens */
            }

            /* Admin, Collaboration, and Course titles - Adjust Font Size */
            .collab-title {
                font-size: clamp(14px, 2vw, 16px);
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

            .pagination-container {
                width: 100%;
            }

            .pagination-top {
                font-size: clamp(12px, 2vw, 14px);
                margin: clamp(4px, 2vw, 8px) 0;
            }

            .pagination-bottom {
                font-size: clamp(12px, 2vw, 14px);
                margin: clamp(4px, 2vw, 8px) 0;
            }

            .pagination-bottom a, .pagination-bottom span {
                padding: clamp(6px, 1vw, 10px) clamp(8px, 1vw, 10px);
            }

            .pagination-bottom svg {
                width: clamp(14px, 2vw, 14px);
                height: clamp(14px, 2vw, 14px);
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

            /* Visibility */
            .custom-dropdown {
                width: clamp(80px, 30vw, 100px);
                font-size: clamp(10px, 2vw, 12px);
                margin-bottom: clamp(4px, 1vw, 6px);
            }

            .dropdown-btn {
                padding: clamp(3px, 1vw, 5px) clamp(6px, 1.5vw, 10px);
                height: clamp(20px, 4vw, 25px);
            }

            .dropdown-btn i.fa-chevron-down {
                margin-left: 8px;
                font-size: clamp(8px, 1.2vw, 12px);
            }

            .icon {
                width: clamp(12px, 3vw, 18px);
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

                <!-- Menu untuk admin -->
                @if (Auth::user()->hasRole('operator'))
                    <a href="">Manage File</a>
                    <a href="{{ route('users.index') }}">Manage User</a>
                @endif

                <!-- Menu Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <div class="nav-bar" id="nav-bar">
        <a href="{{ route('auth.dashboard') }}">Dashboard</a>
        <a href="{{ route('auth.administration') }}">Administration</a>
        <a href="{{ route('auth.course') }}">Course</a>
        <a href="{{ route('auth.research') }}">Research</a>
        <a href="{{ route('auth.collaboration') }}">Collaboration</a>
    </div>

    <!-- Repository Information Section -->
    <div class="content">
        <div class="repo-info">
            <p><strong>Repository Overview:</strong> This repository contains various academic resources for lecturers at Politeknik Negeri Jakarta, including course schedules, research publications, administrative documents, and collaboration materials. Resources are regularly updated to support academic and research activities.</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <form action="{{ route('search.result') }}" method="GET">
                <input type="text" id="search" name="search" placeholder="Search by keyword...">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Search Results Section -->
        <h2 class="section-title">Collaboration Project</h2>

        @if($paginatedCollab->isEmpty())
            <p class="no-result">No Files found.</p>
        @else
            <ul class="file-list"> 
                @foreach($paginatedCollab as $result)
                    <li class="file-item collab">
                        {{-- Research category display --}}
                        <div class="collab-title">
                                <a href="{{ Storage::url('RepoDosen/' . $result->file_path) }}" target="_blank">
                                    {{ $result->file_name ?? 'No File Name Available' }}
                                </a>
                            </div>
                            <p>{{ $result->project_name ?? 'Unknown Project' }}</p>
                            <button onclick="window.location.href='{{ route('file.download', ['category' => 'collaboration', 'id' => $result->id]) }}'">Download</button>
                    </li>
                @endforeach
            </ul>

            {{-- Menampilkan navigasi pagination --}}
            <div class="pagination-container">
                <div class="pagination-top">
                    <div>
                        <p class="small text-muted">
                            {!! __('Showing') !!}
                            <span class="fw-semibold">{{ $paginatedCollab->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="fw-semibold">{{ $paginatedCollab->lastItem() }}</span>
                            {!! __('of') !!}
                            <span class="fw-semibold">{{ $paginatedCollab->total() }}</span>
                            {!! __('results') !!}
                        </p>
                    </div>
                </div>

                <div class="pagination-bottom">
                    {{ $paginatedCollab->links('pagination::bootstrap-5') }}
                </div>   
            </div>
        @endif
    </div>

    @unless(Auth::user()->role == 'public')
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
                            <option value="Jadwal_Kuliah">Jadwal Kuliah</option>
                            <option value="Silabus">Silabus</option>
                            <option value="Form_Administrasi">Form Administrasi Lainnya</option>
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
                            <option value="Lecture_Notes">Materi Kuliah</option>
                            <option value="Assignment">Tugas</option>
                            <option value="Exams">Ujian</option>
                            <option value="Project">Proyek</option>
                        </select>

                        <label for="prodi">Pilih Program Studi:</label>
                        <select name="prodi" id="prodi" required>
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="TMJ">TMJ</option>
                            <option value="TI">TI</option>
                            <option value="TMD">TMD</option>
                            <option value="TKJ">TKJ</option>
                        </select>

                        <label for="class">Nama Kelas:</label>
                        <input type="text" name="class" id="class" placeholder="Nama Kelas" required>

                        <label for="subject">Mata Kuliah:</label>
                        <input type="text" name="subject" id="subject" placeholder="Mata Kuliah" required>
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
                            <i class="fa fa-chevron-down"></i>
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
    @endunless

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
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('file');
        let isDragging = false;

        // Ambil role pengguna dari data attribute body
        const userRole = document.body.getAttribute('data-role');

        // Fungsi untuk menangani drag events
        const handleDragEvents = (event) => {
            event.preventDefault();
            if (event.type === 'dragover' && !isDragging) {
                isDragging = true;
            } else if (event.type === 'dragleave' && (!event.relatedTarget || event.relatedTarget === document.documentElement)) {
                isDragging = false;
            } else if (event.type === 'drop') {
                isDragging = false;
                const files = event.dataTransfer.files;
                if (files.length > 0) {
                    openUploadModal();
                    fileInput.files = files;
                }
            }
        };

        // Jika role bukan 'view', aktifkan drag-and-drop
        if (userRole !== 'view') {
            document.addEventListener('dragover', handleDragEvents);
            document.addEventListener('dragleave', handleDragEvents);
            document.addEventListener('drop', handleDragEvents);
        }

        // Update file input jika file dipilih manual
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                openUploadModal();
            }
        });
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

            // Update dropdown button content, but keep the icon
            dropdownBtn.innerHTML = text + ' <i class="fa fa-chevron-down"></i>';

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