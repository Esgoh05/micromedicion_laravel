@extends('layouts.cambio')

@section('content')
<div class="container">
    <div class="container position-sticky z-index-sticky top-0">
        <!--<div class="col-md-8">-->
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
            <div class="card text-dark .bg-white  border-white mb-3" style="max-width: 18rem;">
                <!--<div class="card-header">{{ __('Login') }}</div> -->
                
                <div class="card-header bg-transparent  border-white pb-0 text-start">
                    <h4 class="font-weight-900">Inicio de sesión</h4>
                    <!--<p class="mb-0">Enter your email and password to sign in</p>-->
                </div>

                    <div class="card-body">
                    <form role="form" method="POST" action="/login">
                        <div class="flex flex-col mb-3">
                            <label for="email">{{ __('Correo electrónico') }}</label>
                        </div>
                        @csrf
                        @method('post')
                        <div class="flex flex-col mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" aria-label="Email">
                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>
                        <div class="flex flex-col mb-3">
                            <label for="password">{{ __('Contraseña') }}</label>
                        </div>
                        <div class="flex flex-col mb-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg" aria-label="Password" >
                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Recordarme</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" style="color:##0D47A1">Iniciar sesión</button>
                        </div>
                        </div>
                        <div class="card-footer text-center bg-transparent border-white pt-0 px-lg-2 px-1">
                            <p class="mb-1 text-sm mx-auto">
                                <a href="{{ route('password.request') }}" class="text-gradient font-weight-bold" style="color:#FFA726">¿Olvidaste tu contraseña?</a>
                            </p>
                        </div>
                        <!--<div class="card-footer text-center bg-transparent border-white pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Don't have an account?
                                <a href="/register" class="text-primary text-gradient font-weight-bold" style="color:##0D47A1">Sign up</a>
                            </p>
                        </div>-->
                    </div> 
                </form>
                <div
                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('../../assets/img/gota_welcome1.png');
                background-size: contain; background-repeat: no-repeat;">
                    <span class="mask bg-gradient-primary opacity-6"></span>
                    <!--<h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                        currency"</h4>
                        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                    <p class="text-white position-relative">The more effortless the writing looks, the more
                        effort the writer actually put into the process.</p> -->
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class=" container-fluid ">
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
