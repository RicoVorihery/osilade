@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Clients 
      <small>Gestion clients</small>
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
                    <a href="{{url('clients/create')}}">
                      <button class="btn btn-primary"> Ajouter </button>
                    </a>
                  </p>
                    <table id="clients_table" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="width: 15%">Ref. client</th>
                          <th style="width: 20%">Société</th>
                          <th style="width: 15%">Ville</th>
                          <th style="width: 15%">Tél. Principal</th>
                          <th style="width: 15%"> Action </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      @foreach($clients as $client)
                      <tr>
                        <td class="td-hover"> 
                          <a href="{{url('clients/'.$client->id)}}">{{$client->ref_client}}
                          </a>
                        </td>
                        <td> {{$client->nom_societe}} </td>
                        <td> {{$client->ville}} </td>
                        <td> {{$client->tel_principal}} </td>
                        <td>
                          <a href="{{url('clients/'.$client->id.'/edit')}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Editer
                              </a>
                              &nbsp;
                              {!! Form::open(['method'=>'DELETE', 'route'=>['clients.destroy',$client->id], 'style'=>'display:initial']) !!}
                                    <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer client {{$client->ref_client}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
                                {!! Form::close() !!}

                                @include('partials.delete-confirm')
                        </td>
                      </tr> 
                      @endforeach
                      </tbody>
                    </table>
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
      setDataTable("#clients_table","fr");
    
    $(function(){
        $('#clients_table').on('show.bs.modal','#confirmDelete', function (e) {
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form reference to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);
          });

         $('#clients_table').on('click','#confirmDelete .modal-footer #confirm', function(){
            $(this).data('form').submit();
        });
    });
  </script>
  @endsection