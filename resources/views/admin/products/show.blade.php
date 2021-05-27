@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p>{{ $product->id }}</p>
                            <p>{{ $product->name }}</p>
                            <p>{{ $product->slug }}</p>
                            <p>{{ $product->details }}</p>
                            <p>{{ $product->price }}</p>
                            <p>{{ $product->sex->name }}</p>
                            <p>{{ $product->featured }}</p>
                            <p>{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
