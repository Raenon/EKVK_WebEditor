@extends('layouts.master')

@section('content')
  <section class="about-section">
    <div class="about-container">
    <!-- Bal oldal: Szöveges tartalom -->
    <div class="about-text">
      <h2><br><span>EKVK Accounting</span></h2>
      <p class="first">
      Az <b>Ekvk Accounting</b> egy innovatív könyvelői platform, amely megkönnyíti a mindennapi munkát könyvelőknek
      és vállalkozásoknak egyaránt.
      Tudjuk, hogy a mai világban az idő és a hatékonyság kulcsfontosságú, ezért hoztuk létre ezt a rendszert, ahol a
      dokumentumokhoz való hozzáférés nem korlátozódik többé egyetlen irodára vagy számítógépre.
      </p>
    </div>

    <!-- Jobb oldal: Kép -->
    <div class="about-image">
      <img src="{{asset('storage/img/1453916.jpg')}}" alt="Image">
    </div>

    <!-- Alsó szöveg -->
    <div class="about-description">
      <p class="second">
      Platformunk lehetővé teszi, hogy a cégek egyszerűen, néhány kattintással feltölthessék a számláikat,
      bizonylataikat, dokumentumaikat a könyvelők pedig valós időben hozzáférjenek ezekhez, akárhol is vannak éppen.
      Nincs többé elveszett számla, félreértett e-mail, vagy hosszadalmas papírmunka.
      <br>
      Felületünk könnyen kezelhető, biztonságos és átlátható, ahogy a könyvelésnek lennie kell.
      Legyen szó kisvállalkozásról vagy nagyobb cégről, rendszerünk skálázható megoldást kínál, amely alkalmazkodik a
      mindennapi működéshez.
      <br>
      Kapcsoljuk össze a könyvelőket és az ügyfeleket egyetlen, jól működő digitális térben.
      Tölts fel. Könyvelj. Készen vagy.
      </p>
    </div>
    </div>
  </section>
@endsection