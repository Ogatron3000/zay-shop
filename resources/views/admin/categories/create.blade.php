@section('plugins.Select2', true)

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="py-4 mr-4"><i class="fas fa-list mr-2"></i>Add New Category</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Running">

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

                            {{--<div class="form-group">--}}
                            {{--    <label for="category_ids">Categories</label>--}}
                            {{--    <div class="@error('categories') border rounded border-danger @enderror">--}}
                            {{--        <select id="category_ids" name="category_ids[]" class="form-control" data-placeholder="Select Categories" multiple>--}}
                            {{--            @foreach($categories as $category)--}}
                            {{--                <option {{ in_array($category->id, old('category_ids') ?? [], false) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>--}}
                            {{--            @endforeach--}}
                            {{--        </select>--}}
                            {{--    </div>--}}

                            {{--    @error('categories')--}}
                            {{--        <span class="invalid-feedback d-block">--}}
                            {{--            <strong>{{ $message }}</strong>--}}
                            {{--        </span>--}}
                            {{--    @enderror--}}
                            {{--</div>--}}

                            <div class="form-check my-4">
                                <input type="checkbox" class="form-check-input @error('featured') is-invalid @enderror" id="featured" name="featured" value="1">
                                <label class="form-check-label" for="featured">Featured</label>

                                @error('featured')
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
