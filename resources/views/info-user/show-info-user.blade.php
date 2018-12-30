@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Info utilisateur {{$infoUser->nom}}
    <small>Gestion des Info Utilisateurs</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$infoUser->nom}}</span> </h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 25%"> <label> Réf. client</label> </td>
                  <td> {{$infoUser->client->ref_client}}</td>
                </tr>
                <tr>
                  <td> <label> Nom</label> </td>
                  <td> {{$infoUser->nom}}</td>
                </tr>
                <tr>
                  <td> <label>Prénom</label> </td>
                  <td> {{$infoUser->prenom}}</td>
                </tr>
                <tr>
                  <td> <label>Service</label> </td>
                  <td> {{$infoUser->service}}</td>
                </tr>
                <tr>
                  <td> <label>Type Info</label> </td>
                  <td> {{$infoUser->typeInfo->titre}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr style="width: 20%">
                  <td> <label>Login</label> </td>
                  <td> {{$infoUser->login}}</td>
                </tr>
                <tr>
                  <td> <label>Pass</label> </td>
                  <td> {{$infoUser->pass}}</td>
                </tr>
                <tr>
                  <td> <label>Notes</label> </td>
                  <td> {{$infoUser->notes}}</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="clearfix"></div>
          <div class="footer-menu">
            <a href="{{url('info-users')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('info-users/'.$infoUser->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
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