@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="py-4 mr-4"><i class="fas fa-shopping-bag mr-2"></i>Product Details</h1>
        <a href="{{ route('admin.products.edit', $product->slug) }}">
            <button class="btn btn-warning text-white mr-2">Edit</button>
        </a>
        <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
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
                                <dd>{{ $product->id }}</dd>
                            </div>
                            <div class="post">
                                <dt>Name</dt>
                                <dd>{{ $product->name }}</dd>
                            </div>
                            <div class="post">
                                <dt>Slug</dt>
                                <dd>{{ $product->slug }}</dd>
                            </div>
                            <div class="post">
                                <dt>Details</dt>
                                <dd>{{ $product->details }}</dd>
                            </div>
                            <div class="post">
                                <dt>Price</dt>
                                <dd>{{ $product->presentPrice() }}</dd>
                            </div>
                            <div class="post">
                                <dt>Sex</dt>
                                <dd>{{ $product->sex->name }}</dd>
                            </div>
                            <div class="post">
                                <dt>Categories</dt>
                                <dd>
                                    @foreach($product->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </dd>
                            </div>
                            <div class="post">
                                <dt>Featured</dt>
                                <dd>{{ $product->featured }}</dd>
                            </div>
                            <div class="post">
                                <dt>Description</dt>
                                <dd>{!! $product->description !!}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
