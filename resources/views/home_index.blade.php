@extends('layouts.master')
{{-- page styles --}}
@section('styles')
   <link rel="stylesheet" href="{{asset('css/home.css')}}">
   <link rel="stylesheet" href="{{asset('css/media/home.css')}}">
@endsection
{{-- page content --}}
@section('content')
   <main class="home-page">
      <h1 class="visually-hidden">{{__('Главная Страница Портала «AtS Book Space»')}}</h1>
   </main>
@endsection
{{-- page scripts --}}
@section('scripts')
   <script></script>
@endsection