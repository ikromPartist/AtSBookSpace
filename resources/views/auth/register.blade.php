<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Register</title>
</head>
<body>
   
   <form action="{{route('auth.store')}}" method="POST">

      @if (Session::get('success'))
         <p>{{Session::get('success')}}</p>
      @endif

      @if (Session::get('failed'))
         <p>{{Session::get('failed')}}</p>
      @endif

      @csrf
      <p>
         <label>name
            <input type="text" name="name" value="{{old('name')}}">
         </label>
         <span>@error('name'){{$message}}@enderror</span>
      </p>
      <p>
         <label>surname
            <input type="text" name="surname" value="{{old('surname')}}">
         </label>
         <span>@error('surname'){{$message}}@enderror</span>
      </p>
      <p>
         <label>last_name
            <input type="text" name="last_name" value="{{old('last_name')}}">
         </label>
         <span>@error('last_name'){{$message}}@enderror</span>
      </p>
      <p>
         <label>login
            <input type="text" name="login" value="{{old('login')}}">
         </label>
         <span>@error('login'){{$message}}@enderror</span>
      </p>
      <p>
         <label>email
            <input type="email" name="email" value="{{old('email')}}">
         </label>
         <span>@error('email'){{$message}}@enderror</span>
      </p>
      <p>
         <label>company
            <input type="text" name="company" value="{{old('company')}}">
         </label>
         <span>@error('company'){{$message}}@enderror</span>
      </p>
      <p>
         <label>phone_numbers
            <input type="tel" name="phone_numbers" value="{{old('phone_numbers')}}">
         </label>
         <span>@error('phone_numbers'){{$message}}@enderror</span>
      </p>
      <button type="submit">Submit</button>
   </form>

</body>
</html>