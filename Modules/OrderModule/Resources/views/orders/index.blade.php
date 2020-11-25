@extends('commonmodule::layouts.master')

@section('title')
الطلبات
@endsection

@section('page_header')
الطلبات
@endsection

@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">الطلبات</h6>
                </div>

                

            </div>
            <br>


            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="datatable1" class="table   dataTable collapsed" >
                        <thead>
                        <tr>
                            <th>الرقم التسلسى</th>
                            <th>الاسم</th>
                            <th>التلفون</th>
                            <th>المدينة</th>
                            <th>حالة الطلب</th>
                            <th>تاريخ الطلب</th>
                            <th>الاجمالى بعد الخصم</th>
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $index=>$key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->user->first_name}}</td>
                                <td>{{$key->user->phone}}</td>
                                <td>{{$key->city}}</td>
                                <td>{{$key->orderstatus->name}}</td>
                                <td>{{$key->created_at->format('Y-m-d')}}</td>
                                <td>{{$key->total}}</td>
                                <td>

                                @can('delete الطلبات المفتوحة')
                                   <form action="{{route('orders.destroy',$key->id)}}" method="post" id="deleteForm{{$key->id}}" class=" d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('{{$key->id}}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form> 
                                    @endcan
                                    <a href="{{route('orders.show',$key->id)}}" class="btn btn-success btn-sm">
                                    <i class="fas fa-shopping-basket"></i>
                                    </a>
                                    <a target="_blank" href="{{route('print',$key->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-print"></i>
                                    </a>


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
                text: "هل تريد حذف هذا القسم؟",
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
