@extends('layouts.guest')
@section('content')
<section class="login-content">
   <div class="row m-0 align-items-center bg-white h-100">            
      <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
         <img src="{{ asset('build/assets/images/auth/05.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
      </div>
      <div class="col-md-6">               
         <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                  <div class="card-body">
                     <h2 class="mb-2 text-center">Sign Up</h2>
                     <p class="text-center">Create your account.</p>
                     <form action="{{ route('register') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-label">Nama Lengkap</label>
                                 <input type="text" name="nama_lengkap" class="form-control" required>

                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label class="form-label">Username</label>
                                 <input type="text" name="username" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Password</label>
                                 <input type="password" name="password" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label class="form-label">Confirm Password</label>
                                 <input type="password" name="password_confirmation" class="form-control" required>
                              </div>
                           </div>
                        </div>
                        <div class="d-flex justify-content-center">
                           <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                        <p class="mt-3 text-center">
                           Already have an Account? <a href="{{ route('login') }}" class="text-underline">Sign In</a>
                        </p>
                     </form>
                  </div>
               </div>    
            </div>
         </div>           
      </div>   
   </div>
</section>
@endsection