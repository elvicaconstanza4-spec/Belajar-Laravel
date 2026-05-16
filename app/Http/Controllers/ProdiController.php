<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $prodi = Prodi::width(['fakultas'])->get();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
