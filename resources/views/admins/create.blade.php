@extends('layouts.app') @section('content')
<div class="content-wrapper">
  <div class="content">
    <div class="container" id="project">
      <h3>Maak een nieuwe administrator aan</h3>
      <form method="POST" action="/admins">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"> 
          @if ($errors->has('email'))
          <span class="errors">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          @if ($errors->has('noUser'))
          <span class="errors">
            <strong>{{ $errors->first('noUser') }}</strong>
          </span>
          @endif
          @if ($errors->has('isAdmin'))
          <span class="errors">
            <strong>{{ $errors->first('isAdmin') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Wachtwoord</label>
          <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}">
          @if ($errors->has('password'))
          <span class="errors">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Herhaal wachtwoord</label>
          <input type="password" class="form-control" id="password2" name="password2" value="{{ old('password2')}}">
          @if ($errors->has('password2'))
          <span class="errors">
            <strong>{{ $errors->first('password2') }}</strong>
          </span>
          @endif
        </div>
        
        <div class="form-group">
          <label for="">Level</label>
          <br>
          <select name="level_id" class="select_style form-control">
            <option value="">Kies een level...</option>
            @foreach ($levels as $level)
            <option value="{{ $level->id}}" {{ old( 'level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
            @endforeach
          </select>
          @if ($errors->has('level_id'))
          <span class="errors">
            <strong>{{ $errors->first('level_id') }}</strong>
          </span>
          @endif
        </div>
        <div class="form-group">
          <button type="submit" class="btn-create">Maak admin aan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection