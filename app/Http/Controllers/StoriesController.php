<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StoriesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Story::class, 'story');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(3);
            // ->get();

        return view('stories.index', [
            'stories' => $stories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $this->authorize('create'); // No es necesario llamar esta funcion debido al constructor que llama StoryPolicy
        $story = new Story;
        return view('stories.create', [
            'story' => $story
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        // Story::create([
        //     'title' => $request->title...
        // ]);
        // Reemplazamos la anterior instruccion por el hecho de que no podemos asignar manualmente el id del usuario y la base de datos no permite valores nulos a: user_id
        auth()->user()->stories()->create($request->all());
        return redirect()->route('stories.index')->with('status', '¡Historia creada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        // No es necesario usar el siguiente query, siempre y cuando el nombre del parametro en la ruta y el nombre de la clase sean iguales 
        // $story = Story::findOrFail($id);
        return view('stories.show', [
            'story' => $story
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        // Gate::authorize('edit-story', $story);
        // $this->authorize('update', $story); // No es necesario llamar esta funcion debido al constructor que llama StoryPolicy
        return view('stories.edit', [
            'story' => $story
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $story->update($request->all());

        return redirect()->route('stories.index')->with('status', '¡Historia actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('stories.index')->with('status', '¡Historia eliminada correctamente!');
    }
}
