@extends('commonmodule::layouts.master')
@section('title')
    {{__('adminmodule::admin.create_role')}}
@endsection
@section('page_header')
    {{__('adminmodule::admin.create_role')}}
@endsection

@section('content')
    <div class="br-pagebody">
        <div class="br-section-wrapper">

            <h6 class="br-section-label">{{__('adminmodule::admin.create_role')}}</h6>

            <div class="form-layout form-layout-1">
                <form action="{{route('roles.store')}}" method="post">
                    @csrf
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">{{__('adminmodule::admin.name')}} <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="" >
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>{{__('adminmodule::admin.permissions')}}</td>
                                <td>{{__('adminmodule::admin.show')}}</td>
                                <td>{{__('adminmodule::admin.create')}}</td>
                                <td>{{__('adminmodule::admin.update')}}</td>
                                <td>{{__('adminmodule::admin.delete')}}</td>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($permissionGroups as $key=>$permissions)
                                <tr>
                                    <td>{{$key}}</td>

                                    @foreach($permissions as $key=>$permission)
                                        <td>
                                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- row -->


                <div class="form-layout-footer">
                    <button class="btn btn-info" type="submit">{{__('commonmodule::form.save')}}</button>
                    <a class="btn btn-secondary" href="{{route('roles.index')}}">{{__('commonmodule::form.cancel')}}</a>
                </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->

        </div><!-- br-section-wrapper -->
    </div>

    @endsection
