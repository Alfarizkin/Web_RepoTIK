<x-app-layout>
    <style>
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
        }
    </style>
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

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif
        </div>
    </div>
</x-app-layout>
<script>
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