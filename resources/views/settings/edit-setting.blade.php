@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Permissions et Utilisateurs
    <small>Gestion des utilisateurs</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
        {!! Form::model($userPermission, array('route' =>array('parametres.update',$userPermission->id),'method'=>'PUT','id'=>'userPermissionForm')) !!}
            <div class="box-header with-border">
                <h3 class="box-title"> Editer Permission {{$userPermission->user->name}} </h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-5">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td style="width: 25%"> <label> Utilisateur</label></td>
                        <td> 
                              {!!Form::text('name',$userPermission->user->name, ['class'=>'form-control'])!!}
                            </div>
                         </td>
                      </tr>
                      <tr>
                        <td><label>Login</label></td>
                        <td>
                          {!!Form::text('username', $userPermission->user->username, ['class'=>'form-control'])!!}
                         </td>
                      </tr>
                      <tr>
                        <td><label>Mot de passe</label></td>
                        <td>
                          {!!Form::text('password', $userPermission->user->password_visible, ['class'=>'form-control'])!!}
                         </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('modif_client', 0) !!}
                      {!!Form::checkbox('modif_client',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('modif_client','Modif Client',['class'=>'checkbox-label'])!!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('modif_reference', 0) !!}
                      {!!Form::checkbox('modif_reference',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('modif_reference','Modif Réference',['class'=>'checkbox-label'])!!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('modif_parc', 0) !!}
                      {!!Form::checkbox('modif_parc',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('modif_parc','Modif Parc',['class'=>'checkbox-label'])!!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('modif_user', 0) !!}
                      {!!Form::checkbox('modif_user',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('modif_user','Modif Utilisateur',['class'=>'checkbox-label'])!!}
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('modif_service', 0) !!}
                      {!!Form::checkbox('modif_service',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('modif_service','Modif Service',['class'=>'checkbox-label'])!!}
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::hidden('is_admin', 0) !!}
                      {!!Form::checkbox('is_admin',1,null,['class'=>'form-control flat-green'])!!}
                    {!!Form::label('is_admin','Paramètrages',['class'=>'checkbox-label'])!!}
                    </div>
                </div>
                
              </div>
              <!-- /.row -->
            </div>
            <!-- ./body -->
            <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('parametres') }}">Annuler</a>
	          {!!Form::submit('Valider',['class'=>'btn btn-primary'])!!}
	        </div>
	        <!-- /. box-footer -->
          {!! Form::close() !!}

        </div>
          <!-- /.box form -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
@parent
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
@endsection