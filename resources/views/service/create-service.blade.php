@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Services
    <small>Gestion des services</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
	    {!! Form::open(['route' => 'services.store','id'=>'serviceForm']) !!}

            <div class="box-header with-border">
                <h3 class="box-title"> Ajout nouveau service</h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-5">
                    <div class="form-group client_div {{ $errors->has('id_client') ? 'has-error':'' }}">
                      {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                      {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                      
                      {!! $errors->first('id_client','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group {{ $errors->has('titre') ? 'has-error':'' }}">
                      {!!Form::label('titre','Titre du service')!!}
                      {!!Form::text('titre', null, ['class'=>'form-control'])!!}

                      {!! $errors->first('titre','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group">
                      {!!Form::label('service','Service')!!}
                      {!!Form::textarea('service', null, ['class'=>'form-control line10'])!!}                  
                    </div>
                </div>
                <!-- ./col left -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./body -->
            <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('services') }}">Annuler</a>
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