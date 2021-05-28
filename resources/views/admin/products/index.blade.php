@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="py-4 mr-4"><i class="fas fa-shopping-bag mr-2"></i>Products</h1>
        <a href="{{ route('admin.products.create') }}"><button class="btn bg-teal">Add New</button></a>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Sex</th>
                                <th>Featured</th>
                                <th>Categories</th>
                                <th>Description</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->details }}</td>
                                    <td>{{ $product->presentPrice() }}</td>
                                    <td>{{ $product->sex->name }}</td>
                                    <td>{{ $product->featured }}</td>
                                    <td>
                                        @foreach($product->categories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </td>
                                    <td>{!! $product->description !!}</td>
                                    <th>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('admin.products.show', $product->slug) }}">
                                                <button class="btn btn-sm bg-cyan mr-2">view</button>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->slug) }}">
                                                <button class="btn btn-sm btn-warning text-white mr-2">edit</button>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm bg-maroon">delete</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Sex</th>
                                <th>Featured</th>
                                <th>Categories</th>
                                <th>Description</th>
                                <th>Controls</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $products->links("pagination::bootstrap-4-admin") }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
