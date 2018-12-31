@if($parcs->count()==0)
	<p> Ce client n'a pas encore de parcs </p>
@else
<table id="parcs_table" class="table table-hover table-striped table-bordered">
	<thead>
    <tr>
      <th style="width:15%">Réf. Inventaire</th>
      <th style="width: 10%"> Type Matériel </th>
      <th style="width: 10%"> IP01 </th>
      <th style="width: 10%"> IP02 </th>
      <th style="width: 15%"> Nom </th>
      <th style="width: 15%"> login </th>
      <th style="width: 15%"> Action </th>
    </tr>
  </thead>
  <tbody>
    @foreach($parcs as $parc)
    	<tr>
    		<td class="td-hover">
    			<a href="{{url('parcs/'.$parc->id)}}">
            {{$parc->ref_inventaire}}
          </a>
    		</td>
        <td>
          {{$parc->typeMateriel->titre}}
        </td>
        <td> {{$parc->ip01}} </td>
        <td> {{$parc->ip02}} </td>
        <td> {{$parc->nom}} </td>
        <td> {{$parc->login}} </td>
    		<td>
    			<a href="{{url('parcs/'.$parc->id.'/edit')}}">
	                <i class="fa fa-pencil" aria-hidden="true"></i> Editer
	              </a>
	              &nbsp;
	              {!! Form::open(['method'=>'DELETE', 'route'=>['parcs.destroy',$parc->id], 'style'=>'display:initial']) !!}
	                    <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer Parc {{$parc->titre}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
	                {!! Form::close() !!}

	                @include('partials.delete-confirm')
    		</td>
    	</tr>
    @endforeach
  </tbody>
</table>
@endif