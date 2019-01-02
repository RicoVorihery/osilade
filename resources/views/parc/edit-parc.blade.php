@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    Parcs
    <small>Gestion des parcs</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">

    	<div class="box box-default">
        {!! Form::model($parc, array('route' =>array('parcs.update',$parc->id),'method'=>'PUT','id'=>'parcForm')) !!}
            <div class="box-header with-border">
                <h3 class="box-title"> Editer Parc {{$parc->ref_inventaire}} </h3>
            </div>
            <div class="box-body">

              <div class="row">
                <div class="col-md-5">
                    <div class="form-group client_div {{ $errors->has('id_client') ? 'has-error':'' }}">
                      {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                      {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                      
                      {!! $errors->first('id_client','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group {{ $errors->has('ref_inventaire') ? 'has-error':'' }}">
                      {!!Form::label('ref_inventaire','Réf. Inventaire')!!}
                      {!!Form::text('ref_inventaire', null, ['class'=>'form-control', 'placeholder'=>'Entrer la réf. inventaire'])!!}

                      {!! $errors->first('ref_inventaire','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group {{ $errors->has('id_type_materiel') ? 'has-error':'' }}">
                      {!!Form::label('id_type_materiel','Type Matériel',['class'=>'ref_type_materiel'])!!}
                      {!!Form::select('id_type_materiel', ['' => ''] + $typeMateriels->pluck('titre','id')->all(),null,['class'=>'form-control type-materiel-select no-clear']) !!}
                      
                      {!! $errors->first('id_type_materiel','<small class="help-block">:message</small>')!!}
                    </div>

                    <div class="form-group">
                      {!!Form::label('info1','Info 1')!!}
                      {!!Form::textarea('info1', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group col-sm-3" style="padding-left: 0px!important;">
                      {!!Form::label('ip01','IP01')!!}
                      {!!Form::text('ip01', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group col-sm-3" style="padding-left: 0px!important;">
                      {!!Form::label('ip02','IP02')!!}
                      {!!Form::text('ip02', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group col-sm-3" style="padding-left: 0px!important;">
                      {!!Form::label('ip03','IP03')!!}
                      {!!Form::text('ip03', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group col-sm-3" style="padding: 0px!important;">
                      {!!Form::label('ip04','IP04')!!}
                      {!!Form::text('ip04', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- ./col left -->
                <div class="col-md-5 second-col-60">
                  <div class="form-group">
                      {!!Form::label('nom','Nom')!!}
                      {!!Form::text('nom', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('login','Login')!!}
                      {!!Form::text('login', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('pass','Pass')!!}
                      {!!Form::text('pass', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('id_tv','Id TV')!!}
                      {!!Form::text('id_tv', null, ['class'=>'form-control'])!!}                  
                    </div>
                    <div class="form-group">
                      {!!Form::label('os','OS')!!}
                      {!!Form::text('os', null, ['class'=>'form-control'])!!}                  
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
	          <a class="btn btn-default" href="{{ url('parcs') }}">Annuler</a>
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