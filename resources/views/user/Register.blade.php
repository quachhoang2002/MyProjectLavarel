<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
   @endif
   {{Auth::user()->name}}
    <form action="{{ route('user.store')}}" method="POST">
        @csrf
        Ten <input type="name" name="name" value="{{old('name')}}"> @error('name')
          <p> {{$message}}</p>
        @enderror

        Email <input type="email" name="email" placeholder="Email address" value="{{old('email')}}" required>
        @error('email')
        <p> {{$message}}</p>
        @enderror


        Password <input type="password" name="password" placeholder="Enter your password" value="{{old('password')}}" required>
        @error('password')
        <p> {{$message}}</p>
        @enderror

       Confirm Password <input type="password" name="password_confirmation" placeholder="Enter your password" required>
        @error('password_confirmation')
        <p> {{$message}}</p>
        @enderror

        <button> Dang ky</button>
    </form>
</body>
</html>
