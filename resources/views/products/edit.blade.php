@extends('layouts.app')

@section('content')
	<form action="{{ route('product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data" >
		@csrf
		<input name="_method" type="hidden" value="PATCH">
		<label for="name">Naam</label>
		<input type="text" name="name" value="{{$product->name}}" required>
		<label for="description">Beschrijving</label>
		<input type="textarea" name="description" value="{{$product->description}}" required>
		<label for="price">Prijs</label>
		<input type="number" name="price" value="{{$product->price}}" required>
		<input type="file" name="image"  required/>
		<label for="stock">Aantal</label>
		<input type="number" name="stock" value="{{$product->stock->count}}"  required/>
		<input type="submit" name="submit" value="Product opslaan">
	</form>
@endsection

