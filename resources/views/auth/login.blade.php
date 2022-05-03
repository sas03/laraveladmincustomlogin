<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!--Link Bootstrap to this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          </a>
          <a class="py-2 d-none d-md-inline-block" href="/auth/login">Login</a>
        </div>
    </nav>

    <div class="container">
        <div class="row" style="margin-top: 205px">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4">
                <h4>Login | Custom Auth</h4>
                <form action="{{ route('auth.check') }}" method="post">
                    <!--To display error message on login page-->
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf 
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                    <br>
                    <a href="{{ route('auth.register') }}">I don't have an account, create new</a>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>