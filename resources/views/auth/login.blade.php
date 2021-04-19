@extends('layouts.app')
@section('content')
<div class='flex justify-center p-3'>
    <div class='w-4/12 bg-white p-6 rounded-lg'>
        <h3 class='text-xl text-center'>Login</h3>
        @if(session('failed_status'))
            <div class='bg-red-500 text-white mt-3 p-3 text-center rounded-lg font-medium'>
            {{ session('failed_status') }}
            </div>
        @endif
        <div class='w-12/12 bg-white p-6 rounded-lg'>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class='mb-4'>
                    <label for="email" class='sr-only'>Email</label>
                    <input type="email" placeholder='Your email' name='email' id='email' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror " value='{{old("email")}}'  />
                    @error('email')
                    <div class='text-red-500 mt-2 text-sm'> 
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class='mb-4'>
                    <label for="password" class='sr-only'>Password</label>
                    <input type="password" placeholder='Password' name='password' id='password' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror " />
                    @error('password')
                    <div class='text-red-500 mt-2 text-sm'> 
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class='mb-4'>
                    <input type="submit" name='register_sub' class="bg-blue-400 text-white w-full px-4 py-3 font-medium rounded-sm my-3" value='Login'  />
                </div>

                 <div class='mb-4 justify-between flex'>
                  <a href='{{route("forgotPassword")}}' class='text-red-400 text-sm'> Forgot password ?</a>
                  <span class='text-black-300 text-sm text-right'>Are you new here ?   <a href='{{route("register")}}' class='text-blue-400'> Signup</a> </span> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
