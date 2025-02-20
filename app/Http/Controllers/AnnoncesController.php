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
        return view('annonce.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnonceRequest $request)
    {

        Annonce::create(array_merge($request->validated(), [ 'user_id' => auth()->id(),'status' => 'actif'  ]));

        return redirect('/annonce')->with('status','Annonce created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        $annonce->load('user');
        $annonce->load('categorie');
        return view('annonce.show' , compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        $categories = Category::all();
    
        return view('annonce.edit' , compact('annonce','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {
        $annonce->update($request->validated());
        return redirect('/annonce')->with('status','Annonce updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->update(['status' => 'archivé']);
        $annonce->delete();

        return redirect('/annonce')->with('status','Annonce deleted successfully');
    }

    public function restoreAll()
    {
        Annonce::onlyTrashed()->restore();

    return redirect('/annonce')->with('status', 'Annonce restored successfully');
    }

}
