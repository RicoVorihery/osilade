<div class="col-md-8">
	
	<h3> Résultats recherche</h3>

	@if($zero)
		<p style="font-style: italic;"> Aucun resultat trouvé. Veuillez essayer un mot clé différent. </p>
	@else
		@if($references->count()>0)
		<ul>
			@foreach($references as $reference)
			<li>
				<a href=" {{url('references/'.$reference->id)}} "> {{$reference->titre}} </a>
			</li>
			@endforeach
		</ul>
		@endif

		@if($parcs->count()>0)
		<ul>
			@foreach($parcs as $parc)
			<li>
				<a href=" {{url('parcs/'.$parc->id)}} "> {{$parc->ref_inventaire}} </a>
			</li>
			@endforeach
		</ul>
		@endif

		@if($infoUsers->count()>0)
		<ul>
			@foreach($infoUsers as $infoUser)
			<li>
				<a href=" {{url('info-users/'.$infoUser->id)}} "> {{$infoUser->nom}} {{$infoUser->prenom}} </a>
			</li>
			@endforeach
		</ul>
		@endif

		@if($services->count()>0)
		<ul>
			@foreach($services as $service)
			<li>
				<a href=" {{url('services/'.$service->id)}} "> {{$service->titre}} </a>
			</li>
			@endforeach
		</ul>
		@endif
	@endif

</div>