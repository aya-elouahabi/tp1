@extends('layouts.app')

@section('content')
<style>
            h1 {
            color:#401b31;
            text-align :center ;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            margin-right: 5px;
        }

        .btn {
            margin-right: 5px;
        }

        .btn-warning {
            background-color: #ffc107; 
            color: #212529;
        }
        body{
            background-color:#af8da5;

        }
    </style>
    <h1>Détails du Produit</h1>
    
    @if ($product)
        <p><strong>Libellé:</strong> {{ $product['libelle'] }}</p>
        <p><strong>Marque:</strong> {{ $product['marque'] }}</p>
        <p><strong>Prix:</strong> {{ $product['prix'] }}</p>
        <p><strong>Stock:</strong> {{ $product['stock'] }}</p>
        <p><strong>Image:</strong> {{ $product['image'] }}</p>
    @else
        <p>Produit non trouvé.</p>
    @endif
@endsection
