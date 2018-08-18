@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container" id="project">
            <h3>Maak een nieuw project</h3>
            <form method="POST" action="/projects">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                        <label for="endDate">Einde project</label>
                        <br>
                        <input type="date" name="project_end" required>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="endDate">Categorie</label>
                        <br>
                        <select name="category_id" class="select_style">
                            <option value="">Kies een categorie...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget</label>
                        <br>
                        <span>€</span><input type="number" name="budget" value="{{ old('budget') }}" required>
                    </div>
                <div class="form-group">
                    <label for="body">Beschrijving</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10" required>{{ old('body') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-create">Maak project</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection