@extends('layouts.app')@section('content')
<dashboard :project-data="{{ $projectData }}" :user-data="{{ $userData }}" inline-template>
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <h3>Welkom {{$user->full_name}}</h3>
        <div class="chart-container">
          <h4>Aantal projecten gecreëerd de afgelopen 7 dagen</h4>
          <svg class="project_chart">
          </svg>
        </div>
        <div class="chart-container users">
        <h4>Aantal gebruikers gecreëerd de afgelopen 7 dagen</h4>
          <svg class="user_chart">
          </svg>
        </div>
        <div class="chart-container"></div>
      </div>
    </div>
  </div>
</dashboard>
@endsection