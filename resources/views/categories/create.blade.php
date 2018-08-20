@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container" id="project">
            <h3>Maak een nieuwe categorie</h3>
            <form method="POST" action="/categories">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="category">Categorie naam</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-create">Maak categorie</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection