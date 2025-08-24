@extends('layouts.app')

@section('title', 'Bienvenido a Micromedición IoT')

@section('content')
<section class="principal">
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
            <h1 class="titulo1">
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

{{-- <section id="inicio">
  {{-- carrusel aquí --}}
{{-- </section> --}}


{{-- <section id="login" class="py-5 bg-light"> --}}
<section id="login">
  <div class="container">
    <div class="contenedor">
      <img src="../../assets/img/gota_welcome1.png" alt="Gota bienvenida" id="imgWelcome">
      <h2>Inicio de sesión</h2>
      <form id="loginForm" method="post">
          @csrf
          @method('post')
          <div class="elemento">
              <label for="emailUsuario">Correo electrónico</label>
              <input type="email" id="emailUsuario" name="emailUsuario" required />
              @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
          </div>
          <div class="elemento">
              <label for="passwordUsuario">Contraseña</label>
              <div class="password-container hstack gap-2">
                  <input type="password" id="passwordUsuario" name="passwordUsuario" required />
                  <button type="button" class="btn btn-primary" id="btnOcultarPassword">
                      <i class="bi bi-eye-fill"></i>
                  </button>
              </div>
              @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
          </div>
          <div class="elemento">
              <button type="submit" id="btnLogin">Iniciar sesión</button>
          </div>
          <div class="elemento">
              <p>
                  <a href="{{ route('password.request') }}" id="olvidarPassword">¿Olvidaste tu contraseña?</a>
              </p>
          </div>
      </form>
  </div>
  
  </div>
</section>

<section id="nosotros">
  <div class="nosotros-content">
    
    <!-- Columna de texto -->
    <div class="nosotros-texto">
      <h2>Nosotros</h2>
      <p>
        En esencia, somos impulsores del cambio y defensores de la <span>cuantificación</span>. 
        Creemos en la visualización del uso de recursos para fomentar la conciencia y guiar decisiones efectivas.
        Con el poder del <span>Internet de las Cosas (IoT)</span> y la <span>micromedición</span>, diseñamos tecnología innovadora. 
        Nos dedicamos a mejorar el monitoreo y control en los ámbitos de la domótica e inmótica, creando soluciones que definen el mañana.
        Somos más que tecnología; somos agentes de transformación.
      </p>
    </div>

    <!-- Columna de imagen -->
    <div class="nosotros-imagen">
      <img src="../assets/img/gotita_acercade.png" alt="Gotita acerca de">
    </div>
  </div>
</section>


<section id="contacto">
  <div class="container">
    <h2>Contáctanos</h2>
    {{-- <h3>¡Estamos aquí para ayudarte!</h3> --}}
    <div class="info-container">
      <div class="info-item">
        <a href="mailto:micromedicion.iot@gmail.com" class="correoMicromedicion">
          <i class="bi bi-envelope"></i>
          micromedicion.iot@gmail.com
        </a>
      </div>
      <div class="info-item">
        <i class="bi bi-geo-alt"></i>
        <p class="contenidoDireccion">
          Ecatepec de Morelos, Edo. Mex.
        </p>
      </div>
    </div>
    <div style="width: 100%; height: 400px;">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3758.6509445927804!2d-99.05974162661464!3d19.599449435334847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f1a0e36c7789%3A0xadd45ab593347fab!2sCentro%20Universitario%20UAEM%20Ecatepec!5e0!3m2!1ses!2smx!4v1755385772107!5m2!1ses!2smx" 
          width="100%" 
          height="100%" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div> 
  </div>
</section>


<footer class="footer">
  <div class="container-fluid">
    <nav>
      <ul>
        <li>
          <p id="micromedicioniot">Micromedición IoT</p>
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
</section>

@endsection

@section('scripts')
  <script>    
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel)
  </script>

@endsection