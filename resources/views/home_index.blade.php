@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
   <main class="home-page">
      <h1 class="visually-hidden">{{__('Главная Страница Портала «AtS Book Space»')}}</h1>
   </main>
@endsection

@section('scripts')
   {{--  --}}
@endsection