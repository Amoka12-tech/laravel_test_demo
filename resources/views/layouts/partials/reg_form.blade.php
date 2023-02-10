<div class="row justify-content-center align-items-center align-content-center">
  <h2 class="mt-5 mb-2 text-primary text-center" style="color: cornflowerblue">Add User Account</h2>
  <div class="row shadow-lg col-md-6 mx-auto form-container rounded p-2 mb-auto bg-light">
    <form method="POST" action="{{ route('register.create_user') }}">
      @csrf
      @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              {{ session('success') }}
              <a  data-bs-toggle="modal" data-bs-target="#reg-modal">Close</a>
          </div>
        @endif
      <div class="form-group mb-3">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter full name">
        @if($errors->has('name'))
          <small id="nameHelp" class="form-text text-danger">{{$errors->first('name')}}</small>
        @endif
      </div>
      <div class="form-group mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control" placeholder="Enter full name">
        @if($errors->has('username'))
          <small id="usernameHelp" class="form-text text-danger">{{$errors->first('username')}}</small>
        @endif
      </div>
      <div class="form-group mb-3">
        <label for="email">Email address</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="testemail@gmail.com">
        @if($errors->has('email'))
          <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
        @endif
      </div>
      <div class="form-group mb-3">
        <label for="phone">Contact Number</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" placeholder="+2348034329120">
        @if($errors->has('phone'))
          <small id="phoneHelp" class="form-text text-danger">{{$errors->first('phone')}}</small>
        @endif
      </div>
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @if($errors->has('password'))
          <small id="passwordHelp" class="form-text text-danger">{{$errors->first('password')}}</small>
        @endif
      </div>
      <div class="form-group mb-3">
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" class="form-control" id="cpassword">
        @if($errors->has('cpassword'))
          <small id="cpasswordHelp" class="form-text text-danger">The confirm password and password must match.</small>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</div>