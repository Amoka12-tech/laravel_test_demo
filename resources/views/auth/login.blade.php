<x-welcome>
    <div class="container-fluid min-vh-100 mw-100" style="background: cornflowerblue">
      <div class="row justify-content-center min-vh-100 align-items-center align-content-center">
        <span class="mt-5 mb-2 text-light text-center">Welcome back!</span>
        <div class="row shadow-lg col-md-6 mx-auto form-container rounded p-5 mb-auto bg-light">
          <form method="POST" action="{{ route('login.auth') }}">
            @csrf
            @if (isset ($errors) && count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul class="list-unstyled mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
                
            @endif
            
            <div class="form-group mb-3">
              <label for="email">Email address</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="testemail@gmail.com">
              @if($errors->has('email'))
                <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
              @endif
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" value="" class="form-control" id="password">
              @if($errors->has('password'))
                <small id="passwordHelp" class="form-text text-danger">{{$errors->first('password')}}</small>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>  
  </x-welcome>
  
  