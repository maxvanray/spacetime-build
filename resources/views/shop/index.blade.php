@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>

            @foreach(Cart::content() as $row)

            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{ $row->name }}</h4>
                            @php ($row->options->has('size') ? '<p>'.$row->options->size.'</p>' : '') @endphp
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ $row->price }}</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="{{ $row->qty }}">
                </td>
                <td data-th="Subtotal" class="text-center">{{ $row->subtotal }}</td>
                <td class="actions" data-th="">
                    <button onclick="location.reload()" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>

                    {!! Form::open(['route' => 'destroy.item', 'method' => 'DELETE']) !!}
                        {{ Form::hidden('rowId', $row->rowId) }}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    {!! Form::close() !!}

                </td>
            </tr>

            @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Subtotal</td>
                    <td>{{ Cart::subtotal() }}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Tax</td>
                    <td>{{ Cart::tax() }}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td>{{ Cart::total() }}</td>
                </tr>
                <tr>
                    <td><a href="{{ url()->previous() }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total ${{ Cart::total() }}</strong></td>
                    <td>
                        <button class="btn btn-primary">Submit Payment</button>

                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-amount="{{ Cart::total()*100 }}"
                                data-name="Stripe.com"
                                data-description="Widget"
                                data-locale="auto"
                                data-currency="usd">
                        </script>


                        @php /* {!! Form::open(['route' => 'checkout', 'class' => 'stripe-button']) !!}
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_mSIRqTOAsFX28V9MdrTTOdq3"
                                data-amount="{!! Form::hidden('total', Cart::total()) !!}"
                                data-name="Demo Site"
                                data-description="Example charge"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                        </script>
                            {!! Form::hidden('total', Cart::total()) !!}
                            <button type="submit" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button>
                        {!! Form::close() !!}


                        <form action="your-server-side-code" method="POST">
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_mSIRqTOAsFX28V9MdrTTOdq3"
                                    data-amount="9999"
                                    data-name="Demo Site"
                                    data-description="Example charge"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto">
                            </script>
                        </form>


                        <script src="https://js.stripe.com/v3/"></script>
                        <div id="payment-request-button">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>*/ @endphp

                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('footer_scripts')
    <script>
        var stripe = Stripe('pk_test_mSIRqTOAsFX28V9MdrTTOdq3');
        var paymentRequest = stripe.paymentRequest({
            country: 'US',
            currency: 'usd',
            total: {
                label: 'Demo total',
                amount: 1000,
            },
        });
        var elements = stripe.elements();
        var prButton = elements.create('paymentRequestButton', {
            paymentRequest: paymentRequest,
        });

        // Check the availability of the Payment Request API first.
        paymentRequest.canMakePayment().then(function(result) {
            if (result) {
                prButton.mount('#payment-request-button');
            } else {
                document.getElementById('payment-request-button').style.display = 'none';
            }
        });
        paymentRequest.on('token', function(ev) {
            // Send the token to your server to charge it!
            fetch('/charges', {
                method: 'POST',
                body: JSON.stringify({token: ev.token.id}),
                headers: {'content-type': 'application/json'},
            })
                .then(function(response) {
                    if (response.ok) {
                        // Report to the browser that the payment was successful, prompting
                        // it to close the browser payment interface.
                        ev.complete('success');
                    } else {
                        // Report to the browser that the payment failed, prompting it to
                        // re-show the payment interface, or show an error message and close
                        // the payment interface.
                        ev.complete('fail');
                    }
                });
        });
        elements.create('paymentRequestButton', {
            paymentRequest: paymentRequest,
            style: {
                paymentRequestButton: {
                    type: 'default' | 'donate' | 'buy', // default: 'default'
                    theme: 'dark' | 'light' | 'light-outline', // default: 'dark'
                    height: '64px', // default: '40px', the width is always '100%'
                },
            },
        });
    </script>

@endsection