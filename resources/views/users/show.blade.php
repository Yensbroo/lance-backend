@extends('layouts.app') @section('content')
<user :attributes="{{ $user }}" inline-template>
<div class="content-wrapper">
  <div class="content">
    <div class="container" id="project">
    <div class="user_links">
      <ul>
        <li><a href="">Gegevens</a></li>
        <li><a href="">Profiel</a></li>
        <li><a href="">Statistieken</a></li>
      </ul>
    </div>
    <hr>
      <h3>Bewerk gebruiker</h3>
        <div class="form-group">
          <label for="full_name">Volledige naam</label>
          <input type="text" class="form-control" v-model="full_name" required> @if ($errors->has('email'))
          <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" v-model="email" required>
        </div>
        <div class="form-group">
          <label for="">Rol</label>
          <br>
          <select v-model="role_id" class="select_style form-control">
            <option value="">Kies een rol...</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id}}" {{ old( 'role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
          </select>
          <br>
        </div>
        <div class="form-group">
          <button @click="update" class="btn-create">Bewerk gebruiker</button>
        </div>
    </div>
  </div>
</div>
</div>
</user>
@endsection