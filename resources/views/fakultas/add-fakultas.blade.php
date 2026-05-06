<x-layout>
    <div>
         <h1>Add Fakultas</h1>
    </div>

    <form action="/fakultas" method="post">
        @csrf
        <div class="form-group">
            <input 
                name="name_fakultas"
                type="text"
                class="form-control"
                placeholder="Nama Fakultas">
        </div>
        <div class="form-group">
            <input
                name="name_dekan"
                type="text"
                class="form-control"
                placeholder="Nama Dekan">
        </div>
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>

</x-layout>
