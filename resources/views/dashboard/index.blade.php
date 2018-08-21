@extends('layouts.app')@section('content')
<dashboard inline-template>
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <h3>Welkom {{$user->full_name}}</h3>
        <div class="chart-container"></div>
        <div class="chart-container"></div>
        <div class="chart-container"></div>
      </div>
    </div>
  </div>
</dashboard>
@endsection