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
<template>
  <ais-index
    app-id="{{ config('scout.algolia.id') }}"
    api-key="{{ env('ALGOLIA_SEARCH') }}"
    index-name="projects"
  >
    <ais-input placeholder="Zoek projecten..." class="search"></ais-input>
    
    <ais-results :results-per-page="7" inline-template>
    <table>
                <thead>
                    <th>Titel</th>
                    <th>Gemaakt op</th>
                    <th>Eindigt op</th>

                    <th>Acties</th>
                    
                </thead>
                <tr v-for="result in results" :key="result.objectID">
                    <td><a v-bind:href="'projects/' + result.id">@{{ result.title }}</a></td>
                    <td>@{{ result.created_at }}</td>
                    <td>@{{ result.project_end }}</td>
                    <td><a href="'projects/' + result.id"><i class="fas fa-pen-square actions"></i></a><i class="fas fa-trash actions"></i><i class="fas fa-times-circle actions"></i></td>
                </tr>
            </table>
    </ais-results>
    <ais-pagination v-bind:class-names="{'ais-pagination': 'pagination','ais-pagination__item--active': 'active', 'ais-pagination__item--previous': 'ais-previous', 'ais-pagination__item--next': 'ais-next'}"></ais-pagination>
  </ais-index>
</template>
        </div>
    </div>
</div>
@endsection