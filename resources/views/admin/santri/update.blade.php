<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Santri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h5 class="mb-2">Edit Santri</h5>
                    <hr class="mb-2">
                    <p><a href="{{ route('dashboard')}}" class="btn btn-primary mb-2">Kembali</a></p>
                    <form action="{{ route('admin/santri/update', ['id_santri' => $santri->id_santri]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nama_santri" id="floatingInput" placeholder="Nama Santri" value="{{$santri->nama_santri}}">
                                    <label for="floatingInput">Nama Santri</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="tempat_lahir" id="floatingPassword" placeholder="Tempat Lahir" value="{{$santri->tempat_lahir}}">
                                    <label for="floatingPassword">Tempat Lahir</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="floatingInput" placeholder="Tanggal Lahir" value="{{$santri->tanggal_lahir}}">
                                    <label for="floatingInput">Tanggal Lahir</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="alamat" id="floatingInput" placeholder="Alamat" value="{{$santri->alamat}}">
                                    <label for="floatingInput">Alamat</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="no_hp" id="floatingInput" placeholder="Nomor Handphone" value="{{$santri->no_hp}}">
                                    <label for="floatingInput">Nomor Handphone</label>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning" type="submit">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
