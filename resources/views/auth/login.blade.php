@extends('layouts.authMaster')

@section('vite')
@vite(["resources/css/login.css"])
@endsection

@section('content')


   <div class="container center">
        <div class="sign-up-form">
          <!-- Right (Form Content) -->
          <form class="form-content" method="POST">
            @csrf
            <!-- Form Heading -->
            <div class="form-heading">
              <img src="{{asset('storage/img/android-chrome-512x512.png')}}" alt="" />
              <h1>Login</h1>
            </div>
            <!-- Input Wrap -->
            <div class="input-wrap">
              <div class="input">
                <input type="email" id="email" name="email" placeholder="Email" />
{{--                 <div class="label">
                  <label for="email">Email</label>
                </div> --}}
              </div>
              <div class="input">
                <input type="password" id="password" name="password" placeholder="Password" />
{{--                 <div class="label">
                  <label for="password">Password</label>
                </div> --}}
              </div>
              <button type="submit">Login</button>
            </div>
          </form>
        </div>
      </div>

      @endsection
