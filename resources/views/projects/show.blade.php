@extends('layouts.app') @section('content')
<project :attributes="{{ $project }}" inline-template>
    <div class="content-wrapper">
        <div class="content">
            <div class="container" id="project">
                <h3>Bewerk project</h3>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <br>
                        <input type="text" v-model="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="endDate">Einde project</label>
                        <br>
                        <input type="datetime-local" class="form-control" :value="project_end">
                        <br>
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