@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="py-4 mr-4"><i class="fas fa-tag mr-2"></i>Coupons</h1>
        <a href="{{ route('admin.coupons.create') }}"><button class="btn bg-teal">Add New</button></a>
    </div>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Coupons</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-responsive-sm table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Discount</th>
                                <th>Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->type }}</td>
                                    <td>{{ $coupon->presentDiscount() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.coupons.show', $coupon->id) }}">
                                                <button class="btn btn-sm bg-cyan mr-2">view</button>
                                            </a>
                                            <a href="{{ route('admin.coupons.edit', $coupon->id) }}">
                                                <button class="btn btn-sm btn-warning text-white mr-2">edit</button>
                                            </a>
                                            <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST">
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
                                <th>Code</th>
                                <th>Type</th>
                                <th>Discount</th>
                                <th>Controls</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="d-flex justify-content-end mt-4">
                            {{ $coupons->links("pagination::bootstrap-4-admin") }}
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
