@extends('commonmodule::layouts.master')
@section('title')
    تفاصيل الطلب
@endsection
@section('page_header')
    تفاصيل الطلب
@endsection

@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">تفاصيل الطلب</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="br-pagebody">
                <div class="br-section-wrapper">

                <h3 class="card-title">بيانات العميل</h3>
                <table class="mt-5 table table-bordered table-colored table-primary">
                        <thead>
                            <tr>

                                <th class="wd-35p">الاسم</th>
                                <th class="wd-35p">الايميل</th>
                                <th class="wd-20p">التلفون</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                           
                                <tr>
                                  
                                    <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->user->phone }}</td>
                             </tr>
                           

                        </tbody>
                    </table>

                    <h3 class="card-title"> المنتجات</h3>
                    <table class="mt-5 table table-bordered table-colored table-warning">
                        <thead>
                            <tr>

                                <th class="wd-35p">اسم المنتج</th>
                                <th class="wd-35p">الكمية</th>
                                <th class="wd-20p">السعر</th>
                               <th class="wd-20p">القيمة المضافة</th>
                                <th class="wd-20p">الخصم</th>
                                <th class="wd-20p">الاجمالى</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order->orderProduct as $key)
                                <tr>
                                  
                                    <td>{{ $key->product->name??'' }}</td>
                                    <td>{{ $key->quantity }}</td>
                                    <td>{{ $key->price }}</td>
                                    <td>{{ $key->vat }}</td>
                                    <td>{{ $key->discount }}</td>
                                    
                                    <td>{{ ($key->quantity * $key->price)+ $key->vat - ($key->discount*$key->quantity) }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="form-layout form-layout-2">
                    <h3 class="card-title"> تفاصيل الطلب</h3>
                        <div class="row no-gutters">
                        
                            <div class="col-md-3 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">الاجمالى قبل الخصم: <span
                                            class="tx-danger">*</span></label>
                                    <p>{{ $order->subTotal }}</p>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-3 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">الخصم: <span class="tx-danger">*</span></label>
                                    <p>{{ $order->discount }}</p>
                                    
                                   
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-md-3 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                   
                                    
                                    <label class="form-control-label">الشحن: <span class="tx-danger">*</span></label>
                                    <p>{{ $order->shipping }}</p>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-3 mg-t--1 mg-md-t-0">
                                <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">الاجمالى  : <span
                                            class="tx-danger">*</span></label>
                                    <p>{{ $order->total }}</p>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-md-8">
                                <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">العنوان: <span class="tx-danger">*</span></label>
                                    <p>{{ $order->address->city->name??'' }}</p>
                                    <p>{{ $order->address->street??'' }}</p>
                                    <p>{{ $order->address->description??'' }}</p>
                                    <p>{{ $order->address?($order->address->type == 1 ? 'home' : 'work'):'' }}</p>
                                    
                                    <p><a target="_blank" href="http://maps.google.com/maps?q=loc:{{$order->address->lat}},{{$order->address->long}}">الذهاب للموقع على الخريطة</a></p>
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-md-4">
                                <div class="form-group mg-md-l--1 bd-t-0-force">
                                    <label class="form-control-label mg-b-0-force">طريقة الدفع: <span
                                            class="tx-danger">*</span></label>
                                    <p>{{ $order->payment }}</p>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                    </div><!-- form-layout -->

                   

                      @if ($order->order_status_type_id == 1)
                          <form action="{{ url('dashboard/update_order_status') }}" method="post">
                            @csrf
                          <input type="hidden" name="order_id" value="{{$order->id}}">
                            <div class="form-group col-md-3">
                                <label class="form-control-label"> الحالة: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="order_status_id">
                                    @foreach ($statuses as $key)
                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                    @endforeach
                                </select>
                                @error('order_status_id')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label"> ملاحظات: <span class="tx-danger">*</span></label>
                                <input type="text" name="comment" class="form-control">
                                @error('comment')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">تحديث</button>

                            </div>
                        </form>

                      @endif
                        <br>

                        <table class="mt-5 table table-bordered table-colored table-warning">
                          <thead>
                              <tr>
  
                                  <th>الحالة</th>
                                  <th>الملاحظات</th>
                                  <th>التاريخ</th>
                                
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($order->orderHistory as $key)
                                  <tr>
                                      <td>{{ $key->status->name }}</td>
                                      <td>{{ $key->comment }}</td>
                                      <td>{{ date('Y-m-d :h:i:s', strtotime($key->created_at)) }}</td>
                                  </tr>
                              @endforeach
  
                          </tbody>
                      </table>

                </div><!-- br-section-wrapper -->

            </div>


        </div>
        <!-- /.card -->

    </div>


@endsection

@section('js')
    <script>
        $(function() {

            'use strict';

            $('.inputfile').each(function() {
                var $input = $(this),
                    $label = $input.next('label'),
                    labelVal = $label.html();

                $input.on('change', function(e) {
                    var fileName = '';

                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace(
                            '{count}', this.files.length);
                    else if (e.target.value)
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        $label.find('span').html(fileName);
                    else
                        $label.html(labelVal);
                });

                // Firefox bug fix
                $input
                    .on('focus', function() {
                        $input.addClass('has-focus');
                    })
                    .on('blur', function() {
                        $input.removeClass('has-focus');
                    });
            });

        });


        function submitform() {
            var check = validate();
            if (check == true) {
                $('#create1').submit();
            }
        }


        $('input,textarea').keyup(function(event) {
            $(this).css('border', "1px solid green");
        });

        $('input,select').change(function(event) {
            $(this).css('border', "1px solid green");
        });


        function validate() {
            var x, y, i, check = true;
            x = document.getElementsByClassName("tab-child");
            console.log($(x[1]).val().length);
            for (i = 0; i < x.length; i++) {
                if ($(x[i]).val().length == 0) {
                    $(x[i]).css("border", "1px solid red");
                    check = false
                }
            }

            return check;

        }

    </script>
@endsection
