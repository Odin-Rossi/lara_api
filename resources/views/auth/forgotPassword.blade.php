@extends('layouts.app')
@section('content')
<div class='flex justify-center p-3'>
    <div class='w-4/12 bg-white p-6 rounded-lg'>
        <h3 class='text-xl text-center'>Forgot Password</h3>
        @if(session('sms_good') || session('sms_bad'))
            <div class='@if (session('sms_good')) bg-green-500
                @else bg-red-500 @endif 
                text-white mt-3 p-3 text-center rounded-lg font-medium'>
                {{ session('sms_good') ?? session('sms_bad') }}
            </div>
        @endif
        <div class='w-12/12 bg-white p-6 rounded-lg'>
            <form action="{{ route('forgotPassword.store') }}" method="post">
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
                    <input type="submit" name='register_sub' class="bg-blue-400 text-white w-full px-4 py-3 font-medium rounded-sm my-3" value='Get a Reset link'  />
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
