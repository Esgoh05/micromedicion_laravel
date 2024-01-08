@extends('layouts.app')

@section('title', 'Bienvenido a Micromedición IoT')

@section('content')
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="../assets/img/gotita_running.png" class="d-block w-100" alt="slider1">
      <div class="carousel-caption d-none d-md-block">
        <div class="custom-carousel-content">
            <h1 class="tituloSlider1">
                <span>MicromediciónIoT: </span>
                Transformando Datos en Conciencia.
            </h1>
            <p class="parrafoSlider1">
                En MicromediciónIoT, creemos en la revolución de la micromedición para impulsar una gestión
                sostenible del agua. Al medir con precisión el consumo...  
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Ir Ahora
                </a>
            </div>
        </div>
    </div>
</div>

    <div class="carousel-item" data-bs-interval="2000">
      <img src="../assets/img/slider1.png" class="d-block w-100" alt="slider2">
      <div class="carousel-caption d-none d-md-block">
        <div class="custom-carousel-content">
            <h1 class="tituloSlider2">
                <span>MicromedicionIoT: </span>
                Cuidar el agua es ahora imperativo.
            </h1>
            <p class="parrafoSlider2">
                We offer an industry-driven and successful digital marketing strategy that helps our clients
                in achieving a strong online presence and maximum company profit.
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Ir Ahora
                </a>
            </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <img src="../assets/img/slider2.png" class="d-block w-100" alt="slider3">
      <div class="carousel-caption d-none d-md-block">
          <div class="custom-carousel-content">
              <h1>
                  <span>MicromedicionIoT: </span>
                  Cuidar el agua es ahora imperativo.
              </h1>
              <p>
                  El aumento exponencial del consumo de agua  nos enfrenta a una encrucijada crítica.
                  En MicromedicionIoT, abrazamos la verdad cruda...
              </p>
              <div>
                  <a href="#" class="btn btn-slider">
                      Ir Ahora
                  </a>
              </div>
          </div>
      </div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previo</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<section>
  <div class="container py-2">
    <div class="row text-center justify-content-center">
        <h1 class="fw-bold fs-1 fs-md-2 tituloContactanos">
          Contactanos
        </h1>
        
          <h3 class="subtituloContactanos">
            ¡Estamos aquí para ayudarte!
          </h3>
          <a href="mailto:micromedicion.iot@gmail.com" class="correoMicromedicion">
            <i class="bi bi-envelope"></i>
            micromedicion.iot@gmail.com
          </a>
          <i class="bi bi-geo-alt"></i>
          <p class="contenidoDireccion">
            Ecatepec, Edo. Mex.
          </p>
        
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container-fluid">
    <nav>
      <ul>
        <li>
          <p>Micromedición IoT</p>
        </li>
      </ul>
    </nav>
    <div class="copyright" id="copyright">
      &copy; <script>
        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
      </script>, Diseñado y Programado por Micromedición IoT
    </div>
  </div>
</footer>


@endsection

@section('scripts')
  <script>    
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel)
  </script>

@endsection