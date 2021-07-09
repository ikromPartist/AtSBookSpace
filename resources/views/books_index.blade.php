@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
@endsection

@section('content')
   <main class="books-page">
      <div class="container">

         <div class="breadcrumbs">
            
         </div>
         
         <h1>{{__('Все книги')}}</h1>
      
      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection