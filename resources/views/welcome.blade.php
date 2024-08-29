<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
        }

        .fade-out {
            animation: fadeOut 1s forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .welcome-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .welcome-box {
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease-in-out;
        }

        .welcome-box:hover {
            transform: scale(1.05);
        }

        .btn-primary {
            background-color: #0f2027;
            border-color: #0f2027;
        }

        .btn-outline-light {
            border-color: #ffffff;
            color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #0f2027;
        }
    </style>
</head>
<body>

    <div id="welcomeContent" class="welcome-container">
        <div class="welcome-box">
            <h1 class="display-4 fw-bold">Selamat Datang di Aplikasi Pendataan Santri XYZ</h1>
            <p class="lead mt-3 mb-4">Silakan masuk atau mendaftar untuk mengakses data santri.</p>
            <div>
                <a id="loginBtn" href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">Masuk</a>
                <a id="registerBtn" href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-TX8t27EcRE3e/ihU7zmPaBlrf2IwG4R+IsnpKpXvO7dIdTMyL+qG/O5pwH2jRMhP" crossorigin="anonymous"></script>
    <script>
        // Fungsi untuk mengatur efek fade-out dan redirect ke halaman login atau register
        document.getElementById('loginBtn').addEventListener('click', function(event) {
            event.preventDefault();
            fadeOutAndRedirect('{{ route('login') }}');
        });

        document.getElementById('registerBtn').addEventListener('click', function(event) {
            event.preventDefault();
            fadeOutAndRedirect('{{ route('register') }}');
        });

        // Fungsi untuk efek fade-out dan redirect
        function fadeOutAndRedirect(url) {
            const content = document.getElementById('welcomeContent');
            content.classList.add('fade-out');
            setTimeout(function() {
                window.location.href = url;
            }, 1000);  // Sesuaikan dengan durasi fade-out (1 detik)
        }

        // Fungsi untuk menampilkan konten saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const content = document.getElementById('welcomeContent');
            content.classList.remove('fade-out');
            content.style.opacity = 1;
        });

        // Fungsi untuk menampilkan konten saat kembali ke halaman
        window.addEventListener('pageshow', function(event) {
            const content = document.getElementById('welcomeContent');
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                // Mengatur ulang opasitas dan memastikan konten ditampilkan saat kembali ke halaman
                content.style.opacity = 1;
                content.classList.remove('fade-out');
            }
        });
    </script>
</body>
</html>
