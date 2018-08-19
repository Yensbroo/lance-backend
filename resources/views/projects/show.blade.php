@extends('layouts.app') @section('content')
<project :attributes="{{ $project }}" :categories="{{ $categories }}" inline-template>
    <div class="content-wrapper">
        <div class="content">
            <div class="container" id="project">
                <h3>Bewerk project</h3>
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <br>
                        <input type="text" v-model="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Categorie</label>
                    <select v-model="category_id" class="select_style form-control">
                            <option value="">Kies een categorie...</option>
                                <option v-bind:value="category.id" v-for="category in categories">@{{ category.name }}</option>
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="startDate">Start van het project</label>
                        <br>
                        <input type="datetime-local" class="form-control" v-model="project_start" :min="today">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Einde project</label>
                        <br>
                        <input type="datetime-local" class="form-control" v-model="project_end" :min="project_start">
                    </div>
                    <div class="form-group ">
                        <label for="budget">Budget(€)</label>
                        <br>
                        <input type="number" class="form-control" v-model="budget" required>
                    </div>
                    <div class="form-group">
                        <label for="published">Gepubliceerd</label>
                        <br> 
                        <label class="switch">
                        <input type="checkbox" v-model="published" class="published" checked="true">
                        <span class="slider"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="descr">Beschrijving</label>
                        <br>
                        <textarea id="descr" v-model="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn-create" @click="update">Bewerk project</button>
                    </div>
                <form action="{{ $project->path() }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE')}}
                <button type="submit" class="btn-delete">Verwijder project</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</project>
@endsection