@extends('layouts.app')


@section('content')

<section>
    <div class="container py-2">
      <div class="row text-center justify-content-center">
          <h1 class="fw-bold fs-1 fs-md-2 tituloContactanos">
            Contáctanos
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
