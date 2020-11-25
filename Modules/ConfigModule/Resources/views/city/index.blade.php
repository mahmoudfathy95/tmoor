@extends('commonmodule::layouts.master')

@section('title')
المدن
@endsection

@section('page_header')
المدن
@endsection

@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">المدن</h6>
                </div>

                @can('create المدن')
                <div class="col-lg-6">
                    <a href="{{route('city.create')}}" class="btn btn-primary {{\App::getLocale()=='en'?'float-right':'float-left'}}">اضافة مدينة</a>
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
                            <th>{{__('adminmodule::admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $index=>$key)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$key->name}}</td>
                                <td>

                                @can('delete المدن')
                                    <form action="{{route('city.destroy',$key->id)}}" method="post" id="deleteForm{{$key->id}}" class=" d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="button" onclick="confirmDelete('{{$key->id}}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                    @can('update المدن')
                                    <a href="{{route('city.edit',$key->id)}}" class="btn btn-success btn-sm">
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
