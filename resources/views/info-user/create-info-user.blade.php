@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Infos Utilisateurs
    <small>Gestion des Infos Utilisateurs</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
	    {!! Form::open(['route' => 'info-users.store','id'=>'infoUserForm']) !!}

            <div class="box-header with-border">
                <h3 class="box-title"> Ajout nouvel Info Utilisateur</h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-5">
                    <div class="form-group client_div {{ $errors->has('id_client') ? 'has-error':'' }}">
                      {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                      {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                      
                      {!! $errors->first('id_client','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group {{ $errors->has('nom') ? 'has-error':'' }}">
                      {!!Form::label('nom','Nom')!!}
                      {!!Form::text('nom', null, ['class'=>'form-control'])!!}

                      {!! $errors->first('nom','<small class="help-block">:message</small>')!!}
                    </div>
                    <div class="form-group">
                      {!!Form::label('prenom','Prénom')!!}
                      {!!Form::text('prenom', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('service','Service')!!}
                      {!!Form::text('service', null, ['class'=>'form-control'])!!}                  
                    </div>

                    <div class="form-group {{ $errors->has('id_type_info') ? 'has-error':'' }}">
                      {!!Form::label('id_type_info','Type Info',['class'=>'ref_type_info'])!!}
                      {!!Form::select('id_type_info', ['' => ''] + $typeInfos->pluck('titre','id')->all(),null,['class'=>'form-control type-info-select no-clear']) !!}
                      
                      {!! $errors->first('id_type_info','<small class="help-block">:message</small>')!!}
                    </div>
                </div>

                <!-- ./col left -->
                <div class="col-md-5 second-col-60">
                    <div class="form-group">
                      {!!Form::label('login','Login')!!}
                      {!!Form::text('login', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('pass','Pass')!!}
                      {!!Form::text('pass', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('notes','Notes')!!}
                      {!!Form::textarea('notes', null, ['class'=>'form-control line10'])!!}                  
                    </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./body -->
            <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('info-users') }}">Annuler</a>
	          {!!Form::submit('Ajouter',['class'=>'btn btn-primary'])!!}
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