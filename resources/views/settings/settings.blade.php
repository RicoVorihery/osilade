@extends('layouts.app-master')

@section('content')
<section class="content-header">
  <h1>
    
    <small></small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> Modifications des listes </h3>

                </div>
                <!-- /.box-header -->
                
                <div class="box-body" style="font-size: 18px">
                    <div class="row">
                        <div class="col-md-3 menu-btn">
                            <a href="{{url('/parametres/type-materiels')}}"> 
                                <button type="button" class="btn btn-block btn-primary btn-lg">Type Matériels</button> 
                            </a> 
                        </div>
                        <!-- <div class="clearfix"></div> -->
                        <div class="col-md-3 menu-btn">
                            <a href="{{url('/parametres/type-infos')}}">
                                <button type="button" class="btn btn-block btn-primary btn-lg">Type Informations</button> 
                            </a> 
                        </div>
                        <!-- <div class="clearfix"></div> -->
                        <!-- <div class="col-md-3 menu-btn">
                            <a href="{{url('/parametres/type-services')}}"> 
                                <button type="button" class="btn btn-block btn-primary btn-lg">Type Services</button> 
                            </a> 
                        </div> -->

                        
                    </div> 

                </div>
                <!-- /.body -->
                <div class="box-footer">
                </div>
                <!-- /. box-footer -->
            </div>
            <!-- /.box -->

            <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title"> Gestion des utilisateurs </h3>

                </div>
                <!-- /.box-header -->
                
                <div class="box-body">
                  @include('flash::message')
                  <p>
                    <a href="{{url('parametres/create')}}">
                      <button class="btn btn-primary"> Ajouter </button>
                    </a>
                  </p>
                  
                    <table id="settings_table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                              <th style="width: 15%">Utilisateur</th>
                              <th style="width: 12%">Nom affiché</th>
                              <th style="width: 8%">login</th>
                              <th style="width: 10%">Modif. Client</th>
                              <th style="width: 8%">Modif. Réf.</th>
                              <th style="width: 8%">Modif. Parc</th>
                              <th style="width: 10%">Modif. Utili</th>
                              <th style="width: 10%">Modif. Service</th>
                              <th style="width: 10%">Paramètres</th>
                              <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($userPermissions as $userPermission)
                            <tr>
                                <td> {{$userPermission->user->name}} </td>
                                <td> {{$userPermission->user->name}} </td>
                                <td> {{$userPermission->user->username}} </td>
                                <td style="text-align: center;">
                                    @if($userPermission->modif_client)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($userPermission->modif_reference)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($userPermission->modif_parc)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($userPermission->modif_user)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($userPermission->modif_service)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if($userPermission->is_admin)
                                        <i class="fa fa-check text-green"></i>
                                    @else
                                        <i class="fa fa-check text-gray"></i>
                                    @endif
                                </td>
                                 <td>
                                  <a href="{{url('parametres/'.$userPermission->id.'/edit')}}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                                      </a>
                                      &nbsp;
                                      {!! Form::open(['method'=>'DELETE', 'route'=>['parametres.destroy',$userPermission->id], 'style'=>'display:initial']) !!}
                                            <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer l'utilisateur {{$userPermission->user->name}}" ><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                        {!! Form::close() !!}

                                        @include('partials.delete-confirm')
                                </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /. box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
</section>
@endsection

@section('scripts')
  @parent
  <script type="text/javascript">
      //Datatables
      // setDataTable("#settings_table","fr");
    
    $(function(){
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