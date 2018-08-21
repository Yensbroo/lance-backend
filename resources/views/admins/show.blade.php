@extends('layouts.app') @section('content')
<admin :attributes="{{ $admin }}" inline-template>
  <div class="content-wrapper">
    <div class="content">
      <div class="container" id="project">
        <h3>Bewerk administrator</h3>
        <div class="form-group">
          <label for="full_name">Volledige naam</label>
          <input type="text" class="form-control" v-model="full_name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" v-model="email">
        </div>
        <div class="form-group">
          <button @click="update" class="btn-create">Bewerk admin</button>
        </div>
        <form :action="'/admins/delete/' + id" method="POST">
          {{ csrf_field() }} {{ method_field('DELETE')}}
          <button type="submit" class="btn-delete">Verwijder admin</button>
        </form>
      </div>
    </div>
  </div>
  </div>
</admin>
@endsection