@section('plugins.Select2', true)

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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.products.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <input id="details" name="details" type="text" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input id="price" name="price" type="text" class="form-control" placeholder="Enter ...">
                                </div>

                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select id="sex" class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select id="categories" name="categories[]" class="form-control" data-placeholder="Enter ..." multiple>
                                        <option>Sports</option>
                                        <option>News</option>
                                        <option>Games</option>
                                        <option>Science</option>
                                        <option>Maths</option>
                                    </select>
                                </div>


                                <div class="form-check my-4">
                                    <input type="checkbox" class="form-check-input" id="featured" name="featured">
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>

                                <div class="form-group">
                                    <label for="description">Textarea</label>
                                    <textarea id="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(() => {
            $('#{{ 'categories' }}').select2();
        })
    </script>
@stop
