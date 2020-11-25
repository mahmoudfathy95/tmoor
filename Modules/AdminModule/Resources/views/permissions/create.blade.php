@extends('adminmodule::layouts.master')
@section('title')
    {{__('adminmodule::managers.create_permission')}}
@endsection
@section('page_header')
    {{__('adminmodule::managers.create_permission')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('adminmodule::managers.create_permission')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{url('dashboard/permissions')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label">{{__('adminmodule::main.name')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="{{__('adminmodule::main.name')}}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">{{__('adminmodule::main.title')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="{{__('adminmodule::main.title')}}">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button class="btn btn-info">{{__('adminmodule::main.save')}}</button>
                        <a class="btn btn-secondary"  href="{{url('dashboard/permissions')}}">{{__('adminmodule::main.cancel')}}</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
