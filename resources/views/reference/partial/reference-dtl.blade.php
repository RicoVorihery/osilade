<table class="table table-striped">
  <tbody>
    <tr>
      <td style="width: 30%"> <label> Réf. client</label> </td>
      <td> {{$reference->client->ref_client}}</td>
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
    			<i class="fa fa-paperclip"></i> {{$reference->file01}} <br>
    		@endif
    		@if($reference->file02!=null)
    			<i class="fa fa-paperclip"></i> {{$reference->file02}} <br>
    		@endif
    		@if($reference->file03!=null)
    			<i class="fa fa-paperclip"></i> {{$reference->file03}} <br>
    		@endif
    		@if($reference->file04!=null)
    			<i class="fa fa-paperclip"></i> {{$reference->file04}}
    		@endif
    	</td>
    </tr>
   </tbody>
</table>