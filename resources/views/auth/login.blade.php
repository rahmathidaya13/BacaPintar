@section('title', 'Baca Pintar')
@include('template.header')
<div class="container py-4">
    <div class="row justify-content-center ">
        <div class="col-md-4">

            @if ($errors->has('error'))
                <div  class="alert alert-warning" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('error') }}</strong>
                </div>
            @endif
            <div class="login-box mx-auto">
                <div class="login-logo">
                    <a href="#"><b>BacaPintar</b></a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="username" id="username"
                                    class="form-control @error('username')
                                    is-invalid
                                @enderror"
                                    placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-alt"></span>
                                    </div>
                                </div>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span id="show_pass" class="fas fa-eye"></span>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </form>



                        <div class="mt-3 text-center">
                            <p class="mb-0">
                                <a href="forgot-password.html">I forgot my password</a>
                            </p>
                            <p class="mb-0">
                                <a href="register.html" class="text-center">Register a new membership</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
