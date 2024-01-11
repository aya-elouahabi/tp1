
@extends('layouts.app')

@section('content')

<style>
        h1 {
            color:#401b31;
            text-align :center ;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
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

        p {
            color: #dc3545; 
            font-weight: bold;
        }
        body{
        background-color:#af8da5;
    }


    </style>


    <h1>Modifier le Produit</h1>
    
    @if ($product)
        <form action="{{ route('products.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <label for="libelle">Libellé :</label>
            <input type="text" name="libelle" value="{{ $product['libelle'] }}" required>

            <label for="marque">Marque :</label>
            <input type="text" name="marque" value="{{ $product['marque'] }}" required>

            <label for="prix">Prix :</label>
            <input type="number" name="prix" value="{{ $product['prix'] }}" step="0.01" required>

            <label for="stock">Stock :</label>
            <input type="number" name="stock" value="{{ $product['stock'] }}" required min="1" max="4">

            <label for="image">Image :</label>
            <input type="file" name="image" value="{{ $product['image'] }}">

            <button type="submit" class="btn btn-success">Modifier le Produit</button>
        </form>
    @else
        <p>Produit non trouvé.</p>
    @endif
@endsection
