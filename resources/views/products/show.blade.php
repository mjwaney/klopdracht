@extends('layouts.app')

@section('content')
	{{ $product->name }}<br>
	{{ $product->description }} <br>
	{{ $product->price }} <br>
	{{ $product->stock->count }} <br>
	@isset($product->image)
		<img src="{{$product->image->url}}">
	@endisset
	@if (Auth::check()) <!-- ingelogde gebruiker heeft nu alle rechten, rollen nog niet aangemaakt -->
		<a href="{{route('product.edit', [$product->id])}}">Bewerken</a>
		<form action="{{route('product.destroy', [$product->id])}}" method="post">
			@csrf
			<input type="hidden" name="_method" value="DELETE">
			<input type="submit" name="submit" value="Verwijderen">
		</form>
	@endif
@endsection

