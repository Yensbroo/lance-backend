@extends('layouts.app') @section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <h3 class="left">Overzicht administrators</h3>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <a href="/admins/create">
                <button class="add-btn">+ Admin toevoegen</button>
            </a>
            <table>
                <thead>
                    <th>Naam</th>
                    <th>Gebruiker sinds</th>
                    <th>Level</th>
                    <th>Acties</th>
                </thead>
                @foreach ($admins as $admin)
                <tr>
                    <td>
                        <a href="admins/{{ $admin->id }}" class="show-link">{{ $admin->full_name }}</a>
                    </td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{$admin->level->name}}</td>
                    <td class="td-rel">
                        <a href="/users/{{ $admin->id }}">
                            <i class="fas fa-pen-square actions"></i>
                        </a>
                        @if($admin->id != $user)
                        <form action="/admins/delete/{{$admin->id}}" method="POST"> {{ method_field('DELETE') }} {{ csrf_field() }}
                            <button type="submit" class="trans-btn">
                                <i class="fas fa-trash actions"></i>
                            </button>
                        </form>
                        @else
                        <div></div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection