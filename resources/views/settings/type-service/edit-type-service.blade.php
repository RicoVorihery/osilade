@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Types Services
    <small>Gestion des Types Services</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
    		{!! Form::model($typeService, array('route' =>array('type-services.update',$typeService->id),'method'=>'PUT','id'=>'typeServiceForm')) !!}
	        <div class="box-header with-border">
	          <h3 class="box-title"> Editer Type Service {{$typeService->titre}} </h3>
	        </div>
	        <!-- /.box-header -->
	        
	        <div class="box-body">
	            <div class="row">
	              	<div class="col-md-6">
		                <div class="form-group {{ $errors->has('titre') ? 'has-error':'' }}">
		                  {!!Form::label('titre','Nom')!!}
		                  {!!Form::text('titre', null, ['class'=>'form-control', 'placeholder'=>'Entrer Titre'])!!}

		                  {!! $errors->first('titre','<small class="help-block">:message</small>')!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('description','Déscription')!!}
		                  {!!Form::text('description', null, ['class'=>'form-control', 'placeholder'=>'Entrer description'])!!}
		                </div>
	            	</div>
	            	<!-- ./col-md-6 -->

	            </div>
	            <!-- /.row -->
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('parametres/type-services') }}">Annuler</a>
	          {!!Form::submit('Valider',['class'=>'btn btn-primary'])!!}
	        </div>
	        <!-- /. box-footer -->
	    {!! Form::close() !!}
		</div>
		<!-- /.box -->
    </div>
    <!-- ./col-xs-12 -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection