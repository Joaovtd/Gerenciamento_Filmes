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
        $categories = Category::all();
        return view('index', [
            "movies" => $movies,
            "categories" => $categories
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
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

        return redirect()->route('show', $movie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $movie = Movie::findOrFail($id);
        return view('show', [
            "movie" => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $categorias = Category::all()->toArray();
        return view('edit', [
            "categories" => $categorias,
            "movie" => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(UpdateMovieRequest $request)
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

        return redirect()->route("admin.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route("index");
    }

    public function search(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('title')) {
            $searchTerm = '%' . $request->input('title') . '%';
            $query->where('title', 'like', $searchTerm);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $movies = $query->get();

        return view("search", [
            "movies" => $movies
        ]);
    }

    /**
     * Página de listagem para admin
     */
    public function adminIndex()
    {
        $movies = Movie::all();
        return view('admin.index', [
            "movies" => $movies
        ]);
    }

    /**
     * Página de criação para admin
     */
    public function adminCreate()
    {
        return view('admin.create', [
            "categories" => Category::all()->toArray(),
        ]);
    }

    /**
     * Página de edição para admin
     */
    public function adminEdit(Movie $movie)
    {
        $categories = Category::all()->toArray();
        return view('admin.edit', [
            "movie" => $movie,
            "categories" => $categories
        ]);
    }

    /**
     * Excluir filme (admin)
     */
    public function adminDestroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route("admin.index");
    }
}
