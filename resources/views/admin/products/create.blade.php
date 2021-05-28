@section('plugins.Select2', true)

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="py-4 mr-4"><i class="fas fa-shopping-bag mr-2"></i>Add New Product</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Shoes 1 Vintage">

                                @error('name')
                                <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" placeholder="Slug will be evaluated automatically" disabled>
                            </div>

                            <div class="form-group">
                                <label for="details">Details</label>
                                <input id="details" name="details" type="text" class="form-control @error('details') is-invalid @enderror" value="{{ old('details') }}" placeholder="Spring 2021 Vintage Collection">

                                @error('details')
                                <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="20000">

                                @error('price')
                                <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sex_id">Sex</label>
                                <select id="sex_id" name="sex_id" class="form-control @error('sex') is-invalid @enderror">
                                    <option selected disabled value="">Select Sex</option>
                                    @foreach($sexes as $sex)
                                        <option {{ $sex->id == old('sex_id') ? 'selected' : '' }} value="{{ $sex->id }}">{{ $sex->name }}</option>
                                    @endforeach
                                </select>

                                @error('sex')
                                <span class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="category_ids">Categories</label>
                                <div class="@error('categories') border rounded border-danger @enderror">
                                    <select id="category_ids" name="category_ids[]" class="form-control" data-placeholder="Select Categories" multiple>
                                        @foreach($categories as $category)
                                            <option {{ in_array($category->id, old('category_ids') ?? [], false) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('categories')
                                <span class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input @error('featured') is-invalid @enderror" id="featured" name="featured" value="1">
                                <label class="form-check-label" for="featured">Featured</label>

                                @error('featured')
                                <span class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur deleniti ducimus hic impedit nam nobis officiis, sunt suscipit tempore!">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn bg-teal">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(() => {
            $('#{{ 'category_ids' }}').select2();
        })
    </script>
@stop
