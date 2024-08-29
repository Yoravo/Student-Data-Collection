{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Santri') }}
        </h2>
    </x-slot>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <hr>

        <table class="table table-bordered border-primary">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nama Santri</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Handphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($santris as $santri)
                    <tr>
                        <td class="align-middle">{{ $santri->nama_santri }}</td>
                        <td class="align-middle">{{ $santri->tempat_lahir }}</td>
                        <td class="align-middle">{{ $santri->tanggal_lahir }}</td>
                        <td class="align-middle">{{ $santri->alamat }}</td>
                        <td class="align-middle">{{ $santri->no_hp }}</td>
                        <td class="align-middle text-center">
                            @if (Auth::user()->usertype === 'admin')
                                <div class="button-group">
                                    <a href="{{ route('admin/santri/edit', ['id_santri' => $santri->id_santri]) }}" class="btn btn-primary" type="button">Edit</a>
                                    <a href="{{ route('admin/santri/delete', ['id_santri' => $santri->id_santri]) }}" class="btn btn-danger" type="button">Delete</a>
                                </div>
                            @else
                                <!-- Tampilkan tombol atau tindakan lain untuk user biasa jika diperlukan -->
                                <span class="text-muted">No Actions</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data santri</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('admin/santri/input') }}" class="btn btn-primary">Tambah Santri</a>
    </div>
</x-app-layout> --}}
