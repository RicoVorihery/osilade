@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow" style="margin-top: -40px;"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page introuvable.</h3>

            <p>
                La page que vous cherchez est introuvable.
                En attendant, vous pouvez <a href="{{url('/')}}">retourner à l'accueil</a>
            </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
</section>
@endsection




