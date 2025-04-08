@extends('layouts.master')

@section('content')
  <!-- Videós háttér szekció -->
  <section class="video-background">
    <video autoplay muted loop id="bg-video">
    <source src="{{ asset('./storage/img/video4.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    <div class="content">
    <h2>Professzionális könyvelés</h2>
    <p>Bízza ránk a számokat, hogy Ön a növekedésre koncentrálhasson.</p>
    <a href="/about" class="btn">Lépjen kapcsolatba velünk</a>
    </div>
  </section>

  <!-- Szolgáltatások szekció -->
  <section class="services">
    <div class="containersecond">
    <h3>Szolgáltatásaink</h3>
    <div class="service-list">
      <div class="service">
      <h4><strong>Könyvelés</strong></h4>
      <p>Teljes körű könyvelési szolgáltatás cégeknek és egyéni vállalkozóknak.</p>
      </div>
      <div class="service">
      <h4><strong>Bérszámfejtés</strong></h4>
      <p>Precíz és megbízható bérszámfejtési szolgáltatások.</p>
      </div>
      <div class="service">
      <h4><strong>Tanácsadás</strong></h4>
      <p>Adózási és pénzügyi tanácsadás egy helyen.</p>
      </div>
    </div>
    </div>
  </section>

@endsection