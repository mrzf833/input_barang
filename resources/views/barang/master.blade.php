<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>
  <link rel="stylesheet" href={{ asset("assets/css/components.css")}}>
  <style>
    #semua_alert{
  width: 325px;
  position: fixed;
  top: 5px;
  left: 100%;
  transform: translateX(-100%);
  z-index: 100000;
}
</style>
  @yield('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src={{ asset("assets/img/avatar/avatar-1.png")}} class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      @include('barang.sidebar')
      
      <!-- Main Content -->
      <div id="semua_alert">
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
          <div class="alert_erorr" id="error{{ $loop->iteration }}">
            <div class="alert alert-danger lert row" role="alert">
            <div class="d-inline-block col-10">{{ $error }} !</div>
              <div class="ml-2 d-inline-block col-1">
                <button type="button" class="btn btn-danger clear_alert d-inline-block" style="padding: 0px 10px;"><i class="fas fa-times"></i></button>
              </div>
            </div>
          </div>
          @endforeach
        @endif
        @if (Session::has('error'))
        <div class="alert_erorr">
          <div class="alert alert-danger lert row" role="alert">
          <div class="d-inline-block col-10">{{ Session::get('error') }} dsasaddas!</div>
            <div class="ml-2 d-inline-block col-1">
              <button type="button" class="btn btn-danger clear_alert d-inline-block" style="padding: 0px 10px;"><i class="fas fa-times"></i></button>
            </div>
          </div>
        </div>
        @endif
        @if (Session::has('sukses'))
          <div class="alert_erorr">
            <div class="alert alert-success lert row" role="alert">
            <div class="d-inline-block col-10">{{ Session::get('sukses') }} !</div>
              <div class="ml-2 d-inline-block col-1">
                <button type="button" class="btn btn-success clear_alert d-inline-block" style="padding: 0px 10px;"><i class="fas fa-times"></i></button>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="main-content">
        <section class="section">
            @yield('content')
          </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src={{ asset("assets/js/stisla.js")}}></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Template JS File -->
  <script src={{ asset("assets/js/scripts.js")}}></script>
  <script src={{ asset("assets/js/custom.js")}}></script>
  <!-- Page Specific JS File -->
  <script src={{ asset("assets/js/page/index.js")}}></script>
  <script>
    $(document).ready(function(){
      $('.clear_alert').click(function(){
      var div_alert = $(this).closest('.alert_erorr');
      $(div_alert).hide(2000,function(){$(div_alert).remove()});
      });
    });
  </script>
    @yield('script')
</body>
</html>
