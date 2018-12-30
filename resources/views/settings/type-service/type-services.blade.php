@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Types Services 
      <small>Gestion types services</small>
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
                    <a href="{{url('parametres/type-services/create')}}">
                      <button class="btn btn-primary"> Ajouter </button>
                    </a>
                  </p>
                    <table id="typeServices_table" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th style="width: 40%">Nom</th>
                          <th style="width: 40%">Description</th>
                          <th style="width: 20%"> Action </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      @foreach($typeServices as $typeService)
                      <tr>
                        <td class="td-hover"> 
                          <a href="{{url('parametres/type-services/'.$typeService->id)}}">{{$typeService->titre}}
                          </a>
                        </td>
                        <td> {{$typeService->description}} </td>
                        <td>
                          <a href="{{url('parametres/type-services/'.$typeService->id.'/edit')}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Editer
                              </a>
                              &nbsp;
                              {!! Form::open(['method'=>'DELETE', 'route'=>['type-services.destroy',$typeService->id], 'style'=>'display:initial']) !!}
                                    <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer type service {{$typeService->titre}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
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
      setDataTable("#typeServices_table","fr");
    
    $(function(){
        $('#typeServices_table').on('show.bs.modal','#confirmDelete', function (e) {
          $title = $(e.relatedTarget).attr('data-title');
          $(this).find('.modal-title').text($title);

          // Pass form reference to modal for submission on yes/ok
          var form = $(e.relatedTarget).closest('form');
          $(this).find('.modal-footer #confirm').data('form', form);
          });

         $('#typeServices_table').on('click','#confirmDelete .modal-footer #confirm', function(){
            $(this).data('form').submit();
        });
    });
  </script>
  @endsection