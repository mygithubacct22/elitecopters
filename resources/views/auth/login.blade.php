
 @extends('layouts.adminsb1')

@section('content')
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4"> WELCOME TO ELITECOPTERS!</h3>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-label-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                   <div class="col-md-6">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                </div>

                <div class="form-label-group">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  <label for="inputPassword">{{ __('Password') }}</label>
                  <div class="col-md-6">
                               

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">{{ __('LOG IN') }}</button>
                
              </form>
              <a href="/register" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="btn-block">{{ __('REGISTER AN ACCOUNT') }}</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


