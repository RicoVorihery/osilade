@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Parc {{$parc->titre}}
    <small>Gestion des parcs</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$parc->ref_inventaire}}</span> </h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 25%"> <label> Réf. client</label> </td>
                  <td> {{$parc->client->ref_client}}</td>
                </tr>
                <tr>
                  <td> <label> Réf. Inventaire</label> </td>
                  <td> {{$parc->ref_inventaire}}</td>
                </tr>
                <tr>
                  <td> <label>Type Matériel</label> </td>
                  <td> {{$parc->typeMateriel->titre}}</td>
                </tr>
                <tr>
                  <td> <label>Info1</label> </td>
                  <td> {{$parc->info1}}</td>
                </tr>
                <tr>
                  <td> <label>IP01</label> </td>
                  <td> {{$parc->ip01}}</td>
                </tr>
                <tr>
                  <td> <label>IP02</label> </td>
                  <td> {{$parc->ip02}}</td>
                </tr>
                <tr>
                  <td> <label>IP03</label> </td>
                  <td> {{$parc->ip03}}</td>
                </tr>
                <tr>
                  <td> <label>IP04</label> </td>
                  <td> {{$parc->ip04}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 20%"> <label>Nom</label> </td>
                  <td> {{$parc->nom}}</td>
                </tr>
                <tr>
                  <td> <label>Login</label> </td>
                  <td> {{$parc->login}}</td>
                </tr>
                <tr>
                  <td> <label>Pass</label> </td>
                  <td> {{$parc->pass}}</td>
                </tr>
                <tr>
                  <td> <label>Id TV</label> </td>
                  <td> {{$parc->id_tv}}</td>
                </tr>
                <tr>
                  <td> <label>OS</label> </td>
                  <td> {{$parc->os}}</td>
                </tr>
                <tr>
                  <td> <label>Notes</label> </td>
                  <td> {{$parc->notes}}</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="clearfix"></div>
          <div class="footer-menu">
            <a href="{{url('parcs')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('parcs/'.$parc->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
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