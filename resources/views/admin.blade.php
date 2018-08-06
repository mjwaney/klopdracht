@extends('layouts.app')

@section('content')
<div class="container">    

	@isset($userProducts)
            	Jou producten
            	<div class="row justify-content-center">
	            	@foreach($userProducts as $product)
		        		<div class="col-md-8">
		            		<div class="card">
				                <div class="card-header">{{$product->name}}</div>			                	
				                <div class="card-body">
				                		{{$product->description}}
				                		@isset($product->image()->first()->url)
				                			<img src="{{$product->image()->first()->url}}" width="50" height="auto">	
				                		@endif	
				                	</div>                		
		       		 		<a href="{{route('product.show', [$product->id])}}">Details</a>
		       		 		<a href="{{route('product.edit', [$product->id])}}">Bewerken</a>
		       		 		<form action="{{route('product.destroy', [$product->id])}}" method="post"
		       		 			onsubmit="return confirm('Weet je het zeker?');">
		       		 			@csrf
							<input type="hidden" name="_method" value="DELETE">
		       		 			<input type="submit" name="submit" value="Verwijderen">
		       		 		</form>
		                		</div>
		       		 </div>
	                @endforeach                			      
 			</div>
	@endisset

            	Alle producten
            	<div class="row justify-content-center">
	            	@foreach($products as $product)
		        		<div class="col-md-8">
		            		<div class="card">
				                <div class="card-header">{{$product->name}}</div>			                	
				                <div class="card-body">
				                		{{$product->description}}
				                		@isset($product->image()->first()->url)
				                			<img src="{{$product->image()->first()->url}}" width="50" height="auto">	
				                		@endisset	                		
				                	</div>
		       		 		<a href="{{route('product.show', [$product->id])}}">Details</a>
		       		 		<a href="{{route('product.edit', [$product->id])}}">Bewerken</a>
		       		 		<form action="{{route('product.destroy', [$product->id])}}" method="post"
		       		 			onsubmit="return confirm('Weet je het zeker?');">
		       		 			@csrf
							<input type="hidden" name="_method" value="DELETE">
		       		 			<input type="submit" name="submit" value="Verwijderen">
		       		 		</form>
		                		</div>
		       		 </div>
	                @endforeach
    		</div>
		
</div>



@endsection