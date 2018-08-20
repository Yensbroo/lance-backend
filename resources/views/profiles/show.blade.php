@extends('layouts.app') @section('content')
<profile :attributes="{{ $profile }}" inline-template>
<div class="content-wrapper">
  <div class="content">
    <div class="container" id="project">
    <div class="user_links">
      <ul>
        <li><a v-bind:href="'/users/' + user_id">Gegevens</a></li>
        <li><a href="">Profiel</a></li>
        <li><a href="">Statistieken</a></li>
      </ul>
    </div>
    <hr>
      <h3>Bewerk profiel</h3>
        <div class="form-group">
          <label for="headline">Headline</label>
          <input type="text" class="form-control" v-model="headline" required>
        </div>
        <div class="form-group">
          <label for="bio">Bio</label>
          <textarea class="form-control" v-model="bio" required></textarea>
        </div>
        <div class="form-group">
          <button @click="update" class="btn-create">Bewerk gebruiker</button>
        </div>
    </div>
  </div>
</div>
</div>
</profile>
@endsection