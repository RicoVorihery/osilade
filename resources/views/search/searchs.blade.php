@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Recherche 
      <small></small>
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
                {!! Form::open(['id'=>'searchForm','role'=>'search']) !!}
                        {{ csrf_field() }}

                <div class="box-body">
                  @include('flash::message')
                  
                  <div class="row">
                    <div class="client_container col-md-6">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 30%">
                            {!!Form::label('id_client','Réf. client',['class'=>'ref_client'])!!}
                            </td>
                            <td>
                              {!!Form::select('id_client', ['' => ''] + $clients->pluck('ref_client','id')->all(),null,['class'=>'form-control client-select no-clear']) !!}
                              <small class="help-block client_error_msg" style="display: none;">Veuillez renseigner le champ Réf. Client.</small>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              {!!Form::label('keyword','Rechercher un terme')!!}
                            </td>
                            <td>
                              {!!Form::text('keyword', null, ['class'=>'form-control keyword'])!!}
                              <small class="help-block keyword_error_msg" style="display: none;">Veuillez renseigner le mot à rechercher.</small>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="clearfix"></div>
                    
                    <br>
                    <div class="search_container col-md-12">
                      
                    </div>
                    <!-- /.search_container -->
                  </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body-->
                <div class="box-footer">
                  {!!Form::submit('Rechercher',['class'=>'btn btn-primary submit-btn'])!!}
                </div>
                <!-- /. box-footer -->
                {!! Form::close() !!}
          </div>
          <!-- /.box -->
      </div>
  </section>

  @endsection

  @section('scripts')
  @parent

  <script type="text/javascript">
    
    $(function(){

      $(document).on("click",".submit-btn", function(e){
        e.preventDefault();
        var keyword = $("input.keyword").val();
        var idClient = $(".client-select").val();

        $("div.search_container").html('');
        $("small").css('display','none');

        if(idClient==null || idClient==''){
          $("small.client_error_msg").css('display','block');
          return;
        }

        if(keyword==null || keyword==''){
          $('small.keyword_error_msg').css('display','block');
          return;
        }

        $.ajax({
          method:'GET',
          url:base_url+'/search/find/{keyword}/{idClient}',
          data : {keyword:keyword,idClient:idClient}
        })
        .done(function(data){
          $("div.search_container").html(data);
        });

      });

    });

  </script>
  @endsection