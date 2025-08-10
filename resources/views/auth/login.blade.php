@extends('layouts.cambio')

@section('content')
<section>
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
                <p class="mb-1 text-sm mx-auto">
                    <a href="{{ route('password.request') }}" id="olvidarPassword">¿Olvidaste tu contraseña?</a>
                </p>
            </div>
        </form>
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
