@extends('layouts.app')
@section('content')

<style>
        h1 {
            color:#401b31;
            text-align :center ;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        button {
         
  background-color: #401b31;
  color: #fff;
  border-radius: 5px;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-right: 15px;
  margin-top: 15px;
  cursor: pointer;
            
        }
        body{
            background-color:#af8da5;

        }
    </style>
    <h1>Créer un Produit</h1>
    
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="libelle">Libellé :</label>
        <input type="text" name="libelle" required>

        <label for="marque">Marque :</label>
        <input type="text" name="marque" required>

        <label for="prix">Prix :</label>
        <input type="number" name="prix" step="0.01" required>

        <label for="stock">Stock :</label>
        <input type="number" name="stock" required min="1" max="4">

        <label for="image">Image :</label>
        <input type="file" name="image">

        <button type="submit" class="btn btn-success">Créer le Produit</button>
    </form>
@endsection
