@extends('commonmodule::layouts.master')

@section('title')
{{__('commonmodule::sidebar.users')}}
@endsection

@section('page_header')
{{__('commonmodule::sidebar.users')}}
@endsection

@section('content')

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="br-section-label">{{__('commonmodule::sidebar.users')}}</h6>
                </div>

                

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
                            <th>التليفون</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $index=>$key)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$key->first_name}}</td>
                                <td>{{$key->email}}</td>
                                <td>{{$key->phone}}</td>
                               
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
