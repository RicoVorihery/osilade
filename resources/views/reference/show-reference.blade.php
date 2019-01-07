@extends('layouts.app-master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Service {{$reference->titre}}
    <small>Gestion des references</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"> <span class="label-title">{{$reference->titre}}</span> </h3>
        </div>

        {!!Form::hidden('ref_client',$reference->client->ref_client,['class'=>'ref_client'])!!}

        <!-- /.box-header -->
        <div class="box-body">
          @include('flash::message')
          <div class="col-md-6">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td style="width: 30%"> <label> Réf. client</label> </td>
                  <td>{{$reference->client->ref_client}}</td>
                </tr>
                <tr>
                  <td> <label> Titre Référence</label> </td>
                  <td> {{$reference->titre}}</td>
                </tr>
                <tr>
                  <td><label>Référence </label></td>
                  <td> {{$reference->reference}} </td>
                </tr>
                <tr>
                  <td><label>Fichiers joints</label></td>
                  <td>
                    @if($reference->file01!=null)
                   <a href="{{url('references/file/download?fileName='.$reference->file01.'&refClient='.$reference->client->ref_client.'')}}" class="download_link"><i class="fa fa-paperclip"></i><span class="filename">{{$reference->file01}}</span></a> <br>
                    <small class="help-block error-message"></small>
                    @endif
                    @if($reference->file02!=null)
                      <a href="{{url('references/file/download?fileName='.$reference->file02.'&refClient='.$reference->client->ref_client.'')}}" class="download_link"><i class="fa fa-paperclip"></i><span class="filename">{{$reference->file02}}</span></a> <br>
                    <small class="help-block error-message"></small>
                    @endif
                    @if($reference->file03!=null)
                      <a href="{{url('references/file/download?fileName='.$reference->file03.'&refClient='.$reference->client->ref_client.'')}}" class="download_link"><i class="fa fa-paperclip"></i><span class="filename">{{$reference->file03}}</span></a> <br>
                    <small class="help-block error-message"></small>
                    @endif
                    @if($reference->file04!=null)
                      <a href="{{url('references/file/download?fileName='.$reference->file04.'&refClient='.$reference->client->ref_client.'')}}" class="download_link"><i class="fa fa-paperclip"></i><span class="filename">{{$reference->file04}}</span></a> <br>
                    <small class="help-block error-message"></small>
                    @endif
                  </td>
                </tr>
               </tbody>
            </table>
          </div>
          <!-- /.col-md-6 -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <div class="clearfix"></div>
          <div class="footer-menu">
            <a href="{{url('references')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Revenir à la liste</a> |
            <a href="{{url('references/'.$reference->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i> Editer</a>
          </div>
        </div>
        <!-- /.box-footer -->
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
<script type="text/javascript">
  $(function(){

    // $(document).on('click','a.download_link', function(e){
    //   // e.preventDefault();
      
    //   $("small.error-message").text('');

    //   var link = $(this);
    //   var fileName = $(this).find('span.filename').text();
    //   var refClient = $('input.ref_client').val();
    //   // console.log("file name:"+fileName);
    //   // console.log("Ref client:"+refClient);

    //   $.ajax({
    //     method:'GET',
    //     url: '/references/file/download/{fileName}/{refClient}',
    //     data : {fileName:fileName,refClient:refClient}
    //   })
    //   .done(function(data){
    //     if(data.fail!=null)
    //       console.log(data.fail);
    //       link.parent().find('small.error-message').text(data.fail);
    //   });

    // });

  });
</script>
@endsection