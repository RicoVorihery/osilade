@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Type Matériel {{$typeMateriel->titre}}
    <small>Gestion des Types Materiels</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$typeMateriel->titre}}</span> </h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td> <label> Nom</label> </td>
                  <td> {{$typeMateriel->titre}}</td>
                </tr>
                <tr>
                  <td> <label> Déscription</label> </td>
                  <td> {{$typeMateriel->description}}</td>
                </tr>

                
              </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="clearfix"></div>
          <div class="footer-menu">
            <a href="{{url('parametres/type-materiels')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('parametres/type-materiels/'.$typeMateriel->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
          </div>
        </div>
        <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col-xs-12 -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection