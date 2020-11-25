@extends('adminmodule::layouts.master')
@section('title')
    {{__('adminmodule::managers.edit_permission')}}
@endsection
@section('page_header')
    {{__('adminmodule::managers.edit_permission')}}
@endsection

@section('content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">{{__('adminmodule::managers.create_permission')}}</h6>
            <div class="form-layout form-layout-1">
                <form action="{{url('dashboard/permissions/'.$permission->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row mg-b-25">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">{{__('adminmodule::main.name')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{$permission->name}}" placeholder="{{__('adminmodule::main.name')}}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">{{__('adminmodule::main.title')}}: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title" value="{{$permission->title}}" placeholder="{{__('adminmodule::main.title')}}">
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info">{{__('adminmodule::main.save')}}</button>
                        <a class="btn btn-secondary" href="{{url('dashboard/permissions')}}">{{__('adminmodule::main.cancel')}}</a>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div><!-- br-section-wrapper -->
    </div>

@endsection
