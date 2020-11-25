@extends('commonmodule::layouts.master')

@section('title')
    {{__('adminmodule::admin.roles')}}
@endsection

@section('page_header')
    {{__('adminmodule::admin.roles')}}
@endsection
@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">{{__('adminmodule::admin.roles')}}</h6>
                </div>
                @can('create مجموعة المستخدمين')
                <div class="col-lg-6">
                    <a href="{{route('roles.create')}}" class="btn btn-primary {{\App::getLocale()=='en'?'float-right':'float-left'}}">{{__('adminmodule::admin.create_role')}}</a>
                </div>
                @endcan

            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="datatable1" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('adminmodule::admin.group')}}</th>
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $index=>$key)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$key->name}}</td>
                                <td>

                                @can('delete مجموعة المستخدمين')
                                    <form action="{{route('roles.destroy',$key->id)}}" method="post" class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                               @can('update مجموعة المستخدمين')
                                    <a href="{{route('roles.edit',$key->id)}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan


                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
    </div>
@endsection


@section('js')


@endsection
