<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\AnnonceRequest;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::paginate(10);
        return view('annonce.index', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('annonce.create' , compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    {

        Annonce::create($request->validated());

        return redirect('/annonce')->with('status','Annonce created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonces)
    {
        return view('annonce.show' , compact('annonces'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonces)
    {
        $categories = Category::all();
        $users = User::all();
        return view('annonce.edit' , compact('annonces','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonces $annonces)
    {
        $annonces->update($request->validated());
        $annonces->user()->associate(User::find($request->user_id));
        $annonces->categorie()->associate(Category::find($request->categorie_id)); 
        $annonces->save();

        return redirect('/annonce')->with('status','Annonce updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonces)
    {
        $annonces->delete();

        return redirect('/annonce')->with('status','Annonce deleted successfully');
    }
}
