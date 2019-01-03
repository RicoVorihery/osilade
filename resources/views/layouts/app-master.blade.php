<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Osilade') }}</title>
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('ionicons/2.0.0/css/ionicons.min.css')}}">
  <!-- select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/all.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.css')}}">
  <!-- bootstrap datetimepicker -->
  <!-- <link rel="stylesheet" href="{{asset('bower_resources/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"> -->

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/skins/skin-blue.min.css')}}">

  <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> -->
  <!-- <link href="{{asset('css/style.css')}}" rel="stylesheet"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid container-header">
          <div class="navbar-header row-fluid">
            <a href="{{url('/')}}" class="navbar-brand"> Osilade <b></b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- TOP NAVIGATION -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            @if(Auth::check())
            <ul class="nav navbar-nav">
              <li class="{{Request::is('/') ? 'active':''}}">
                <a href="{{url('/')}}">  Accueil </a>
              </li>
              
              <li class="{{Request::is('clients*') ? 'active':''}}">
                <a href="{{url('/clients')}}">Gestion Clients</a>
              </li>

              <li class="{{Request::is('references*') ? 'active':''}}">
                <a href="{{url('/references')}}">Références</a>
              </li>

              <li class="{{Request::is('parcs*') ? 'active':''}}">
                <a href="{{url('/parcs')}}">Parcs</a>
              </li>

              <li class="{{Request::is('info-users*') ? 'active':''}}">
                <a href="{{url('/info-users')}}">Infos utilisateurs</a>
              </li>

              <li class="{{Request::is('services*') ? 'active':''}}">
                <a href="{{url('/services')}}">Services</a>
              </li>

              <li class="{{Request::is('recherche*') ? 'active':''}}">
                <a href="{{url('/recherche')}}">Recherche</a>
              </li>

              <li class="dropdown {{Request::is('parametres*') ? 'active':''}}">
                <a href="{{url('/parametres')}}">Paramètres</a>
              </li>
              
            </ul>
            @endif
          </div>
          <!-- FIN TOP NAV -->
          <!-- Right Side Of Navbar -->
          <!-- <div class="navbar-custom-menu"> -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">S'enregistrer</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
          <!-- </div> -->
          <!-- ./login nav bar -->
        </div>
        <!-- ./container-fluid -->
      </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="tonda-container">
      <span id="current_path" style="display: none;">{{ Request::path() }}</span>
      <span style="display: none;" id="base_url">{{url('/')}}</span>

      @yield('content')

      <div class="inner-content-wrapper"></div>
      </div>
      <!-- ./container -->
    </div>
    <!-- /.content-wrapper -->
    @section('footer')
    <footer class="main-footer no-print">
      <div class="pull-right hidden-xs">
<!--         <b>Version</b> 1.0.0 -->
      </div>
      <strong>Copyright &copy; {{ date("Y")}} <a href="">Osilade</a>.</strong>
    </footer>
    @show

  </div>
  <!-- ./wrapper -->

@section('scripts')
  <!-- jQuery 2.2.3 -->
  <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <!-- JQuery UI 1.11.* -->
  <script src="{{asset('plugins/jQueryUI/jquery-ui.js')}}"></script>

  <!-- Bootstrap 3.3.6 -->
  <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
  <!-- select2 -->
  <script src="{{asset('plugins/select2/select2.full.js')}}"></script>
  <script src="{{asset('plugins/select2/i18n/fr.js')}}"></script>
  <!-- jquery DataTables -->
  <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>
  
  <!-- iCheck 1.0.1 -->
  <script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
  <!-- moment.js 2.18.1 -->
  <!-- <script src="{{asset('bower_resources/moment/min/moment.min.js')}}"></script> -->
  <!-- <script src="{{asset('bower_resources/moment/locale/fr.js')}}"></script> -->

  <!-- app -->
  <!-- <script src="{{asset('js/app.js')}}"></script> -->
  <!-- AdminLTE App -->
  <script src="{{asset('js/app-AdminLTE.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/demo-AdminLTE.js')}}"></script>
  <!-- resto manager js -->
  <script src="{{asset('js/my-app.js')}}"></script>

  <!-- Gulp compiled all.js file -->
  <script src="{{asset('js/all.js')}}"></script>
  
  <script type="text/javascript">
  
  //Popper.js Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  moment.updateLocale('fr', {
      week: { dow: 1 } // Monday is the first day of the week
    });

    //url de base
    var base_url = $("#base_url").text();

  
  //Select 2 js pour tous les select box
    var selectBox = $("select").not("dataTables_length.select");
    selectBox.select2({
      placeholder:"selectionnez un...",
      allowClear: true,
      language : "fr",
      width: '100%' 
    });

    $('.no-clear').select2({
      placeholder:"selectionnez un...",
      allowClear: false,
      language : "fr",
      width: '100%' 
    });

    var createSelect = function(name){
      $(name).select2({
          placeholder:"selectionnez un...",
          allowClear: false,
          language: 'fr',
          width: '100%' 
        });
    }

    var createSelect2 = function(name){
      $(name).select2({
        placeholder:"selectionnez un...",
        allowClear: true,
        language :"fr",
        width: '100%' 
      }).on('select2:unselecting', function() {
            $(this).data('unselecting', true);
          }).on('select2:opening', function(e) {
            if ($(this).data('unselecting')) {
              $(this).removeData('unselecting');
              e.preventDefault();
            }
          });
    }

  </script>
@show
</body>
</html>
