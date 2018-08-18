@extends('layouts.app') 
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht projecten</h3>
        <a href="/projects/create"><button class="add-btn">+ Project toevoegen</button></a>
            <table>
                <thead>
                    <th>Titel</th>
                    <th>Gemaakt op</th>
                    <th>Eindigt op</th>
                    <th>Acties</th>
                </thead>
                @foreach ($projects as $project)
                <tr>
                    <td><a href="{{ $project->path() }}">{{ $project->title }}</a></td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->project_end }}</td>
                    <td><a href="{{ $project->path() }}"><i class="fas fa-pen-square actions"></i></a><i class="fas fa-trash actions"></i><i class="fas fa-times-circle actions"></i></td>
                </tr>
                @endforeach
            </table>
            {{ $projects->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection