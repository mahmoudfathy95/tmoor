@extends('commonmodule::layouts.master')

@section('title')
    {{__('adminmodule::admin.managers')}}
@endsection

@section('page_header')
    {{__('adminmodule::admin.managers')}}
@endsection

@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">{{__('adminmodule::admin.managers')}}</h6>
                </div>
                @can('create مسؤولى النظام')
                <div class="col-lg-6">
                    <a href="{{route('admin.create')}}" class="btn btn-primary {{\App::getLocale()=='en'?'float-right':'float-left'}}">{{__('adminmodule::admin.create_admin')}}</a>
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
                            <th>{{__('adminmodule::admin.name')}}</th>
                            <th>{{__('adminmodule::admin.email')}}</th>
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $index=>$key)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->email}}</td>
                                <td>

                                @can('delete مسؤولى النظام')
                                    <form action="{{route('admin.destroy',$key->id)}}" method="post" id="deleteForm{{$key->id}}" class=" d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('{{$key->id}}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                 @endcan
                                   @can('update مسؤولى النظام')
                                    <a href="{{route('admin.edit',$key->id)}}" class="btn btn-success btn-sm">
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
    <script>


        function confirmDelete(id){
            Swal.fire({
                title: 'تحذير بالحذف!',
                text: "هل تريد حذف هذا المسؤول؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'لا',
            }).then((result) => {
                if (result.value) {
                    $('#deleteForm'+id).submit();
                }
            })
            return false
        }

    </script>

@endsection
