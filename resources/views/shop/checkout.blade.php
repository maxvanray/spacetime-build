@extends('layouts.app')

@section('header_styles')

@endsection

@section('content')


<form action="/your-server-side-code" method="POST">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_pIaGoPD69OsOWmh1FIE8Hl4J"
            data-amount="1999"
            data-name="Stripe Demo"
            data-description="Online course about integrating Stripe"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="usd">
    </script>
</form>



@endsection