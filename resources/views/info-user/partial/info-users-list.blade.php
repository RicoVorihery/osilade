@if($infoUsers->count()==0)
	<p> Ce client n'a pas encore de infoUsers </p>
@else
<table id="info_users_table" class="table table-hover table-striped table-bordered">
	<thead>
    <tr>
      <th style="width:15%">Nom</th>
      <th style="width: 15%"> Prénom</th>
      <th style="width: 10%"> Service </th>
      <th style="width: 10%"> Type Info</th>
      <th style="width: 15%"> Login </th>
      <th style="width: 15%"> Action </th>
    </tr>
  </thead>
  <tbody>
    @foreach($infoUsers as $infoUser)
    	<tr>
    		<td class="td-hover">
    			<a href="{{url('info-users/'.$infoUser->id)}}">
            {{$infoUser->nom}}
          </a>
    		</td>
        <td>
          {{$infoUser->prenom}}
        </td>
        <td> {{$infoUser->service}} </td>
        <td> {{$infoUser->typeInfo->titre}} </td>
        <td> {{$infoUser->login}} </td>
    		<td>
    			<a href="{{url('info-users/'.$infoUser->id.'/edit')}}">
	                <i class="fa fa-pencil" aria-hidden="true"></i> Editer
	              </a>
	              &nbsp;
	              {!! Form::open(['method'=>'DELETE', 'route'=>['info-users.destroy',$infoUser->id], 'style'=>'display:initial']) !!}
	                    <a href="" data-toggle="modal" data-target="#confirmDelete" data-title="Supprimer Info utilisateur {{$infoUser->titre}}" ><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>
	                {!! Form::close() !!}

	                @include('partials.delete-confirm')
    		</td>
    	</tr>
    @endforeach
  </tbody>
</table>
@endif