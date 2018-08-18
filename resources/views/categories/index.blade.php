@extends('layouts.app') 
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht categoriëen</h3>
            <table>
                <thead>
                    <th>Titel</th>
                    <th>Gemaakt op</th>
                    <th>Eindigt op</th>
                    <th>Acties</th>
                </thead>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at}}</td>
                    <td><i class="fas fa-pen-square actions"></i><i class="fas fa-trash actions"></i><i class="fas fa-times-circle actions"></i></td>
                </tr>
                @endforeach
            </table>
            <form method="POST" action="/categories">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" id="category">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-create">+ Categorie toevoegen</button>
                </div>
            </form>
            {{ $categories->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection