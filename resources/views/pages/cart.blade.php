@extends('layouts.app')

@section('content')

<div class="container">
    <p><a href="{{ url('/') }}">Home</a> / Cart</p>
    <h1>Your Cart</h1>
    <hr>
    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif

    <?php $total = 0 ?>
    @if (session('cart'))
        <div class="card">
            <table class="table cart">
                <thead>
                <tr>
                    <th class="table-image"></th>
                    <th>Book</th>
                    <th>Total In Stock</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th class="column-spacer"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach (session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td class="table-image">
                            <a href="{{ url('products', [$id]) }}">
                                <img src="{{ $details['photo'] }}"
                                     alt="product"
                                     class="img-responsive cart-image book-img">
                            </a>
                        </td>
                        <td><a href="{{ url('products', [$id]) }}">{{ $details['name'] }}</a></td>
                        <td><a href="{{ url('products', [$id]) }}">{{ $details['total'] }}</a></td>
                        <td>
                            <label>
                                <select class="quantity" data-id="{{ $id }}">
                                    @for ($i = 1; $i <= $details['total']; $i++)
                                        <option {{ $details['quantity'] == $i ? 'selected' : '' }}>{{$i}}</option>
                                    @endfor
                                </select>
                            </label>
                        </td>
                        <td>$ {{ number_format(($details['price'] * $details['quantity'])/100, 2) }}</td>
                        <td class=""></td>

                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                <i class="fa fa-trash-o"></i> Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                    <td>${{ number_format($total/100, 2) }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Tax</td>
                    <td>$ {{number_format($total/100 * 0.13, 2)}}</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class="border-bottom">
                    <td class="table-image"></td>
                    <td style="padding: 40px;"></td>
                    <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                    <td class="table-bg">$ {{ number_format($total/100 + ($total/100 * 0.13), 2) }}</td>
                    <td class="column-spacer"></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>

        <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;

        <div style="float:right">
            <a href="{{ url('/checkout') }}" class="btn btn-success btn-lg">
                Proceed to Checkout
            </a>
        </div>
    @else

        <h3>You have no items in your shopping cart</h3>
        <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
    @endif

    <div class="spacer"></div>
</div> <!-- end container -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('.update-cart').click(function (e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: 'patch',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr('data-id'),
                        quantity: ele.parents('tr').find('.quantity').val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

            $('.remove-from-cart').on('click', function (e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm('Are you sure')) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: 'DELETE',
                        data: {_token: '{{ csrf_token() }}', id: ele.attr('data-id')},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
