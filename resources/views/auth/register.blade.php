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
    <form class="form-content">
      <!-- Form Heading -->
      <div class="form-heading">
        <h1>Fiók Létrehozás</h1>
        <p>Kérjük, töltse ki az összes szükséges mezőt a fiók létrehozásához!</p>
      </div>
      <!-- Input Wrap -->
      <div class="input-wrap">
        <div class="input">
          <input type="text" id="username" placeholder=" " />
          <div class="label">
            <label for="username">Felhasználó Név*</label>
          </div>
        </div>
        <div class="input">
          <input type="email" id="email" placeholder=" " />
          <div class="label">
            <label for="email">Email*</label>
          </div>
        </div>
        <div class="input">
          <input type="password" id="password" placeholder=" " />
          <div class="label">
            <label for="password">Jelszó*</label>
          </div>
        </div>
        <div class="input">
          <input type="password" id="confirmPassword" placeholder=" " />
          <div class="label">
            <label for="confirmPassword">Jelszó Megerősítése*</label>
          </div>
        </div>
        <div class="input">
          <select name="choose" id="choose" class="p-5">
            <option value="" disabled selected>--Válaszd ki--</option>
            <option value="company">Cég</option>
            <option value="privateuser">Magánszemély</option>
          </select>
        </div>
        <button type="submit">Regisztrálás</button>
      </div>
    </form>
  </div>
</div>

@endsection
