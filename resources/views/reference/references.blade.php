@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Réferences 
      <small>Gestion des réferences</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    	<div class="row">
        <div class="col-xs-12">

        	<div class="box box-default">
          	<div class="box-header with-border">
            		<h3 class="box-title"> Références Client</h3>
            </div>
            <div class="box-body">
              @include('flash::message')
                  <p>
                    <a href="{{url('references/create')}}">
                      <button class="btn btn-primary"> Ajouter </button>
                    </a>
                  </p>
              <div class="row">
                <div class="client_container col-md-4">
                    <div class="form-group client_div">
                      {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                      {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <div class="references_container col-md-8">
                  @include('reference.partial.references-list')
                </div>

                <div class="col-md-6 reference_dtl_container">
                  
                </div>
              </div>
              <!-- /.row -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-xs-12 -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->

@endsection

@section('scripts')
@parent
<script src="{{asset('js/osilade/upload-file.js')}}"></script>

<script type="text/javascript">
  //Datatables
  setDataTable("#references_table","fr");

  

  $(function(){
    
    // console.log("base url:"+ base_url);

    //A la selection de la ref_client
    $(document).on("select2:select",".client-select", function(e){
      
      // reinitilizeFields();

      var id_client = $(this).val();
      $.ajax({
        method : 'GET',
        url : base_url+'/references/getReferencesByIdClient/{id_client}',
        data : {id_client :id_client}
      })
      .done(function(data){

        $('div.references_container').html(data);

        setDataTable("#references_table","fr");

        $('select.client-select').select2({
            placeholder:"selectionnez un...",
            allowClear: false
        });

      }); //done

    });
    //Fin function select

    // $(document).on("click",".ref_titre", function(e){
    //   e.preventDefault();
    //   var id = $(this).attr('id');
      
    //   $.ajax({
    //     method : 'GET',
    //     url : '/references/getReferenceById/{id}',
    //     data : {id :id}
    //   })
    //   .done(function(data){
    //     $('div.reference_dtl_container').html(data);
    //   }); //ajax done

    // });
    //fin on click table row


    //Suppression reference
    //MAJ SUPPRESSION METTRE DANS DOCUMENT CAR SINON CA NE MARCHE PLUS UNE FOIS
    //RECHARGé AVEC LA FILTRE D'EN HAUT AVEC CLIENT 
    $(document).on('show.bs.modal','#confirmDelete', function (e) {
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
      });

     $(document).on('click','#confirmDelete .modal-footer #confirm', function(){
        $(this).data('form').submit();
    });

  });

</script>
@endsection

