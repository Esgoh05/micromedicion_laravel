@extends('layouts.app')


@section('content')

<section>
  <div class="container py-3">
    <div class="row text-center justify-content-center">  
      <h1 class="fw-bold fs-1 fs-md-2 tituloAcercaDe">
        Acerca de nosostros
      </h1>
      <div class="contenedorAcercaDe hstack gap-2">
        <div>
          <img src="../assets/img/holaAcercaDe.png" alt="" id="saludoImg">
        </div>
        <div>
          <p id="acercaDeTexto">
            En esencia, somos impulsores del cambio y defensores de la cuantificación. 
            Creemos en la visualización del uso de recursos para fomentar la conciencia y guiar decisiones efectivas.
            Con el poder del Internet de las Cosas (IoT) y la micromedición, diseñamos tecnología innovadora. 
            Nos dedicamos a mejorar el monitoreo y control en los ámbitos de la domótica e inmótica, creando soluciones que definen el mañana.
            Somos más que tecnología; somos agentes de transformación.
          </p>
        </div>
      </div>
      <div class="contenedorVision hstack gap-2">
        <div class="p-2">
          <h3 class="fw-bold fs-1 fs-md-2 tituloMision">Nuestra misión:</h3>
        </div>
        <div class="textoMision p-2">
          <p id="parrafoMision">Ofrecer tecnología de vanguardia, especializada en productos de automatización aplicados a casas e inmuebles inteligentes,
             que cumplan con altos estándares de seguridad, mediante el empleo de tecnologías de la información.
          </p>
        </div>
      </div>
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

@endsection
