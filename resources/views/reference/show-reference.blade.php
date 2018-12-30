@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Service {{$reference->titre}}
    <small>Gestion des references</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$reference->titre}}</span> </h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 30%"> <label> Réf. client</label> </td>
                  <td> {{$reference->client->ref_client}}</td>
                </tr>
                <tr>
                  <td> <label> Titre Référence</label> </td>
                  <td> {{$reference->titre}}</td>
                </tr>
                <tr>
                  <td><label>Référence </label></td>
                  <td> {{$reference->reference}} </td>
                </tr>
                <tr>
                  <td><label>Fichiers joints</label></td>
                  <td>
                    @if($reference->file01!=null)
                      <i class="fa fa-paperclip"></i> {{$reference->file01}} <br>
                    @endif
                    @if($reference->file02!=null)
                      <i class="fa fa-paperclip"></i> {{$reference->file02}} <br>
                    @endif
                    @if($reference->file03!=null)
                      <i class="fa fa-paperclip"></i> {{$reference->file03}} <br>
                    @endif
                    @if($reference->file04!=null)
                      <i class="fa fa-paperclip"></i> {{$reference->file04}}
                    @endif
                  </td>
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
            <a href="{{url('references')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('references/'.$reference->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
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