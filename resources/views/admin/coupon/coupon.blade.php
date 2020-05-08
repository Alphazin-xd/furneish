@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Coupon</a>
            <span class="breadcrumb-item active">Coupons</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupons Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Coupons List
                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaldemo3" style="float: right">Add New</a>
                </h6>

                <!-- LARGE MODAL -->
                <div id="modaldemo3" class="modal fade">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="post" action="{{ route('admin.coupon.store') }}">
                                @csrf
                                <div class="modal-body pd-20">

                                    <div class="form-group">
                                        <label for="coupon_code">Coupon Code</label>
                                        <input type="text" class="form-control" name="coupon" placeholder="Enter coupon code">
                                        @if($errors->has('coupon'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('coupon') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="coupon_code">Coupon Discount (%)</label>
                                        <input type="number" class="form-control" name="discount" placeholder="Enter coupon discount">
                                        @if($errors->has('discount'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('discount') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- modal-dialog -->
                </div><!-- modal -->

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Coupon Code</th>
                            <th class="wd-20p">Coupon Discount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $key=>$coupon)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $coupon->coupon }}</td>
                                <td>{{ $coupon->discount }} %</td>
                                <td>
                                    <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a id="delete" href="{{ route('admin.coupon.delete', $coupon->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection
