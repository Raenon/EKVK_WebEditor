@extends('layouts.master')

@section('content')
  <!--<img src="{{ asset('storage/img/profilplaceholder.jpg') }}" alt=""> -->
  <div class="wrapper">
    <div class="user-card">
    <div class="user-card-img">
      <img src="{{ asset('storage/img/img_avatar.png') }}" alt="">
    </div>
    <div class="user-card-info">
      <h2>Busai Patrik Márk</h2>
      <p><span>Email:</span> busaipatrikmark@elg-bp.edu.hu</p>
      <p><span>Location:</span> Budapest, Hungary</p>
      <p><span>Occupation:</span> Web Developer</p>
      <p><span>About me:</span> 21 years old
      <p>
    </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="user-card">
    <div class="user-card-img">
      <img src="{{ asset('storage/img/img_avatar.png') }}" alt="">
    </div>
    <div class="user-card-info">
      <h2>Boda Kristóf</h2>
      <p><span>Email:</span> bodakristof@elg-bp.edu.hu</p>
      <p><span>Location:</span> Budapest, Hungary</p>
      <p><span>Occupation:</span> Web Developer</p>
      <p><span>About me:</span> 21 years old
      <p>
    </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="user-card">
    <div class="user-card-img">
      <img src="{{ asset('storage/img/img_avatar2.png') }}" alt="">
    </div>
    <div class="user-card-info">
      <h2>Konorót Kíra Panka</h2>
      <p><span>Email:</span> konorotkirapanka@elg-bp.edu.hu</p>
      <p><span>Location:</span> Budapest, Hungary</p>
      <p><span>Occupation:</span> Web Developer</p>
      <p><span>About me:</span> 20 years old
      <p>
    </div>
    </div>
    <div class="helper">
    <p></p>
    </div>
  </div>

@endsection