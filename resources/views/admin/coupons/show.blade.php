@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="py-4 mr-4"><i class="fas fa-tag mr-2"></i>Coupon Details</h1>
        <a href="{{ route('admin.coupons.edit', $coupon->id) }}">
            <button class="btn btn-warning text-white mr-2">Edit</button>
        </a>
        <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn bg-maroon">Delete</button>
        </form>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl>
                            <div class="post">
                                <dt>ID</dt>
                                <dd>{{ $coupon->id }}</dd>
                            </div>
                            <div class="post">
                                <dt>Name</dt>
                                <dd>{{ $coupon->code }}</dd>
                            </div>
                            <div class="post">
                                <dt>Slug</dt>
                                <dd>{{ $coupon->type }}</dd>
                            </div>
                            <div class="post">
                                <dt>Featured</dt>
                                <dd>{{ $coupon->presentDiscount() }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
