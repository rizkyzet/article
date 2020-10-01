<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {


        $artikel = Artikel::latest()->paginate(6);


        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attr = $request->validate([
            'judul' => 'required|unique:artikel,judul',
            'isi' => 'required'
        ]);
        $attr['slug'] = Str::slug($request->judul);
        Artikel::create($attr);

        return redirect()->route('artikel.index')->with('status', 'Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $this->authorize('update', $artikel);

        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        $attr = $request->validate([
            'judul' => 'required|unique:artikel,judul,' . $artikel->id_artikel . ',id_artikel',
            'isi' => 'required'
        ]);

        $artikel->update($attr);
        if ($artikel->wasChanged()) {

            return redirect()->route('artikel.index')->with('status', 'Data berhasil diubah');
        } else {
            return redirect()->route('artikel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {

        $this->authorize('delete', $artikel);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('status', 'Artikel <strong>' . $artikel->judul . '</strong> telah dihapus!');
    }
}
