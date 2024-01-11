<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = session('products', []);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,4',
            'image' => 'nullable|file',
        ]);

        $product = [
            'libelle' => $request->input('libelle'),
            'marque' => $request->input('marque'),
            'prix' => $request->input('prix'),
            'stock' => $request->input('stock'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images') : null,
        ];

        $products = session('products', []);
        $products[] = $product;
        session(['products' => $products]);

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès.');
    }

    public function show($id)
    {
        $products = session('products', []);
        $product = isset($products[$id]) ? $products[$id] : null;

        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $products = session('products', []);
        $product = isset($products[$id]) ? $products[$id] : null;

        return view('products.edit', compact('product','id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,4',
            'image' => 'nullable|file',
        ]);
    
        $product = [
            'libelle' => $request->input('libelle'),
            'marque' => $request->input('marque'),
            'prix' => $request->input('prix'),
            'stock' => $request->input('stock'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images') : null,
        ];
    
        $products = session('products', []);
        $products[$id] = $product;
        session(['products' => $products]);
    
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }
    
    public function destroy($id)
    {
        $products = session('products', []);
    
        if (isset($products[$id])) {
            unset($products[$id]);
            session(['products' => $products]);
            return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
        } else {
            return redirect()->route('products.index')->with('error', 'Produit non trouvé.');
        }
    }
}    