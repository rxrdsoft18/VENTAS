@extends('layouts.app')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
       <div class="card card-signup">
         <form class="form" method="POST" action="{{ route('login') }}" autocomplete="off">
           {{ csrf_field() }}
           <div class="header header-danger text-center">
             <h4>Iniciar Sesion</h4>
             <div class="social-line">
               <a href="#facebook" class="btn btn-simple btn-just-icon">
                 <i class="fa fa-facebook-square"></i>
               </a>
               <a href="#twitter" class="btn btn-simple btn-just-icon">
                 <i class="fa fa-twitter"></i>
               </a>
               <a href="#googleplus" class="btn btn-simple btn-just-icon">
                 <i class="fa fa-google-plus"></i>
               </a>
             </div>
           </div>
             <p class="text-divider"></p>
             <div class="content">

               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <div class="input-group">
                 <span class="input-group-addon">
                   <i class="material-icons">email</i>
                 </span>
                 <input id="email" type="text" class="form-control" placeholder="Email..." name="email" value="{{old('email')}}" required autofocus style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)">

                   @if ($errors->has('email'))
                     <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
                   </span>
                   @endif

               </div>
               </div>

               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <div class="input-group">
                 <span class="input-group-addon">
                   <i class="material-icons">lock_outline</i>
                 </span>
                 <input id="password" type="password" placeholder="Password..." class="form-control" name="password" required style="background-image: linear-gradient(#607D8B,#607D8B),linear-gradient(#d2d2d2,#d2d2d2)" />
                 @if ($errors->has('password'))
                   <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                   </span>
                 @endif
               </div>
               </div>
               <div class="form-group">
               <div class="checkbox">
                 <label>
                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                   Recordarme
                 </label>
               </div>
               </div>

             </div>
           <div class="footer text-center">
             <button type="submit" class="btn btn-danger">Login</button>
             <a class="btn btn-link" href="{{ route('password.request') }}">
               Olvidaste tu contraseña?
             </a>
           </div>
         </form>
                </div>
            </div>
        </div>
    </div>
@endsection
