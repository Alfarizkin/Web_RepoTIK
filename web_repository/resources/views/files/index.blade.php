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

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #008080;
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        /* Logo Styling */
        .logo-container .logo {
            width: clamp(30px, 8vw, 50px);
            height: auto;
        }

        .nav-bar {
            display: flex;
            gap: 20px;
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

        /* Profile Picture Area */
        .profile-bar {
            display: flex;
            align-items: center;
            gap: 10px;
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

        .section-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: clamp(18px, 4vw, 22px);
            color: #00796b;
            margin-bottom: clamp(10px, 2vw, 15px);
            margin: 0;
            padding: 0;
        }

        .filter-container {
            display: flex;
            gap: 15px; 
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-group label {
            font-size: 0.9rem;
        }

        .filter-group select {
            padding: 5px;
            font-size: 0.9rem;
        }

        /* General Table Styles */
        .file-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: clamp(14px, 2vw, 16px);
            text-align: left;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .file-table thead {
            background-color: #00897b;
            color: #fff;
        }

        .file-table th, .file-table td {
            padding: clamp(8px, 2vw, 12px) clamp(10px, 3vw, 15px);
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .file-table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .file-table tbody tr:hover {
            background-color: #e0f7fa;
        }

        .file-link {
            text-decoration: none;
            color: #00897b;
        }

        .file-table .btn-action {
            background-color: #0288d1;
            color: #fff;
            padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .file-table .btn-action.delete {
            background-color: #d32f2f;
        }

        .file-actions .btn-action:hover {
            opacity: 0.8;
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
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-custom:active {
            background-color: #1e7e34;
        }

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
            font-size: clamp(12px, 2.5vw, 14px);
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

        .dropdown-btn i.fa-chevron-down {
            margin-left: 10px;
            font-size: 10px;
        }

        .icon {
            width: clamp(15px, 4vw, 20px);
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

        @media (max-width: 1023px) {
            .header-bar {
                padding: 10px;
                text-align: center;
            }

            .logo-container {
                gap: 10px;
            }

            .nav-bar {
                gap: 10px;
                margin: 0;
            }

            .nav-bar a {
                margin: 5px 0;
                padding: 8px 10px;
                font-size: clamp(12px, 3vw, 14px);
            }

            /* Profile Bar */
            .profile-bar {
                gap: 10px;
            }

            .profile-picture {
                width: clamp(30px, 8vw, 50px);
                height: clamp(30px, 8vw, 50px);
                margin: 0 auto;
            }

            .profile-dropdown a,
            .profile-dropdown button {
                padding: clamp(8px, 2vw, 12px) 20px;
                font-size: clamp(12px, 3vw, 14px);
            }

            /* info */
            .repo-info {
                font-size: clamp(11px, 3vw, 15px);
                padding: clamp(8px, 3vw, 13px);
            }

            .section-container {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 8px;
            }

            .section-title {
                font-size: clamp(10px, 5vw, 14px); 
            }

            .filter-container {
                gap: 5px; 
            }

            .filter-group {
                gap: 2px;
            }

            .filter-group label {
                font-size: clamp(8px, 5vw, 10px);
            }

            .filter-group select {
                font-size: clamp(8px, 5vw, 10px);
            }

            .file-table {
                font-size: clamp(10px, 3vw, 12px);
                width: 100%;
                overflow-x: auto;
                border-radius: 5px;
                margin-top: 0px;
            }

            .file-table th, .file-table td {
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
                white-space: nowrap;
            }

            .file-table tbody tr:hover {
                background-color: #e0f7fa;
            }

            .file-table .btn-action {
                font-size: clamp(10px, 3vw, 12px);
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
                border-radius: clamp(4px, 2vw, 6px);
            }

            .file-table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .btn-custom {
                font-size: clamp(10px, 3vw, 12px);
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            }

            /* Style for pagination container */
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

            .botom-page {
                padding: clamp(15px, 4vw, 25px);
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
<body data-role="{{ Auth::user()->role }}">

    <div class="header-bar">
        <!-- Logo -->
        <div class="logo-container">
            <a href="{{ route('auth.dashboard') }}" class="header-link">
                <img src="{{ asset('logo/Logo PNJ.png') }}" alt="Logo PNJ" class="logo">
            </a>
            <!-- Navigation Bar -->
            <div class="nav-bar">
                <a href="{{ route('auth.dashboard') }}">Dashboard</a>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="profile-bar">  
            <div class="profile-menu">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Picture" class="profile-picture" id="profile-pic">
                <div class="profile-dropdown" id="profile-dropdown">
                    <a href="{{ route('profile.show') }}">Edit Profile</a>
                    @if (Auth::user()->hasRole('operator'))
                        <a href="{{ route('files.index') }}">Manage File</a>
                        <a href="{{ route('users.index') }}">Manage User</a>
                    @endif
                    @if (Auth::user()->hasRole('upload'))
                        <a href="">Manage File</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Repository Information Section -->
    <div class="content">
        <div class="repo-info">
            <p><strong>Manage Files:</strong> Halaman ini digunakan untuk mengelola file berdasarkan kategori seperti <strong>Administration</strong>, <strong>Course</strong>, <strong>Collaboration</strong>, dan <strong>Research</strong>. Anda dapat melihat, mengedit, atau menghapus file di sini.</p>
        </div>

        <!-- User List Section -->
        <div class="section-container">
            <h2 class="section-title">File List</h2>
            <div class="filter-container">
                <form action="{{ route('files.index') }}" method="GET">
                    <div class="filter-group">
                        <!-- Filter by Category -->
                        <label for="category">Filter Kategori:</label>
                        <select name="category" id="category" onchange="this.form.submit()">
                            <option value="" {{ request('category') === null ? 'selected' : '' }}>Semua Kategori</option>
                            <option value="administration" {{ request('category') === 'administration' ? 'selected' : '' }}>Administration</option>
                            <option value="collaboration" {{ request('category') === 'collaboration' ? 'selected' : '' }}>Collaboration</option>
                            <option value="research" {{ request('category') === 'research' ? 'selected' : '' }}>Research</option>
                            <option value="course" {{ request('category') === 'course' ? 'selected' : '' }}>Course</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <!-- Filter by Date -->
                        <label for="sort">Urutkan Berdasarkan:</label>
                        <select name="sort" id="sort" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Terlama</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="file-table-container">
            <table class="file-table">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Pengunggah</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginatedResults as $file)
                    <tr class="@if($file->category === 'administration') administration
                           @elseif($file->category === 'collaboration') collaboration
                           @elseif($file->category === 'research') research
                           @elseif($file->category === 'course') course
                           @endif">
                        <td>
                            <a href="" class="file-link">
                                @if($file->category === 'research')
                                    {{ $file->title }} 
                                @else
                                    {{ pathinfo($file->file_name, PATHINFO_FILENAME) }}
                                @endif
                            </a>
                        </td>
                        <td>{{ ucfirst($file->category) }}</td>
                        <td>{{ ucfirst($file->type) }}</td>
                        <td>{{ $file->uploader->name }}</td>
                        <td>{{ $file->created_at->format('d M Y') }}</td>
                        <td>
                        <button 
                            class="btn-action" 
                            onclick="openUploadModal({{ json_encode([
                                'category' => $file->category,
                                'type' => $file->type,
                                'prodi' => $file->prodi,
                                'class' => $file->class,
                                'subject' => $file->subject,
                                'research_title' => $file->title,
                                'research_topic' => $file->topic,
                                'researcher_name' => $file->researcher_name,
                                'research_year' => $file->year,
                                'research_description' => $file->description,
                                'file_description' => $file->description,
                                'collaboration_project_name' => $file->project_name,
                                'visibility' => $file->visibility
                            ]) }})"
                        >Edit</button>
                            <form action="{{ route('delete.file') }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $file->id }}">
                                <input type="hidden" name="type" value="{{ $file->category }}">
                                <button class="btn-action delete" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($paginatedResults->isEmpty())
                    <tr>
                        <td colspan="6" style="text-align: center;">Tidak ada file yang tersedia.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-custom" onclick="window.location.href=''">Tambah Pengguna Baru</button>
        </div>
        {{-- Menampilkan navigasi pagination --}}
            <div class="pagination-container">
                <div class="pagination-top">
                    <div>
                        <p class="small text-muted">
                            {!! __('Showing') !!}
                            <span class="fw-semibold">{{ $paginatedResults->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="fw-semibold">{{ $paginatedResults->lastItem() }}</span>
                            {!! __('of') !!}
                            <span class="fw-semibold">{{ $paginatedResults->total() }}</span>
                            {!! __('results') !!}
                        </p>
                    </div>
                </div>

                <div class="pagination-bottom">
                    {{ $paginatedResults->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div> 
            </div>
    </div>

    <!-- Upload Modal -->
    <div class="upload-modal" id="uploadModal">
        <div class="modal-content">
            <h2>Unggah File</h2>
            <form id="uploadForm" enctype="multipart/form-data" method="POST" action="">
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
                        <option value="Lecture_Notes">Lecture_Notes</option>
                        <option value="Assignment">Assignment</option>
                        <option value="Exams">Exams</option>
                        <option value="Project">Project</option>
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

    <!-- Bottom Page -->
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
    function openUploadModal(fileData) {
        const uploadModal = document.getElementById('uploadModal');
        const typeMapping = {
            'Jadwal Kuliah': 'Jadwal_Kuliah',
            'Silabus': 'Silabus',
            'Form Administrasi': 'Form_Administrasi',
            'Lecture Notes' : 'Lecture_Notes',
            'Assignment' : 'Assignment',
            'Exams' : 'Exams',
            'Project' : 'Project'
        };
        uploadModal.style.display = 'flex';
        document.getElementById('category').value = fileData.category || '';

        // Mengatur tampilan field tambahan berdasarkan kategori
        updateTypeOptions();

        if (fileData.category === 'administration') {
            document.getElementById('type').value = 'administrator' || '';
            const convertedType = typeMapping[fileData.type] || '';
            document.getElementById('administrator_type').value = convertedType || '';
            document.getElementById('file-description').value = fileData.file_description || '';
            document.querySelector('.administrator-fields').style.display = 'block';
        } else if (fileData.category === 'collaboration') {
            document.getElementById('type').value = 'collaboration' || '';
            document.getElementById('collaboration_project_name').value = fileData.collaboration_project_name || '';
            document.getElementById('file-description').value = fileData.description || '';
            document.querySelector('.collaboration-fields').style.display = 'block';
        } else if (fileData.category === 'course') {
            document.getElementById('type').value = 'courses' || '';
            const convertedType = typeMapping[fileData.type] || '';
            document.getElementById('courses_type').value = convertedType || '';
            document.getElementById('prodi').value = fileData.prodi || '';
            document.getElementById('class').value = fileData.class || '';
            document.getElementById('subject').value = fileData.subject || '';
            document.getElementById('file-description').value = fileData.file_description || '';
            document.querySelector('.courses-fields').style.display = 'block';
        } else if (fileData.category === 'research') {
            document.getElementById('type').value = 'research' || '';
            document.getElementById('research_title').value = fileData.research_title || '';
            document.getElementById('research_topic').value = fileData.research_topic || '';
            document.getElementById('researcher_name').value = fileData.researcher_name || '';
            document.getElementById('research_year').value = fileData.research_year || '';
            document.getElementById('research_description').value = fileData.research_description || '';
            document.querySelector('.research-fields').style.display = 'block';
        }

        // Jika bukan kategori 'research', tampilkan deskripsi file
        if (fileData.category !== 'research') {
            document.getElementById('file-description').value = fileData.file_description || '';
            document.querySelector('.file-description').style.display = 'block';
        } else {
            document.querySelector('.file-description').style.display = 'none';
        }
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
