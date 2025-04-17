@extends('layouts.authMaster')

@section('vite')
  @vite(["resources/css/login.css"])
@endsection

@section('content')


  <div class="container center">
    <div class="sign-up-form">
    <button class="btn-back">
      <a href="{{ route('welcome') }}"><</a></button>
      <!-- Right (Form Content) -->
      <form class="form-content" method="POST">
        @csrf
        <!-- Form Heading -->
        <div class="form-heading">
        <img src="{{asset('storage/img/logo.png')}}" alt="">
        <h1>Bejelentkezés</h1>
        </div>
        <!-- Input Wrap -->
        <div class="input-wrap">
        <div class="input">
          <input type="email" id="email" name="email" placeholder="Email" />
          {{-- <div class="label">
          <label for="email">Email</label>
          </div> --}}
        </div>
        <div class="input">
          <input type="password" id="password" name="password" placeholder="Jelszó" />
          {{-- <div class="label">
          <label for="password">Password</label>
          </div> --}}
        </div>
        <p class="fhuj">Nincs még fiókod? <a class="podi" href="/register">Regisztáció</a>!</p>
        <p>Elfelejtettem a <a class="podi" href="/forgotpsw">jelszavamat</a>!</p>

        <button class="submit" type="submit">Bejelentkezés</button>
        </div>
      </form>
    </div>
  </div>

@endsection