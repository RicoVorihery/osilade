@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Client {{$client->ref_client}}
    <small>Gestion des clients</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$client->ref_client}}</span> </h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td> <label> Réf. client</label> </td>
                  <td> {{$client->ref_client}}</td>
                </tr>
                <tr>
                  <td> <label> Nom Société</label> </td>
                  <td> {{$client->nom_societe}}</td>
                </tr>

                <tr>
                  <td> <label> Adresse </label></td>
                  <td> {{$client->adresse}}</td>
                </tr>

                <tr>
                  <td> <label> Ville </label></td>
                  <td> {{$client->ville}}</td>
                </tr>

                <tr>
                  <td> <label> Code Postal</label> </td>
                  <td> {{$client->code_postal}}</td>
                </tr>

                <tr>
                  <td> <label> Tel. Principal </label> </td>
                  <td> {{$client->tel_principal}}</td>
                </tr>

                <tr>
                  <td> <label> Contact 01</label> </td>
                  <td> {{$client->contact1}}</td>
                </tr>

                <tr>
                  <td> <label> Tél 01 </label></td>
                  <td> {{$client->tel1}}</td>
                </tr>

                <tr>
                  <td> <label> Mail 01</label> </td>
                  <td> {{$client->mail1}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->

          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 20%"> <label> Contact 02</label> </td>
                  <td> {{$client->contact2}}</td>
                </tr>

                <tr>
                  <td> <label> Tél 02</label> </td>
                  <td> {{$client->tel2}}</td>
                </tr>

                <tr>
                  <td><label> Mail 02</label> </td>
                  <td> {{$client->mail2}}</td>
                </tr>
                <tr>
                  <td> <label> Contact 03 </label></td>
                  <td> {{$client->contact3}}</td>
                </tr>

                <tr>
                  <td> <label> Tél 03</label> </td>
                  <td> {{$client->tel3}}</td>
                </tr>

                <tr>
                  <td> <label> Mail 02</label> </td>
                  <td> {{$client->mail3}}</td>
                </tr>

                <tr>
                  <td><label> Notes</label></td>
                  <td> {{$client->notes}} </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="clearfix"></div>
          <div class="footer-menu">
            <a href="{{url('clients')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('clients/'.$client->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
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