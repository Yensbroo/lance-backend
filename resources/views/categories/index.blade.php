@extends('layouts.app') 
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht categoriëen</h3>
        <a href="/categories/create"><button class="add-btn">+ Categorie toevoegen</button></a>
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <table>
                <thead>
                    <th>Titel</th>
                    <th>Gemaakt op</th>
                    <th>Eindigt op</th>
                    <th>Acties</th>
                </thead>
                @foreach ($categories as $category)
                <tr>
                    <td><a href="/category/{{$category->id}}" class="show-link">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at}}</td>
                    <td><a href="/category/{{$category->id}}"><i class="fas fa-pen-square actions"></i></a></td>
                </tr>
                @endforeach
            </table>
            {{ $categories->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection