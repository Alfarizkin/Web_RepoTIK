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
        .user-table {
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

        .user-table thead {
            background-color: #00897b;
            color: #fff;
        }

        .user-table th, .user-table td {
            padding: clamp(8px, 2vw, 12px) clamp(10px, 3vw, 15px);
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .user-table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .user-table tbody tr:hover {
            background-color: #e0f7fa;
        }

        .user-table .btn-action {
            background-color: #0288d1;
            color: #fff;
            padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .user-table .btn-action.delete {
            background-color: #d32f2f;
        }

        .user-actions .btn-action:hover {
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
        .modal-content input[type="email"],
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

            .user-table {
                font-size: clamp(10px, 3vw, 12px);
                width: 100%;
                overflow-x: auto;
                border-radius: 5px;
                margin-top: 0px;
            }

            .user-table th, .user-table td {
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
                white-space: nowrap;
            }

            .user-table tbody tr:hover {
                background-color: #e0f7fa;
            }

            .user-table .btn-action {
                font-size: clamp(10px, 3vw, 12px);
                padding: clamp(0px, 2vw, 5px) clamp(0px, 3vw, 10px);
                border-radius: clamp(4px, 2vw, 6px);
            }

            .user-table-container {
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
                    @if (Auth::user()->hasRole('dosen'))
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
            <p><strong>Manage Users:</strong> Halaman ini digunakan untuk mengelola data pengguna, termasuk menambahkan pengguna baru, memperbarui informasi pengguna, dan menghapus pengguna dari sistem. Fitur ini ditujukan untuk memastikan aksesibilitas yang tepat terhadap berbagai sumber daya akademik.</p>
        </div>

        <!-- User List Section -->
        <div class="section-container">
            <h2 class="section-title">User List</h2>
            <div class="filter-container">
                <form action="{{ route('users.index') }}" method="GET">
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
        <div class="user-table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paginatedResults as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        <button class="btn-action" onclick="openUploadModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">Edit</button>
                            <form action="" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn-action delete" type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if ($paginatedResults->isEmpty())
                    <tr>
                        <td colspan="4" style="text-align: center;">Tidak ada pengguna yang tersedia.</td>
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
        <h2>Edit User</h2>
            <form id="editUserForm" method="POST" action="{{ route('manage-users.update', ['user' => $user->id]) }}">
                @csrf
                @method('PUT')

                <!-- ID User (Hidden) -->
                <input type="hidden" name="user_id" id="user_id">

                <!-- Nama User -->
                <label for="user_name">Nama:</label>
                <input type="text" name="user_name" id="user_name" placeholder="Nama User" required>

                <!-- Email User (readonly) -->
                <label for="user_email">Email:</label>
                <input type="email" name="email" id="user_email" placeholder="Email User" required>

                <!-- Role User -->
                <label for="user_role">Role:</label>
                <select name="role" id="user_role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="operator">Admin</option>
                    <option value="dosen">Dosen</option>
                    <option value="public">Public</option>
                </select>

                <!-- Tombol Submit -->
                <button type="submit">Simpan Perubahan</button>
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
    function openUploadModal(userId, userName, userEmail, userRole) {
        uploadModal.style.display = 'flex';

        // Set ID user yang ingin diedit
        document.getElementById('user_id').value = userId;

        // Set nama dan email pengguna (readonly)
        document.getElementById('user_name').value = userName;
        document.getElementById('user_email').value = userEmail;

        // Set role pengguna
        document.getElementById('user_role').value = userRole;
    }

    function closeUploadModal() {
        // Reset input hidden untuk ID User
        const userIdInput = document.getElementById('user_id');
        if (userIdInput) {
            userIdInput.value = "";
        }

        // Reset input Nama User
        const userNameInput = document.getElementById('user_name');
        if (userNameInput) {
            userNameInput.value = "";
        }

        // Reset input Email User
        const userEmailInput = document.getElementById('user_email');
        if (userEmailInput) {
            userEmailInput.value = "";
        }

        // Reset dropdown Role User ke pilihan pertama
        const userRoleDropdown = document.getElementById('user_role');
        if (userRoleDropdown) {
            userRoleDropdown.selectedIndex = 0;
        }

        // Tutup modal Edit User
        const modal = document.getElementById('uploadModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

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

</script>
