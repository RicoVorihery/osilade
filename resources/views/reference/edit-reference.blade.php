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
	    {!! Form::model($reference, array('route' =>array('references.update',$reference->id),'method'=>'PUT','id'=>'referenceForm','files' => true)) !!}

            {!!Form::hidden('id',$reference->id, ['id'=>'id_reference'])!!}
            <div class="box-header with-border">
                <h3 class="box-title"> Editer Référence {{$reference->titre}} </h3>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                <div class="col-md-6 second-col-60 form_dtl">
                    <div class="file_container">
                      @if($reference->file01!=null)
                        <p id="01"> <i class="fa fa-paperclip"></i> {{$reference->file01}} 
                        <a href="" class="delete delete_lnk" id="{{$reference->file01}}"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> </a> </p>
                      @else
                      <div class="form-group">
                          {!!Form::label('file01','Ajouter Fichier')!!}
                          {!! Form::file('file01',null) !!}
                        </div>
                      @endif
                    </div>

                    <div class="file_container">
                      @if($reference->file02!=null)
                        <p id="02"> <i class="fa fa-paperclip"></i> {{$reference->file02}} 
                        <a href="" class="delete delete_lnk" id="{{$reference->file02}}"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> </a> </p>
                      @else
                      <div class="form-group">
                          {!!Form::label('file02','Ajouter Fichier')!!}
                          {!! Form::file('file02',null) !!}
                        </div>
                      @endif
                    </div>

                    <div class="file_container">
                      @if($reference->file03!=null)
                        <p id="03"> <i class="fa fa-paperclip"></i> {{$reference->file03}} 
                        <a href="" class="delete delete_lnk" id="{{$reference->file03}}"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> </a> </p>
                      @else
                      <div class="form-group">
                          {!!Form::label('file03','Ajouter Fichier')!!}
                          {!! Form::file('file03',null) !!}
                        </div>
                      @endif
                    </div>

                    <div class="file_container">
                      @if($reference->file04!=null)
                        <p id="01"> <i class="fa fa-paperclip"></i> {{$reference->file04}} 
                        <a href="" class="delete delete_lnk" id="{{$reference->file04}}"> &nbsp; <i class="fa fa-trash" aria-hidden="true"></i> </a> </p>
                      @else
                      <div class="form-group">
                          {!!Form::label('file04','Ajouter Fichier')!!}
                          {!! Form::file('file04',null) !!}
                        </div>
                      @endif
                    </div>

                    
                </div>
                <!-- /.col-md-4 -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./body -->
            <div class="box-footer">
	          <a class="btn btn-default" href="{{ url('references') }}">Annuler</a>
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
<script type="text/javascript">
  $(function(){
    var id = $("#id_reference").val();

    $(document).on("click", "a.delete_lnk", function(e){
      e.preventDefault();
      var lnk = $(this);

      var file = $(this).attr('id');
      var number = $(this).parent("p").attr('id');
      $.ajax({
        method : 'GET',
      url : '/references/deleteReferenceFile/{id}/{file}/{number}',
        data : {id :id,file:file,number:number}
      })
      .done(function(data){
        console.log(data);
        // if(data == true){
          $(lnk).closest("div.file_container").html('<div class="form-group">'+
                          '<label for="file'+number+'">Ajouter Fichier</label>'+
                          '<input name="file'+number+'" type="file" id="file'+number+'">'+
                          '</div>');
        // }

        // $('div.reference_dtl_container').html(data);
      }); //ajax done

    });
  });
</script>
@endsection