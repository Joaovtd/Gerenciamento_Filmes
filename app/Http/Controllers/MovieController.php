<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create', [
            "categories" => Category::all()->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $imagePath = $image->store('movies', 'public');

            $data['cover'] = $imagePath;
        }

        $movie = Movie::create($data);

        return redirect()->route('movie.show', $movie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie = Movie::findOrFail($movie->id);

        return view('movies.index', [
            "movie" => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $categorias = Category::all()->toArray();
        return view('movies.edit', [
            "categories" => $categorias,
            "movie" => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request)
    {
        $data = $request->validated();
        $movie = Movie::find($request->id);

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $imagePath = $image->store('movies', 'public');
            $data['cover'] = $imagePath;
        } else {
            $data['cover'] = $movie->cover;
        }
        $movie->update($data);

        return redirect()->route('movie.show', $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route("movie.index");
    }

        public function search(Request $request)
    {
        $search_term = '%' . $request->input('text') . '%';

        $movies = Movie::where('title', 'like', $search_term)->get();

        return view("movie.search", [
            "movies" => $movies
        ]);
    }

}
