@if($services->count()==0)
	<p> Ce client n'a pas encore de service </p>
@else
<table id="services_table" class="table table-hover table-striped table-bordered">
	<thead>
    <tr>
      <th style="width:70% ">Titre service</th>
      <th style="width: 30%"> Action </th>
    </tr>
  </thead>
  <tbody>
    @foreach($services as $service)
    	<tr>
    		<td class="td-hover">
    			<a href="{{url('services/'.$service->id)}}">
            {{$service->titre}}
          </a>
    		</td>
    		<td>
          <a href="{{url('services/'.$service->id.'/edit')}}">
                  <i class="fa fa-pencil" aria-hidden="true"></i> Editer
                </a>
                &nbsp;
                {!! Form::open(['method'=>'DELETE', 'route'=>['services.destroy',$service->id], 'style'=>'display:initial']) !!}
                      <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer Service {{$service->titre}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
                  {!! Form::close() !!}

                  @include('partials.delete-confirm')
        </td>
    	</tr>
    @endforeach
  </tbody>
</table>
@endif