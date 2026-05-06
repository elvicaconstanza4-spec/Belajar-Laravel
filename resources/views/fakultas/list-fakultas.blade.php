<x-layout>

   <table class="table" >
      
    <a href="/fakultas/create">
      <h1>List Fakultas</h1>
    </a>
      <a href="/edit-fakultas">
      <h1>Edit Fakultas</h1>
   </a>

      <thead>
         <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Nama Dekan</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($fakultas as $item)
            <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$item->name}}</td>
               <td>{{$item->dekan}}</td>
               <td>
                  <a href="/fakultas/{{ $item->id }}">Detail</a>
                  <a href="/fakultas/{{ $item->id }}/edit" class="btn btn-warning" >Edit</a>
                  <form action="/fakultas/{{ $item->id }}" method="post">
                     @csrf
                     @method("DELETE")
                     <button type="submit" class="btn btn-danger" >
                        Hapus
                     </button>
                  </form>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>

</x-layout>
