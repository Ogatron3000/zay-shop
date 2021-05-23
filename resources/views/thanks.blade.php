@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center text-center p-5 m-5">
        <h1>Thanks for your order!</h1>
        <p>We appreciate your business!</p>
        <a href="{{ route('shop.index') }}"><button type="submit" class="btn btn-success btn-lg" name="submit">Continue Shopping</button></a>
    </div>
@endsection
