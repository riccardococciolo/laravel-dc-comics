<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comic;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        $validatedData = $request->validated();

        $comic = new Comic();
        $comic->title = $validatedData['title'];
        $comic->thumb = $validatedData['thumb'];
        $comic->price = $validatedData['price'];
        $comic->series = $validatedData['series'];
        $comic->sale_date = $validatedData['sale_date'];
        $comic->type = $validatedData['type'];
        $comic->description = $validatedData['description'];
        $comic->save();

        return redirect()->route('comics.index')->with('success', 'Comic creato con successo!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, $id)
    {
        $validatedData = $request->validated();

        $comic_to_update = Comic::findOrFail($id);

        $comic_to_update->title = $validatedData['title'];
        $comic_to_update->thumb = $validatedData['thumb'];
        $comic_to_update->price = $validatedData['price'];
        $comic_to_update->series = $validatedData['series'];
        $comic_to_update->sale_date = $validatedData['sale_date'];
        $comic_to_update->type = $validatedData['type'];
        $comic_to_update->description = $validatedData['description'];
        $comic_to_update->save();

        return redirect()->route('comics.index')->with('success', 'Comic modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()->route('comics.index')->with('success', 'Comic eliminato con successo!');
    }
}
