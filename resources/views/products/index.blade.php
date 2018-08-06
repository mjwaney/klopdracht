@extends('layouts.app')

@section('content')
<div class="container">  
      	Producten
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
	                		</div>
	       		 </div>
             	@endforeach
	</div>		
</div>

@endsection