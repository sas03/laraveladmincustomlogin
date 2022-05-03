<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Settings</title>
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
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4>Admin Settings</h4><hr>
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $LoggedUserInfo['name'] }}</td>
                            <td>{{ $LoggedUserInfo['email'] }}</td>
                            <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                        </tr>
                    </tbody>
                </table>

                <ul>
                    <li><a href="/admin/dashboard">Dashboard</a></li>
                    <li><a href="/admin/profile">Profile</a></li>
                    <li><a href="/admin/settings">Settings</a></li>
                    <li><a href="/admin/staff">Staff</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>