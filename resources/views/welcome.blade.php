@extends('layouts.master')

@section('content')
  <!-- Videós háttér szekció -->
  <section class="video-background">
    <video autoplay muted loop id="bg-video">
    <source src="{{ asset('./storage/img/video4.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    <div class="content">
    <h2>Professzionális szövegszerkesztés</h2>
    <p>Bízza ránk a szavakat, hogy üzenete tisztán és hatásosan célba érjen.</p>
    <a href="/about" class="btn">Lépjen kapcsolatba velünk</a>
    </div>
  </section>

  <!-- Szolgáltatások szekció -->
  <section class="services">
    <div class="containersecond">
    <h3>Szolgáltatásaink</h3>
    <div class="service-list">
      <div class="service">
      <h4><strong>Szövegírás</strong></h4>
      <p>Minőségi, egyedi szövegek készítése weboldalakhoz, blogokhoz, kampányokhoz.</p>
      </div>
      <div class="service">
      <h4><strong>Lektorálás</strong></h4>
      <p>Nyelvtani és stilisztikai ellenőrzés, hogy szövege kifogástalan legyen.</p>
      </div>
      <div class="service">
      <h4><strong>Fordítás</strong></h4>
      <p>Professzionális fordítás magyar és idegen nyelvek között, szakmai tartalmakra specializálva.</p>
      </div>
      <div class="service">
      <h4><strong>Szerkesztés</strong></h4>
      <p>Szövegek szerkezeti és tartalmi átdolgozása, hogy még hatékonyabban kommunikáljon.</p>
      </div>
    </div>
    <br>
    </div>
    <br> 
  </section>

@endsection