@extends('layouts.authMaster')

@section('vite')
  @vite(["resources/css/forgotpsw.css"])
@endsection

@section('content')

  <div class="container">
    <div class="box">
    <img src="{{ asset('storage/img/logo.png') }}" alt="sample logo">
    <div class="input">
      <input type="email" id="email" name="email" placeholder="Email... " />
      <div class="label">
      </div>
    </div>
    <button class="btn-send" type="submit">Küldés</button>

    </div>
  </div>

@endsection