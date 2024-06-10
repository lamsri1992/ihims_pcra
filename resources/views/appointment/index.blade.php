@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-capitalize">
                            รายการนัดหมายส่งต่อผู้ป่วย
                        </h6>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('app.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-plus-circle"></i>
                            สร้างรายการนัดหมาย
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Table Limit 100</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
