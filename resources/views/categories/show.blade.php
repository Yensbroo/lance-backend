@extends('layouts.app') @section('content')
<category :attributes="{{ $category }}" :categories="{{ $categories }}" inline-template>
<div class="content-wrapper">
  <div class="content">
    <div class="container" id="project">
      <h3>Bewerk categorie</h3>
      <div class="form-group">
          <label for="name">Categorie</label>
          <input type="text" class="form-control" v-model="name" required>
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" v-model="slug" required>
        </div>
        <div class="form-group">
          <button @click="update" class="btn-create">Bewerk categorie</button>
        </div>
    </div>

  </div>
</div>
</div>
</category>
@endsection