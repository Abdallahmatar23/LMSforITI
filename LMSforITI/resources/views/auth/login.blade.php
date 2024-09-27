<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Internal CSS -->
  <style>
    /* Feather Icons */
    @font-face {
      font-family: 'Feather';
      src: url('https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css');
    }
    /* Themify Icons */
    @font-face {
      font-family: 'Themify';
      src: url('https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.1.2/css/themify-icons.css');
    }
    /* Vendor CSS */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css');
    /* Custom CSS */
    .panel { display: none; }
    .auth-form-light {
      background: #fff;
      padding: 2rem;
      border-radius: 0.5rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }
    .brand-logo img {
      width: 100px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="https://via.placeholder.com/100" alt="logo">
              </div>

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error :</strong>{{Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @endif
              @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success :</strong>{{Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              @endif

              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <div class="form-group">
                <select class="form-control" id="sectionChooser">
                    <option value="" selected disabled>Select type of login</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
              </div>
              <div class="panel" id="admin">
                <h4>Sign in Admin</h4>
                <form class="pt-3" action="{{route('login.admin')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                </form>
              </div>
              <div class="panel" id="user">
                <h4>Sign in User</h4>
                <form class="pt-3" action="{{route('login.user')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Create an account? <a href="{{route('register.user')}}" class="text-primary">Register</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- Internal JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script>
    $('#sectionChooser').change(function(){
        var myID = $(this).val();
        $('.panel').each(function(){
            myID === $(this).attr('id') ? $(this).show() : $(this).hide();
        });
    });
  </script>
</body>

</html>
