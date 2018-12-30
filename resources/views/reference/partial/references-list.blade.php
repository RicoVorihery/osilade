@if($references->count()==0)
	<p> Ce client n'a pas encore de référence </p>
@else
<table id="references_table" class="table table-hover table-striped table-bordered">
	<thead>
    <tr>
      <th style="width:70% ">Titre Référence</th>
      <th style="width: 30%"> Action </th>
    </tr>
  </thead>
  <tbody>
    @foreach($references as $reference)
    	<tr>
    		<td class="td-hover">
    			<a href="{{url('references/'.$reference->id)}}" id="{{$reference->id}}" class="ref_titre">
            {{$reference->titre}}
          </a>
    		</td>
    		<td>
          <a href="{{url('references/'.$reference->id.'/edit')}}">
                  <i class="fa fa-pencil" aria-hidden="true"></i> Editer
                </a>
                &nbsp;
                {!! Form::open(['method'=>'DELETE', 'route'=>['references.destroy',$reference->id], 'style'=>'display:initial']) !!}
                      <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer Référence {{$reference->titre}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
                  {!! Form::close() !!}

                  @include('partials.delete-confirm')
        </td>
    	</tr>
    @endforeach
  </tbody>
</table>
@endif