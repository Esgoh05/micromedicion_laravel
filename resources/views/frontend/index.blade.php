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
            <h1>
                <span>MicromediciónIoT </span>
                to Boost your Brand Name &amp; Sales
            </h1>
            <p>
                We offer an industry-driven and successful digital marketing strategy that helps our clients
                in achieving a strong online presence and maximum company profit.
            </p>
            <div>
                <a href="#" class="btn btn-slider">
                    Get Now
                </a>
            </div>
        </div>
    </div>
</div>

    <div class="carousel-item" data-bs-interval="2000">
      <img src="../assets/img/slider1.png" class="d-block w-100" alt="slider2">
      <div class="carousel-caption d-none d-md-block">
        <div class="custom-carousel-content">
            <h1>
                <span>Best Ecommerce Solutions 2 </span>
                to Boost your Brand Name &amp; Sales
            </h1>
            <p>
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
                  <span>Best Ecommerce Solutions 2 </span>
                  to Boost your Brand Name &amp; Sales
              </h1>
              <p>
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

<footer class="footer">
  <div class="container-fluid">
    <nav>
      <ul>
        <li>
          <p>Micromedición IoT</p>
        </li>
        <li>
          <a href="#">
            Acerca de Nosotros
          </a>
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