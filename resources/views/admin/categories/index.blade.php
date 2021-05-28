@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="py-4 mr-4"><i class="fas fa-list mr-2"></i>Categories</h1>
        <a href="{{ route('admin.categories.create') }}"><button class="btn bg-teal">Add New</button></a>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-responsive-sm table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Featured</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->featured }}</td>
                                    <td class="w-25">
                                        <div class="d-flex">
                                            <a href="{{ route('admin.categories.show', $category->slug) }}">
                                                <button class="btn btn-sm bg-cyan mr-2">view</button>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', $category->slug) }}">
                                                <button class="btn btn-sm btn-warning text-white mr-2">edit</button>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm bg-maroon">delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Featured</th>
                                <th>Controls</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $categories->links("pagination::bootstrap-4-admin") }}
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
