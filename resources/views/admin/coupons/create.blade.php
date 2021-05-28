@section('plugins.Select2', true)

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="py-4 mr-4"><i class="fas fa-tag mr-2"></i>Add New Coupon</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <h3 class="card-title">Add New Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.coupons.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="RUNFORRESTRUN">

                                @error('code')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option selected disabled value="">Select Type</option>
                                    @foreach($types as $type)
                                        <option {{ $type == old('type') ? 'selected' : '' }} value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>

                                @error('type')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input id="discount" name="discount" type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" placeholder="Percent (25) or fixed value (2500)">

                                @error('discount')
                                    <span class="invalid-feedback">
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
