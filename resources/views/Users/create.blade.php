@extends('layouts.app') @section('content')
<div class="content-wrapper">
  <div class="content">
    <div class="container" id="project">
      <h3>Maak een nieuwe gebruiker aan</h3>
      <form method="POST" action="/projects">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Volledige naam</label>
          <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" required>
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord</label>
          <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}" required>
        </div>
        <div class="form-group">
          <label for="password">Herhaal wachtwoord</label>
          <input type="password" class="form-control" id="password2" name="password2" value="{{ old('password2')}}" required>
        </div>
        <div class="form-group">
          <label for="">Rol</label>
          <br>
          <select name="category_id" class="select_style form-control">
            <option value="">Kies een rol...</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id}}" {{ old( 'role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
          </select>
          <br>
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