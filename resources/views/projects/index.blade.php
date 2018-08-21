@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht projecten</h3>
        <a href="/projects/create"><button class="add-btn">+ Project toevoegen</button></a>
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
            <table>
                <thead>
                    <th>Titel</th>
                    <th>Gemaakt op</th>
                    <th>Acties</th>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td><a href="projects/{{ $project->id }}" class="show-link">{{ $project->title }}</a></td>
                    <td>{{ $project->created_at }}</td>
                    <td class="td-rel"><a href="/projects/{{ $project->id }}"><i class="fas fa-pen-square actions"></i></a>@if($project->deleted_at == null) <form action="/projects/delete/{{$project->id}}" method="POST"> {{ method_field('DELETE') }}
    {{ csrf_field() }}<button type="submit" class="trans-btn"><i class="fas fa-trash actions"></i></button></form>@else <form method="POST" action="/projects/undelete/{{$project->id}}">{{ method_field('PATCH') }}
    {{ csrf_field() }}<button type="submit" class="trans-btn"><i class="fas fa-undo-alt actions"></i></a></button></form>@endif</td>
                </tr>
                @endforeach
            </table>
            {{ $projects->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection