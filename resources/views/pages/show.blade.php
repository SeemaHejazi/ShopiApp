@extends('layouts.app')

@section('content')
    <a class="btn btn-dark" href="{{url()->previous()}}">
        <i class="fa fa-arrow-left"></i>
        Go Back
    </a>

    <h1>{{$product->title}}</h1>
    <h4 class="card-subtitle mb-2 text-muted">by {{$product->author}} <small>(Author)</small></h4>
    <div class="card">
        <div class="card bg-light">
            <div class="card-body">
                <div class="img-box center-align">
                    <img class="book-img" src="{{$product->img_src}}">
                </div>
                <div class="title-info">
                    <h6 class="card-subtitle mb-2 text-muted">Synopsis</h6>
                </div>

                <div class="row">
                    <p class="card-text">{{$product->description}}</p>
                </div>

                <div class="row">
                    @if ($product->inventory_count < 1)
                        <p class="card-text label stock">OUT OF STOCK</p>
                    @else
                        <p class="card-text label stock">{{$product->inventory_count}} Left</p>
                    @endif

                    <p class="card-text label price">${{number_format($product->price/100, 2)}}</p>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url('add-to-cart/'.$product->id) }}"
                   class="card-link btn btn-sm
                    {{$product->inventory_count < 1 ? 'btn-secondary disabled' : 'btn-orange'}}">
                    <i class="fa fa-shopping-cart"></i>
                    Add to Cart
                </a>
            </div>
        </div>
    </div>
@endsection