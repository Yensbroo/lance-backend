@extends('layouts.app') @section('content')
<category :attributes="{{ $category }}" :categories="{{ $categories }}" inline-template>
  <div class="content-wrapper">
    <div class="content">
      <div class="container" id="project">
        <h3>Bewerk categorie</h3>
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
        <form action="/categories">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Categorie</label>
            <input type="text" class="form-control" v-model="name">
          </div>
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" v-model="slug">
          </div>
          <div class="form-group">
            <button @click="update" class="btn-create">Bewerk categorie</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
</category>
@endsection