@extends('layouts.guest')
@section('title', 'Login')
@section('content')
<section class="login-content">
   <div class="row m-0 align-items-center bg-white vh-100">            
      <div class="col-md-6">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                  <div class="card-body z-3 px-md-0 px-lg-4">
                     <h2 class="mb-2 text-center">Sign In</h2>
                     <p class="text-center">Login to stay connected.</p>
                     <form action="{{ route('login') }}" method="POST">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">Username atau Password Salah!</div>
                    @endif

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>

                    <p class="mt-3 text-center">
                           Tidak punya akun? <a href="{{ route('register') }}" class="text-underline">Sign Up</a>
                    </p>
                </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
         <img src="{{ asset('build/assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
      </div>
   </div>
</section>
@endsection