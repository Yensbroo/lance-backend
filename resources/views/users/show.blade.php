@extends('layouts.app') @section('content')
<user :attributes="{{ $user }}" inline-template>
  <div class="content-wrapper">
    <div class="content">
      <div class="container" id="project">
        <div class="user_links">
          <ul>
            <li>
              <a href="">Gegevens</a>
            </li>
            <li>
              <a href="/profile/{{ isset($user->profile->id) ? $user->profile->id : $user->id }}">Profiel</a>
            </li>
            <li>
              <a href="">Statistieken</a>
            </li>
          </ul>
        </div>
        <hr>
        <h3>Bewerk gebruiker</h3>
        <form action="/users">
        {{ csrf_field() }} {{ method_field('PATCH')}}
          <div class="form-group">
            <label for="full_name">Volledige naam</label>
            <input type="text" class="form-control" v-model="full_name"> 
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" v-model="email">
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
        </form>
        <form v-if="deleted_at == null" :action="'/users/delete/' + id" method="POST">
          {{ csrf_field() }} {{ method_field('DELETE')}}
          <button type="submit" class="btn-delete">Verwijder gebruiker</button>
        </form>
        <form v-else :action="'/users/undelete/' + id" method="POST">
          {{ csrf_field() }} {{ method_field('PATCH')}}
          <button type="submit" class="btn-undelete">Zet gebruiker op actief</button>
        </form>
      </div>
    </div>
  </div>
  </div>
</user>
@endsection