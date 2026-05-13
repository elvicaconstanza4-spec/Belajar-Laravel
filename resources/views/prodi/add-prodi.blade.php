<x-layout>
    <h1>Tambah Prodi</h1>

    <form action="/prodi" method="POST" ></form>
    @csrf
    <div class="form-group" >
        <select name="fakultas_id=" class="form-select">
            <option value="">Pilih Fakultas</option>
            @foreach ($fakultas as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <input name="nama_prodi" type="text" class="form-control" >
    </div>
    <div class="form-group" >
        <input name="nama_kaprodi" type="text" class="form-control" >
    </div>
    <div class="form-group" >
        <input name="photo_prodi" type="file" accept="image/*" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</x-layout>