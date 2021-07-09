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

         <table id="table">

            <thead>
               <tr>
                  <th class="sorting" data-sorting-type="asc" data-column-name="id">ID 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
                  <th class="sorting" data-sorting-type="asc" data-column-name="title">Title 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
                  <th class="sorting" data-sorting-type="asc" data-column-name="author">Author 
                     <span class="material-icons-outlined">arrow_drop_up</span>
                  </th>
               </tr>
            </thead>
            
            <tbody>
               @include('pagination_data')
            </tbody>

         </table>

         <input type="hidden" name="hidden-page" id="hidden-page" value="1">
         <input type="hidden" name="hidden-column-name" id="hidden-column-name" value="id">
         <input type="hidden" name="hidden-sort-type" id="hidden-sort-type" value="asc">
      
      </div>
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection