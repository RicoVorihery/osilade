@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Références
    <small>Gestion des références</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
	    {!! Form::open(['route' => 'references.store','id'=>'clientForm','files' => true]) !!}
              {{ csrf_field() }}

            <div class="box-header with-border">
                <h3 class="box-title"> Ajout nouvelle référence</h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="callout" id="message" style="display: none;" > </div>
                </div>
                <div class="clearfix"></div>

                <div class="client_container col-md-4">
                    <div class="form-group client_div {{ $errors->has('id_client') ? 'has-error':'' }}">
                      {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                      {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                      
                      {!! $errors->first('id_client','<small class="help-block">:message</small>')!!}
                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="col-md-6 form_dtl">
                  <div class="form-group {{ $errors->has('titre') ? 'has-error':'' }}">
                      {!!Form::label('titre','Titre Référence')!!}
                      {!!Form::text('titre', null, ['class'=>'form-control', 'placeholder'=>'Entrer le titre de la Référence'])!!}

                      {!! $errors->first('titre','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group {{ $errors->has('reference') ? 'has-error':'' }}">
                      {!!Form::label('reference','Référence')!!}
                      {!!Form::textarea('reference', null, ['class'=>'form-control line10'])!!}
                      
                      {!! $errors->first('reference','<small class="help-block">:message</small>')!!}
                    </div>
                </div>
                <div class="col-md-4 second-col-60 form_dtl">
                  <div class="form-group">
                      {!!Form::label('file01','Ajouter Fichier')!!}
                      {!! Form::file('file01') !!}
                    </div>
                    <div class="form-group">
                      {!!Form::label('file02','Ajouter Fichier')!!}
                      {!! Form::file('file02', null) !!}
                    </div>
                    <div class="form-group">
                      {!!Form::label('file03','Ajouter Fichier')!!}
                      {!! Form::file('file03', null) !!}
                    </div>
                    <div class="form-group">
                      {!!Form::label('file04','Ajouter Fichier')!!}
                      {!! Form::file('file04', null) !!}
                    </div>
                </div>
                <!-- /.col-md-4 -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./body -->
            <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('references') }}">Annuler</a>
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