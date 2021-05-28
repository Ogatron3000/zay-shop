@section('plugins.Select2', true)

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="py-4 mr-4"><i class="fas fa-tag mr-2"></i>Edit Coupon</h1>
@stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-white">Edit Coupon</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ $coupon->code }}" placeholder="RUNFORRESTRUN">

                                @error('code')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Sex</label>
                                <select id="type" name="type" class="form-control @error('sex') is-invalid @enderror">
                                    <option selected disabled value="">Select Sex</option>
                                    @foreach($types as $type)
                                        <option {{ $type === $coupon->type ? 'selected' : '' }} value="{{ $type }}">{{ $type }}</option>
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
                                <input id="discount" name="discount" type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ $coupon->discount }}" placeholder="Percent (25) or fixed value (2000)">

                                @error('discount')
                                <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <!-- /.card-body -->
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
