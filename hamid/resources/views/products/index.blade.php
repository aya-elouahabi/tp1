
@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:#af8da5;
    }
        h1 {
            color:#401b31;
            text-align :center ;
        }

        .btn {
            margin-right: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

    </style>

    <h1>Liste des Produits</h1>
    
    <a href="{{ route('products.create') }}" class="btn btn-success">Créer un Produit</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product['libelle'] }}</td>
                    <td>{{ $product['marque'] }}</td>
                    <td>{{ $product['prix'] }}</td>
                    <td>{{ $product['stock'] }}</td>
                    <td>
                        <a href="{{ route('products.show', $key) }}" class="btn btn-info">Détails</a>
                        <a href="{{ route('products.edit', $key) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('products.destroy', $key) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
