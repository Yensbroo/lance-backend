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
                    <th>Rol</th>
                    <th>Acties</th>
                </thead>
                @foreach ($users as $user)
                <tr>
                    <td><a href="#">{{ $user->full_name }}</a></td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td><a href="/users/{{ $user->id }}"><i class="fas fa-pen-square actions"></i></a><i class="fas fa-trash actions"></i><i class="fas fa-times-circle actions"></i></td>
                </tr>
                @endforeach
            </table>
            {{ $users->links("pagination::default") }}
        </div>
    </div>
</div>
@endsection