@foreach ($books as $book)
<tr>
   <td>{{$book->id}}</td>
   <td>{{$book->title}}</td>
   <td>{{$book->author}}</td>
</tr>
@endforeach
<tr>
   <td colspan="3" align="center">
      {{$books->links()}}
   </td>
</tr>