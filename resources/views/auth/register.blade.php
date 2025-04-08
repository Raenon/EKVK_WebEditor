@extends('layouts.authMaster')

@section('vite')
  @vite(["resources/css/register.css"])
@endsection

@section('content')


  <div class="container center">
    <div class="sign-up-form">
    <!-- Left (Form Image) -->
    <div class="form-image">
      <img src="{{asset('storage/img/1453916.jpg')}}" alt="" />
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
<<<<<<< HEAD
        <div class="input">
          <select id="choose" class="p-5">
            <option value="0" disabled selected>--Válaszd ki--</option>
            <option value="1">Cég</option>
            <option value="2">Magánszemély</option>
          </select>
        </div>
        <button type="submit">Regisztrálás</button>
=======
      </div>
      <button type="submit">Regisztrálás</button>
>>>>>>> Panka
      </div>
    </form>
    </div>
  </div>
@endsection