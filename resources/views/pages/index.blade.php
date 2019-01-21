@extends('layouts.app')

@section('content')
    <h1>{{$title}}, Shopifolk and friends</h1>

    <div class="card bg-light">
        <div class="card-body">
            <h5 class="card-title">Your very own book shop <small>created with Laravel 5.7</small></h5>

            <p class="card-text">
                You can you use the navigation above to:
            </p>
            <ul class="list-group">
                <li class="list-group-item">View All Books (even those we've sold out of) </li>
                <li class="list-group-item">View Only In Stock Books</li>
                <li class="list-group-item">View Your Cart and Checkout</li>
                <li class="list-group-item">**You Can Click on Titles to Get More Information on Your Next Great Read</li>
                <li class="list-group-item">**All the images are randomly generated animals on pageload... because why not :)</li>
            </ul>
        </div>
    </div>
@endsection