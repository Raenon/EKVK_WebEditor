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
      </div>
      <div class="input">
        <select name="userType" id="choose" class="select-input" placeholder=" ">
        <option value="0" disabled selected>--Válaszd ki--</option>
        <option value="1">Cég</option>
        <option value="2">Magánszemély</option>
        </select>
        <div class="label">
        <label for="choose">Felhasználó Típus*</label>
        </div>
      </div>

      <!-- Company fields (initially hidden) -->
      <!-- Company Name -->
      <div class="input" id="company-details" style="display: none;">
        <input type="text" name="company_name" id="companyName" placeholder=" " />
        <div class="label-text">
        <label for="companyName">Cég Neve*</label>
        </div>
      </div>

      <!-- Tax Number -->
      <div class="input" id="company-tax" style="display: none;">
        <input type="text" name="tax_number" id="taxNumber" placeholder=" " />
        <div class="label-text">
        <label for="taxNumber">Adószám*</label>
        </div>
      </div>

      <button type="submit">Regisztrálás</button>
      </div>
    </form>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const choose = document.getElementById("choose");
    const companyDetails = document.getElementById("company-details");
    const companyTax = document.getElementById("company-tax");

    choose.addEventListener("change", function () {
      if (choose.value === "1") {
      companyDetails.style.display = "block";
      companyTax.style.display = "block";
      } else {
      companyDetails.style.display = "none";
      companyTax.style.display = "none";
      }
    });
    });
  </script>
@endsection