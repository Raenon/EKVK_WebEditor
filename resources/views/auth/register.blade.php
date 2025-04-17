@extends('layouts.authMaster')

@section('vite')
  @vite(["resources/css/register.css"])
@endsection

@section('content')


  <div class="container center">
    <div class="sign-up-form">
    <!-- Left (Form Image) -->
    <div class="form-image">
      <img src="{{ asset('storage/img/1453916.jpg') }}" alt="" style="display: block;" />
      <button class="btn-back">
      <a href="{{ route('welcome') }}" style="text-decoration: none; color: black;">&lt;</a>
      </button>
    </div>
    <!-- Right (Form Content) -->
    <form class="form-content" method="POST">
      @csrf
      <!-- Form Heading -->
      <div class="form-heading">
      <h1>Fiók Létrehozás</h1>
      <p>Kérjük, töltse ki az összes szükséges mezőt a fiók létrehozásához!</p>
      </div>
      <!-- Input Wrap -->
      <div class="input-wrap">
      <div class="input">
        <input type="text" id="username" name="username" placeholder=" " />
        <div class="label">
        <label for="username">Felhasználó Név*</label>
        </div>
      </div>
      <div class="input">
        <input type="email" id="email" name="email" placeholder=" " />
        <div class="label">
        <label for="email">Email*</label>
        </div>
      </div>
      <div class="input">
        <input type="password" id="password" name="password" placeholder=" " />
        <div class="label">
        <label for="password">Jelszó*</label>
        </div>
      </div>
      <div class="input">
        <input type="password" id="confirmPassword" name="password_confirmation" placeholder=" " />
        <div class="label">
        <label for="confirmPassword">Jelszó Megerősítése*</label>
        </div>
      </div>
      <p class="fhuj">Van már fiókod? <a class="podi" href="/login">Bejelentkezés</a>!</p>
      <button class="mt-5" type="submit">Regisztrálás</button>
      </div>
    </form>
    </div>
  </div>
@endsection