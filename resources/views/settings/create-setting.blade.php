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
      {!! Form::open(['route' => 'parametres.store','id'=>'settingsForm']) !!}
            <div class="box-header with-border">
                <h3 class="box-title"> Ajout nouveau utilisateur </h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-4">
                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      {!!Form::label('name','Nom')!!}
                      {!!Form::text('name',null, ['class'=>'form-control'])!!}
                      {!! $errors->first('name','<small class="help-block">:message</small>')!!}
                  </div>

                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      {!!Form::label('name','Login')!!}
                      {!!Form::text('username',null, ['class'=>'form-control'])!!}
                      {!! $errors->first('username','<small class="help-block">:message</small>')!!}
                  </div>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      {!!Form::label('email','Email')!!}
                      {!!Form::email('email',null,['class'=>'form-control'])!!}
                  {!! $errors->first('email','<small class="help-block">:message</small>')!!}
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password">Mot de passe</label>
                      <input id="password" type="password" class="form-control" name="password" required>

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>

                  <div class="form-group">
                      <label for="password-confirm">Confirmer Mot de passe</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div> 
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