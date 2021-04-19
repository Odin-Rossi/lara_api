@extends('layouts.app')
@section('content')
<div class='flex justify-center p-3'>
    <div class='w-4/12 bg-white p-6 rounded-lg'>
        <h3 class='text-xl text-center'>Register</h3>

        <div class='w-12/12 bg-white p-6 rounded-lg'>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class='mb-4'>
                    <label for="name" class='sr-only'>Name</label>
                    <input autocomplete='off' type="text" placeholder='Your Name' name='name' id='name' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror " value='{{old("name")}}'  />
                    @error('name')
                    <div class='text-red-500 mt-2 text-sm'> 
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class='mb-4'>
                    <label for="username" class='sr-only'>Username</label>
                    <input type="text" placeholder='Choose a username' name='username' id='username' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror " value='{{old("username")}}'  />
                    @error('username')
                    <div class='text-red-500 mt-2 text-sm'> 
                        {{ $message }}
                    </div>
                    @enderror
                </div>

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
                    <input type="password" placeholder='Choose a Password' name='password' id='password' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror " />
                    @error('password')
                    <div class='text-red-500 mt-2 text-sm'> 
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class='mb-4'>
                    <label for="password_confirmation" class='sr-only'>Confirm Password</label>
                    <input type="password" placeholder='Confirm your password' name='password_confirmation' id='password_confirmation' class="bg-gray-100 border-2 w-full p-4 rounded-lg" />
                </div>

                <div class='mb-4'>
                    <input type="submit" name='register_sub' class="bg-blue-400 text-white w-full px-4 py-3 font-medium rounded-sm my-3" value='Register'  />
                </div>

                <div class='mb-4 justify-between flex'>
                  <span class='text-black-300 text-sm text-right'>Already a member ?   <a href='{{route("login")}}' class='text-blue-400'> Sign In</a> </span> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
