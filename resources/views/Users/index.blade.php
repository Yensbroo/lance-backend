@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht gebruikers</h3>
        <a href="/user/create"><button class="add-btn">+ Gebruiker toevoegen</button></a>
            <table>
                <thead>
                    <th>Naam</th>
                    <th>Gebruiker sinds</th>
                    <th>Acties</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td><a href="users/{{ $user->id }}" class="show-link">{{ $user->full_name }}</a></td>
                    <td>{{ $user->created_at }}</td>
                    <td class="td-rel"><a href="/users/{{ $user->id }}"><i class="fas fa-pen-square actions"></i></a>@if($user->deleted_at == null) <form action="/users/delete/{{ $user->id }}" method="POST"> {{ method_field('DELETE') }}
    {{ csrf_field() }}<button type="submit" class="trans-btn"><i class="fas fa-trash actions"></i></button></form>@else <form method="POST" action="/users/undelete/{{$user->id}}">{{ method_field('PATCH') }}
    {{ csrf_field() }}<button type="submit" class="trans-btn"><i class="fas fa-undo-alt actions"></i></a></button></form>@endif</td>
                </tr>
                @endforeach
            </table>
            {{ $users->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection