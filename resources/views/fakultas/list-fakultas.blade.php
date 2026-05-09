<x-layout title="List Fakultas">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>List Fakultas</h1>

            <div>
                <a href="/fakultas/create" class="btn btn-primary">
                    Tambah Fakultas
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Fakultas</th>
                    <th>Nama Dekan</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($fakultas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->dekan }}</td>
                        <td class="d-flex gap-2">
                            <a
                                href="/fakultas/{{ $item->id }}"
                                class="btn btn-info btn-sm"
                            >
                                Detail
                            </a>

                            <a
                                href="/fakultas/{{ $item->id }}/edit"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <form
                                action="/fakultas/{{ $item->id }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data fakultas belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>