<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with(['fakultas',
        ])->orderBy('created_at', 'desc');
        return view('prodi.list-prodi', compact('prodi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.add-prodi', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdiRequest $request)
    {
        $validate = $request->safe();
        $filePath = Storage::disk("public")
            ->putFile("profile_kaprodi", $validate->file('photo_kaprodi'));

        
        prodi::create([
                'fakultas_id' => $validate->fakultas_id,
                'nama_prodi' => $validate->nama_prodi,
                'nama_kaprodi' => $validate->nama_kaprodi,
                'photo_kaprodi' => $filePath
            ]);
        return Redirect()->route("prodi.index")->with("success", "berhasil di tambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit-prodi',compact('prodi','fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {
        $data = $request->validated();
        if ($request->hasFile('photo_kaprodi')) {
        
        if ($prodi->photo_kaprodi) {
            Storage::disk('public')->delete($prodi->photo_kaprodi);
        }
            // Upload foto baru
            $path = Storage::disk('public')->putFile('profile_kaprodi', $request->file('photo_kaprodi'));
            $data['photo_kaprodi'] = $path;
        } else {
            unset($data['photo_kaprodi']);
        }
        $prodi->update($data);
        return redirect('/prodi')->with('Success','Prodi Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        if($prodi->photo_kaprodi){
            Storage::disk('public')->delete($prodi->photo_kaprodi);
        }
        $prodi->delete(...);
        return redirect('/prodi')->with('Success','Prodi Berhasil Dihapus!');
    }
}
