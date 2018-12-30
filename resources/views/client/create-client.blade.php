@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Clients
    <small>Gestion des clients</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
	    {!! Form::open(['route' => 'clients.store','id'=>'clientForm']) !!}
	        <div class="box-header with-border">
	          <h3 class="box-title"> Nouveau client</h3>
	        </div>
	        <!-- /.box-header -->
	        
	        <div class="box-body">
	            <div class="row">
	              	<div class="col-md-4">
		                <div class="form-group {{ $errors->has('ref_client') ? 'has-error':'' }}">
		                  {!!Form::label('ref_client','Ref. Client')!!}
		                  {!!Form::text('ref_client', null, ['class'=>'form-control', 'placeholder'=>'Entrer ref. client'])!!}

		                  {!! $errors->first('ref_client','<small class="help-block">:message</small>')!!}
		                </div>

		                <div class="form-group {{ $errors->has('nom_societe') ? 'has-error':'' }}">
		                  {!!Form::label('nom_societe','Nom Société')!!}
		                  {!!Form::text('nom_societe', null, ['class'=>'form-control', 'placeholder'=>'Entrer nom societe'])!!}

		                  {!! $errors->first('nom_societe','<small class="help-block">:message</small>')!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('adresse','Adresse')!!}
		                  {!!Form::text('adresse', null, ['class'=>'form-control'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('ville','Ville')!!}
		                  {!!Form::text('ville', null, ['class'=>'form-control', 'placeholder'=>'Entrer la ville'])!!}
		                </div>

		                <div class="form-group col-md-5 col-left-0">
		                  {!!Form::label('code_postal','Code Postal')!!}
		                  {!!Form::text('code_postal', null, ['class'=>'form-control'])!!}
		                </div>
		                <div class="clearfix"></div>
		            	<div class="form-group">
		                  {!!Form::label('tel_principal','Tél. Principal')!!}
		                  {!!Form::text('tel_principal', null, ['class'=>'form-control', 'placeholder'=>'Entrer le tél. principal'])!!}
		                </div>
	            	</div>
	            	<!-- ./col-md-4 -->

		            <div class="col-md-4 second-col-60">

		                <div class="form-group">
		                  {!!Form::label('contact1','Contact 01')!!}
		                  {!!Form::text('contact1', null, ['class'=>'form-control', 'placeholder'=>'Entrer le contact 01'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('tel1','Tél 01')!!}
		                  {!!Form::text('tel1', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Tél 01'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('mail1','Mail 01')!!}
		                  {!!Form::email('mail1', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Mail 01'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('contact2','Contact 02')!!}
		                  {!!Form::text('contact2', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Contact 02'])!!}
		                </div>
		            	<div class="form-group">
		                  {!!Form::label('tel2','Tél 02')!!}
		                  {!!Form::text('tel2', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Tél 02'])!!}
		                </div>
		                <div class="form-group">
		                  {!!Form::label('mail2','Mail 02')!!}
		                  {!!Form::email('mail2', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Mail 02'])!!}
		                </div>
		            </div>

		            <div class="col-md-4 second-col-60">

		                <div class="form-group">
		                  {!!Form::label('contact3','Contact 03')!!}
		                  {!!Form::text('contact3', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Contact 03'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('tel3','Tél 03')!!}
		                  {!!Form::text('tel3', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Tél 03'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('mail3','Mail 03')!!}
		                  {!!Form::email('mail3', null, ['class'=>'form-control', 'placeholder'=>'Entrer le Mail 03'])!!}
		                </div>

		                <div class="form-group">
		                  {!!Form::label('notes','Notes')!!}
		                  {!!Form::textarea('notes', null, ['class'=>'form-control line10'])!!}
		                </div>
		            </div>

	            </div>
	            <!-- /.row -->
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('clients') }}">Annuler</a>
	          {!!Form::submit('Ajouter',['class'=>'btn btn-primary'])!!}
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