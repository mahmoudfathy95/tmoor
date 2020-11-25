@extends('commonmodule::layouts.master')

@section('title')
حالات الطلب
@endsection

@section('page_header')
حالات الطلب
@endsection

@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">حالات الطلب</h6>
                </div>
                @can('create حالات الطلب')
                <div class="col-lg-6">
                    <a href="{{route('order_status.create')}}" class="btn btn-primary {{\App::getLocale()=='en'?'float-right':'float-left'}}">اضافة حالة</a>
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
                            <th>نوع الحالة</th>
                            <th>{{__('adminmodule::admin.name')}}</th>
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_statuses as $index=>$key)
                            <tr>
                                <td>{{$index+1}}</td>
                            <th>{{$key->orderStatusType->name}}</th>
                                <td>{{$key->name}}</td>
                                <td>
                                @can('delete حالات الطلب')
                                    <form action="{{route('order_status.destroy',$key->id)}}" method="post" id="deleteForm{{$key->id}}" class=" d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('{{$key->id}}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @can('delete حالات الطلب')
                                    @can('update حالات الطلب')
                                    <a href="{{route('order_status.edit',$key->id)}}" class="btn btn-success btn-sm">
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
                text: "هل تريد حذف هذه الحالة؟",
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
