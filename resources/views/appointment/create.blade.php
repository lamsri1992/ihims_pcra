@extends('layouts.app')
@section('content')
<style>
    .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 39px !important;
    }

</style>
<div class="row">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <i class="fa-solid fa-calendar-plus"></i>
                            สร้างรายการนัดหมายส่งต่อผู้ป่วย
                        </h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('app.index') }}" class="btn btn-outline-dark btn-sm">
                            <i class="fa-solid fa-arrow-left"></i>
                            กลับ
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="margin-top: -1.5rem;">
                <div class="mb-3">
                    <div class="alert bg-dark text-white">
                        <i class="fa-solid fa-user-circle"></i>
                        ข้อมูลผู้รับบริการ
                    </div>
                </div>
                <form role="form" id="appointment">
                    <div class="row">
                        <div class="col-md-12" hidden>
                            <div class="mb-3">
                                <label for="" class="form-label">HCODE</label>
                                <input type="text" id="hcode" name="hcode" class="form-control"
                                    value="{{ Auth::user()->hospital }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">HN <span class="text-danger">*</span></label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input id="hn" name="hn" type="text" class="form-control"
                                    value="{{ old('hn') }}" placeholder="ระบุหมายเลข HN 9 หลัก">
                                <div class="input-group-text">
                                    <a id="hn_find" type="button" style="font-size: 1rem;">
                                        <small class="text-muted">
                                            <i class="fa-solid fa-search"></i> ค้นหา
                                        </small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">เลข 13 หลัก</label>
                                <input type="text" id="cid" name="cid" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="" class="form-label">คำนำหน้า</label>
                                <input type="text" id="prename" name="prename" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">ชื่อ - สกุล</label>
                                <input type="text" id="patient" name="patient" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">เพศ</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option>ไม่ระบุ</option>
                                    <option value="1">ชาย</option>
                                    <option value="2">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">วัน / เดือน / ปี (เกิด)</label>
                                <input type="text" id="dob" name="dob" class="flatpickr_date form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">หมู่เลือด</label>
                                <input type="text" id="blood" name="blood" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">เบอร์โทร</label>
                                <input type="text" id="tel" name="tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">ผู้ติดต่อ</label>
                                <input type="text" id="contact" name="contact" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="form-label">เบอร์โทรผู้ติดต่อ</label>
                                <input type="text" id="contact_tel" name="contact_tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">ประวัติการแพ้ยา</label>
                                <input type="text" id="allergic" name="allergic" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">โรคประจำตัว</label>
                                <input type="text" id="underlying" name="underlying" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="alert bg-dark text-white">
                                <i class="fa-solid fa-share-from-square"></i>
                                ข้อมูลการนัดหมายส่งต่อ
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">หมายเหตุการส่งต่อ</label>
                                <input type="text" name="note" class="form-control" placeholder="กรุณาระบุหมายเหตุ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">ประเภทการส่งต่อ</label>
                                <select name="type" class="form-select">
                                    <option value="">-- กรุณาเลือก --</option>
                                    <option value="OP">ส่งตัวผู้ป่วยนอก</option>
                                    <option value="ER">ส่งตัวผู้ป่วยฉุกเฉิน</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ส่งต่อไปยังหน่วยบริการ</label>
                            <select name="hmain" class="form-select" @disabled(true)>
                                <option value="{{ $hospital->hmain }}">
                                    {{ $hospital->hmain_name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">รายการคลินิก / บริการ</label> <br>
                            <select id="select_plan" name="service_plan" class="basic-single">
                                <option value="">-- กรุณาเลือก --</option>
                                @foreach($service as $res)
                                    <option value="{{ $res->ser_id }}">
                                        {{ $res->ser_name." : เปิดให้บริการทุก ".$res->ser_show_daily." (".$res->ser_quota." เคส)" }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <br>
                            <input id="service_id" type="text" hidden>
                            </button>
                            <button type="button" id="btn_create" class="btn btn-success">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                สร้างรายการนัดหมาย
                            </button>
                        </div>
                        <div class="col-md-6">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script>
    $('#hn_find').click(function () {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        var hcode = document.getElementById("hcode").value;
        var hn = document.getElementById("hn").value;

        Swal.fire({
            title: 'กำลังค้นหาข้อมูล',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
            },
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {}
        })

        $.ajax({
            url: "https://exp.cmhis.org/query/person_by_hn/05865?hn=" + hn + "",
            type: "GET",
            data: {
                _token: csrfToken,
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('#cid').val(response[0].idcard);
                $('#prename').val(response[0].prename);
                $('#patient').val(response[0].fname + ' ' + response[0].lname);
                $('#gender').val(response[0].sex).trigger('change');
                $('#dob').val(response[0].birth);
                $('#blood').val(response[0].bloodgroup);
                $('#tel').val(response[0].telephoneperson);
                $('#contact').val(response[0].messengername);
                $('#contact_tel').val(response[0].messengertel);
                $('#allergic').val(response[0].allergic);
                $('#uderlying').val(response[0].persondisease);
                Swal.fire({
                    icon: 'success',
                    title: 'พบข้อมูล HN: ' + hn,
                    text: response[0].prename + response[0].fname + " " + response[0].lname,
                    showConfirmButton: false,
                    timer: 2000
                })
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown)
            }
        });
    });

    function getFormValues(form) {
        const values = {};
        for (const element of form.elements) {
            const fieldName = element.name;
            const fieldValue = element.value;

            if (fieldName.endsWith('[]')) {
                values[fieldName] = values[fieldName] ? [...values[fieldName], fieldValue] : [fieldValue];
            } else {
                values[fieldName] = fieldValue;
            }
        }
        return values;
    }

    $('#btn_create').click(function () {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
        const service = document.getElementById('select_plan').value;
        const text = $("#select_plan option:selected").text();
        const appointment = document.getElementById('appointment');
        const formValues = getFormValues(appointment);

        Swal.fire({
            title: "กรุณาเลือกวันที่นัดหมาย",
            text: text,
        })

        var id = document.getElementById('service_id').value = service;
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'th',
            displayEventTime: false,
            hiddenDays: [0, 6],
            selectable: true,
            eventSources: [{
                url: 'https://exp.cmhis.org/query/holiday/11125',
                color: 'red',
                textColor: 'white'
            }],
            select: function (info) {
                $.ajax({
                    url: '/api/service/' + id + ',' + info.startStr,
                    type: "GET",
                    data: {
                        _token: csrfToken,
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        var thaiDateBE = moment(info.startStr).add(543, 'years').format('DD/MM/YYYY');
                        Swal.fire({
                            icon: 'warning',
                            title: 'วันที่ ' + thaiDateBE + ' มีนัดหมาย ' + response[0].number + ' เคส',
                            text: text,
                            width: '50%',
                            showCancelButton: true,
                            confirmButtonText: "ยืนยันการนัดหมาย",
                            cancelButtonText: "ยกเลิก",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Validate Check And Insert Data
                                var date_app = info.startStr;
                                $.ajax({
                                    url: '/appointment/create/store',
                                    type: "GET",
                                    data: {
                                        formValues: formValues,
                                        date_app: date_app,
                                    },
                                    success: function (response) {
                                        var thaiDateBE = moment(info.startStr).add(543, 'years').format('DD/MM/YYYY');
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'วันที่ ' + thaiDateBE + ' มีนัดหมาย ' + response[0].number + ' เคส',
                                            text: text,
                                            width: '50%',
                                            showCancelButton: true,
                                            confirmButtonText: "ยืนยันการนัดหมาย",
                                            cancelButtonText: "ยกเลิก",
                                        })
                                    }
                                });
                            } else if (result.isDenied) {
                                // Ignore
                            }
                        });
                    }
                });
            },
        });
        calendar.render();
    });

</script>
@endsection
