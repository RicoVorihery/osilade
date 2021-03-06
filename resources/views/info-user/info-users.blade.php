@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Infos Utilisateurs
      <small>Gestion Infos Utilisateurs</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    	<div class="row">
	        <div class="col-xs-12">
	        	<div class="box box-default">
	            	<div class="box-header with-border">
	              		<h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                  @include('flash::message')
                  <p>
                    <a href="{{url('info-users/create')}}">
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
                <div class="info_users_container col-md-12">
                  @include('info-user.partial.info-users-list')
                </div>
                </div>
                <!-- /.box-body -->
            </div>
          </div>
      </div>
  </section>

  @endsection

  @section('scripts')
  @parent

  <script type="text/javascript">
      //Datatables
      setDataTable("#info_users_table","fr");
    
    $(function(){

        //A la selection de la ref_client
    $(document).on("select2:select",".client-select", function(e){
      
      // reinitilizeFields();

      var id_client = $(this).val();
      $.ajax({
        method : 'GET',
        url : base_url+'/info-users/getInfoUsersByIdClient/{id_client}',
        data : {id_client :id_client}
      })
      .done(function(data){

        $('div.info_users_container').html(data);
        
        setDataTable("#info_users_table","fr");

        $('select.client-select').select2({
            placeholder:"selectionnez un...",
            allowClear: false
        });

      }); //done

    });
    //Fin function select


        //Suppression infoUser
        $(document).on('show.bs.modal','#confirmDelete', function (e) {
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form infoUser to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);
          });

         $(document).on('click','#confirmDelete .modal-footer #confirm', function(){
            $(this).data('form').submit();
        });
    });
  </script>
  @endsection