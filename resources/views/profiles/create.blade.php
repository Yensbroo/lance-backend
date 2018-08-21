@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container" id="project">
            <h3>Deze gebruiker heeft nog geen profiel</h3>
            <form method="POST" action="/profile">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="Headline">Headline</label>
                    <input type="text" class="form-control" id="headline" name="headline" value="{{ old('headline') }}" required>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" cols="30" rows="10" required>{{ old('bio') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-create">Maak profiel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection