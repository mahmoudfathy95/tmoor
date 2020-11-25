@extends('commonmodule::layouts.master')
@section('title')
    {{__('adminmodule::admin.update_admin')}}
@endsection
@section('page_header')
    {{__('adminmodule::admin.update_admin')}}
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('adminmodule::admin.update_admin')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="update" role="form" action="{{route('admin.update',$admin->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                    <div class="row">
                     <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.name')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="name" value="{{isset($admin->name)?$admin->name:''}}">
                            @error('name')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.email')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="email" name="email" value="{{isset($admin->email)?$admin->email:''}}" placeholder="{{__('commonmodule::form.email')}}">
                            @error('email')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('commonmodule::form.password')}}: <span class="tx-danger"></span></label>
                            <input class="form-control" type="password" name="password" value="" placeholder="{{__('commonmodule::form.password')}}">
                            @error('password')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('adminmodule::admin.roles')}}: <span class="tx-danger">*</span></label>
                            <select class="form-control tab-child" name="role_id">
                                <option disabled>{{__('commonmodule::form.choocegroup')}}</option>
                                @foreach($roles as $key)
                                    <option value="{{$key->id}}" {{($admin->hasRole($key))?'selected':''}}>{{$key->name}}</option>
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
                        <a class="btn btn-secondary"  href="{{url('dashboard/admin')}}">{{__('commonmodule::form.cancel')}}</a>
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
       $('#update').submit();
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
