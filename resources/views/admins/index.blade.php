@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container">
        <h3 class="left">Overzicht administrators</h3>
        <a href="/user/create"><button class="add-btn">+ Admin toevoegen</button></a>
            <table>
                <thead>
                    <th>Naam</th>
                    <th>Gebruiker sinds</th>
                    <th>Acties</th>
                </thead>
                @foreach ($admins as $admin)
                <tr>
                    <td><a href="admins/{{ $admin->id }}" class="show-link">{{ $admin->full_name }}</a></td>
                    <td>{{ $admin->created_at }}</td>
                    <td><a href="/users/{{ $admin->id }}"><i class="fas fa-pen-square actions"></i></a><i class="fas fa-trash actions"></i><i class="fas fa-times-circle actions"></i></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection