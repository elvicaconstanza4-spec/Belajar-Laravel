<x-layout>
    <h1>Edit Fakultas</h1>

    <form action="/fakultas/{{ $fakultas->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input 
                name="name_fakultas"
                type="text"
                value="{{ $fakultas->name }}"
                class="form-control"
                placeholder="Nama Fakultas">
        </div>
        <div class="form-group">
            <input
                name="name_dekan"
                type="text"
                value="{{ $fakultas->dekan }}"
                class="form-control"
                placeholder="Nama Dekan">
        </div>
        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>

</x-layout>


