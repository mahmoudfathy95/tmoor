@extends('commonmodule::layouts.master')

@section('title')
{{__('adminmodule::admin.permissions')}}
@endsection

@section('page_header')
    {{__('adminmodule::admin.permissions')}}
@endsection
@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">{{__('adminmodule::admin.permissions')}}</h6>
                </div>
                <div class="col-lg-6">
                    <a href="#" class="btn btn-primary {{\App::getLocale()=='en'?'float-right':'float-left'}}" data-toggle="modal" data-target="#createModal">{{__('adminmodule::admin.create_permission')}}</a>
                </div>
            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="datatable1" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>{{__('adminmodule::admin.group')}}</th>
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $key=>$permissions)
                            <tr>
                                <td>{{$key}}</td>
                                <td>
                                    <form action="{{route('permissions.destroy',$key)}}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
{{--                                    <a href="{{route('permissions.edit',$key)}}" class="btn btn-success btn-sm">--}}
{{--                                        <i class="fas fa-edit"></i>--}}
{{--                                    </a>--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('adminmodule::admin.create_permission')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('permissions.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-layout form-layout-1">
                            <div class="row mg-b-25">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">{{__('adminmodule::admin.group')}} <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="title" value="" required>
                                    </div>
                                </div><!-- col-4 -->
                            </div><!-- row -->
                        </div><!-- form-layout -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('commonmodule::form.cancel')}}</button>
                        <button class="btn btn-info" type="submit">{{__('commonmodule::form.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('js')

@endsection
