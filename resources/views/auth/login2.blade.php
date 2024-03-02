@extends('layouts.cambio')

@section('content')
<section>

    <img src="../../assets/img/gota_welcome1.png" alt="" id="imgWelcome">

    <div class="contenedor">
        <h2>Inicio de sesión</h2>
        <form id="loginForm" name="loginForm" method="post">
            @csrf
            @method('post')
          <div class="elemento">
            <label for="emailUsuario">{{ __('Correo electrónico') }}</label>
            <input type="email" id="emailUsuario" name="emailUsuario" required="true"/>
            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
          </div>
          <div class="elemento">
            <label for="passwordUsuario">{{ __('Contraseña') }}</label>
            <div class="password-container hstack gap-2">
              <input type="password" class="" id="passwordUsuario" name="passwordUsuario" required="true" value="secret"/>
              @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
              <button type="button" class="btn btn-primary" id="btnOcultarPassword">
                <i class="bi bi-eye-fill"></i>
              </button>
            </div>
          </div>
          <div class="elemento">
            <button type="submit" id="btnLogin">Iniciar sesion</button>
          </div>
          <div class="elemento">
            <p class="mb-1 text-sm mx-auto">
                <a href="{{ route('password.request') }}" id="olvidarPassword">¿Olvidaste tu contraseña?</a>
            </p>
          </div>
        </form>
    </div>
</section>

<footer class="footer">
    <div class=" container-fluid ">
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