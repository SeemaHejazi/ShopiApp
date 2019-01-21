@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <h5>Viewing {{$viewing}} out of {{$total}} Results</h5>
    {{$products->links()}}
    @if (count($products))
        <div class="card-columns">
            @foreach($products as $product)
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="img-box">
                            <img class="book-img" src="{{$product->img_src}}">
                        </div>
                        <div class="title-info">
                            <a href="/products/{{$product->id}}">
                                <h5 class="card-title">{{$product->title}}</h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted">by {{$product->author}}</h6>
                        </div>

                        <div class="row">
                            <p class="card-text">
                                {{strlen($product->description) > 500?
                                  substr($product->description, 0, 500).'...' : $product->description}}
                            </p>
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
            @endforeach
        </div>
        {{$products->links()}}
    @else
        <p>No Products Found</p>
    @endif
@endsection