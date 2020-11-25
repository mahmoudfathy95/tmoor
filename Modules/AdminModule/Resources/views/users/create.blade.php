@extends('commonmodule::layouts.master')
@section('title')
    {{__('adminmodule::admin.create_user')}}
@endsection
@section('page_header')
    {{__('adminmodule::admin.create_user')}}
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('adminmodule::admin.create_user')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{url('dashboard/user')}}" method="post">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                     <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.name')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="name" value="{{old('name')}}" placeholder="{{__('commonmodule::form.name')}}">
                            @error('name')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.email')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="email" name="email" value="{{old('email')}}" placeholder="{{__('commonmodule::form.email')}}">
                            @error('email')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.password')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="password" name="password" value="{{old('password')}}" placeholder="{{__('commonmodule::form.password')}}">
                            @error('password')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::sidebar.bankknowledge')}}: <span class="tx-danger">*</span></label>
                            <select class="form-control tab-child" name="bank_id">
                                <option selected disabled>{{__('commonmodule::form.choocebank')}}</option>
                                @foreach($banks as $key)
                                    <option value="{{$key->id}}">{{$key->title}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" onclick='submitform()' class="btn btn-info">{{__('commonmodule::form.save')}}</button>
                        <a class="btn btn-secondary"  href="{{url('dashboard/user')}}">{{__('commonmodule::form.cancel')}}</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>


@endsection

@section('js')
<script>

function submitform()
{
    var check = validate();
    if(check==true)
    {
       $('#create1').submit();
    }
}


$('input,textarea').keyup(function(event){
   $(this).css('border',"1px solid green");
});

$('input,select').change(function(event){
   $(this).css('border',"1px solid green");
});


function validate()
{
   var x,y,i,check=true;
    x = document.getElementsByClassName("tab-child");
   console.log($(x[1]).val().length);
   for (i = 0; i < x.length; i++)
   {
     if($(x[i]).val().length==0)
     {
      $(x[i]).css("border","1px solid red");
      check=false
     }
   }

   return check;

}
</script>
@endsection
