<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Santrix') }}
            </h2>

            <!-- Notifikasi sukses atau error -->
            <div class="ml-3">
                @if (session('success'))
                    <div id="notification" class="alert alert-success custom-notification mb-0" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div id="notification" class="alert alert-danger custom-notification mb-0" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="container mt-4">
        <hr>

        <table class="table table-bordered border-primary">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Santri</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Handphone</th>
                    @if (Auth::user()->usertype === 'admin')
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($santris as $santri)
                    <tr>
                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $santri->nama_santri }}</td>
                        <td class="align-middle">{{ $santri->tempat_lahir }}</td>
                        <td class="align-middle">{{ $santri->tanggal_lahir }}</td>
                        <td class="align-middle">{{ $santri->alamat }}</td>
                        <td class="align-middle">{{ $santri->no_hp }}</td>
                        @if (Auth::user()->usertype === 'admin')
                            <td class="align-middle text-center">
                                <div class="button-group">
                                    <a href="{{ route('admin/santri/edit', ['id_santri' => $santri->id_santri]) }}" class="btn btn-primary" type="button">Edit</a>
                                    <a href="{{ route('admin/santri/delete', ['id_santri' => $santri->id_santri]) }}" class="btn btn-danger" type="button">Delete</a>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data santri</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-around">
            @if (Auth::user()->usertype === 'admin')
            <a href="{{ route('admin/santri/input') }}" class="btn btn-primary">Tambah Santri</a>
            @endif

            <!-- Tombol Cetak PDF dengan ID -->
            <a id="printPdfBtn" href="#" class="btn btn-success">Cetak PDF</a>
        </div>
    </div>

    <!-- CSS untuk notifikasi -->
    <style>
        .custom-notification {
            font-size: 0.825rem; /* Ukuran font lebih kecil */
            padding: 0.25rem 0.5rem; /* Padding lebih kecil */
            margin: 0 auto; /* Memastikan notifikasi terpusat */
            max-width: 200px; /* Lebar maksimum agar tidak terlalu lebar */
            position: absolute; /* Menggunakan posisi absolut */
            left: 50%; /* Mengatur posisi horizontal ke tengah */
            transform: translateX(-50%); /* Menggeser notifikasi ke kiri sejauh setengah lebarnya */
            top: 85px; /* Mengatur posisi vertikal di atas */
        }
    </style>

    <!-- JavaScript untuk notifikasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set a timeout of 5 seconds
            setTimeout(function() {
                // Select the notification element
                var notification = document.getElementById('notification');
                if (notification) {
                    // Fade out the notification
                    notification.style.transition = 'opacity 1s ease';
                    notification.style.opacity = '0';
                    // After the transition, hide the element
                    setTimeout(function() {
                        notification.style.display = 'none';
                    }, 1000);
                }
            }, 4000); // 4 seconds
        });

        // JavaScript untuk konfirmasi unduh PDF
        document.getElementById('printPdfBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Menghindari default action

            // Konfirmasi pengguna
            if (confirm('Apakah Anda ingin mengunduh PDF?')) {
                window.location.href = "{{ route('santri.laporan') }}"; // Arahkan ke URL pengunduhan PDF
            }
        });
    </script>
</x-app-layout>
