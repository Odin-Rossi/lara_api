@extends('layouts.app')
@section('content')
<div class='flex justify-center p-3'>
    <div class='w-4/12 bg-white p-6 rounded-lg'>
        <h3 class='text-xl text-center'>Reset Password</h3>
        <div class='w-12/12 bg-white p-6 rounded-lg'>
            <form action="{{ route('resetPassword.store') }}" method="post">
                @csrf
                <div class='mb-4'>
                    @if(session('sms_good') || session('sms_bad'))
                        <div class='@if (session('sms_good')) bg-green-500
                        @else bg-red-500 @endif  text-white mb-3 p-3 text-center rounded-lg font-medium'>
                        {{ session('sms_good') ?? session('sms_bad') }}
                        </div>
                    @endif
                <input type="hidden" value="{{$_REQUEST['token']}}" name='tokenz' />
                    <label for="password" class='sr-only'>Password</label>
                    <input type="password" placeholder='Choose a new Password' name='password' id='password' class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror " />
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
                    <input type="submit" name='register_sub' class="bg-blue-400 text-white w-full px-4 py-3 font-medium rounded-sm my-3" value='Go'  />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
