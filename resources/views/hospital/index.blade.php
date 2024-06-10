@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">
                    ตั้งค่าหน่วยบริการ : {{ Auth::user()->name }}
                </h6>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="service-tab" data-bs-toggle="tab" 
                            data-bs-target="#service-tab-pane" type="button" role="tab" 
                            aria-controls="service-tab-pane" aria-selected="true">
                            <i class="fa-regular fa-calendar-check"></i>
                            คลินิกที่ให้บริการ
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hossub-tab" data-bs-toggle="tab" 
                            data-bs-target="#hossub-tab-pane" type="button" role="tab" 
                            aria-controls="hossub-tab-pane" aria-selected="false">
                            <i class="fa-solid fa-house-chimney-medical"></i>
                            รพ.สต.ลูกข่าย
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="users-tab" data-bs-toggle="tab" 
                            data-bs-target="#users-tab-pane" type="button" role="tab" 
                            aria-controls="users-tab-pane" aria-selected="false">
                            <i class="fa-solid fa-user-plus"></i>
                            กำหนดผู้ใช้งาน
                        </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="service-tab-pane" role="tabpanel" aria-labelledby="service-tab" tabindex="0">
                        <table class="class-table display" width="100%">
                            <thead>
                                <tr>
                                    <th>ชื่อคลินิก / บริการ</th>
                                    <th class="">วันที่เปิดให้บริการ</th>
                                    <th class="text-center">เวลาที่เปิดให้บริการ</th>
                                    <th class="text-center">จำนวนเปิดรับ</th>
                                    <th class="text-center"><i class="fa-solid fa-bars"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $res)
                                <tr>
                                    <td>{{ $res->ser_name }}</td>
                                    <td class="">{{ $res->ser_show_daily }}</td>
                                    <td class="text-center">{{ $res->ser_time }}</td>
                                    <td class="text-center">{{ $res->ser_quota }}</td>
                                    <td class="text-center">
                                        <a href="#" class="badge bg-primary">
                                            <i class="fa-solid fa-search"></i>
                                            รายละเอียด
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="hossub-tab-pane" role="tabpanel" aria-labelledby="hossub-tab" tabindex="0">
                        <table class="class-table display" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">รหัสหน่วยบริการ</th>
                                    <th class="text-center">ชื่อหน่วยบริการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subhos as $res)
                                <tr>
                                    <td class="text-center">{{ $res->hsub }}</td>
                                    <td class="text-center">{{ $res->hsub_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="users-tab-pane" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
