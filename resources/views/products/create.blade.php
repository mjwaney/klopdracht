@extends('layouts.app')

@section('content')
	<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
		@csrf
		<label for="name">Naam</label>
		<input type="text" name="name" required>
		<label for="description">Beschrijving</label>
		<input type="textarea" name="description" required>
		<label for="price">Prijs</label>
		<input type="number" name="price" required>
		<input type="file" name="image"  required/>
		<label for="stock">Aantal</label>
		<input type="number" name="stock"  required/>
		<input type="submit" name="submit" value="Product opslaan">
	</form>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
@endsection
