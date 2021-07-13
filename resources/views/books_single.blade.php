@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
@endsection

@section('content')
   <main class="books-single-page">
      <div class="container">
         
         <h1>{{$book->title}}</h1>

      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection