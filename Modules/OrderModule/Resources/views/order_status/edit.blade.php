@extends('commonmodule::layouts.master')
@section('title')
تعديل حالة طلب
@endsection
@section('page_header')
تعديل حالة طلب
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل حالة طلب</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{route('order_status.update',$status->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="form-control-label">نوع الحالة: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="order_status_type_id">
                                @foreach($types as $key)
                                    <option value="{{$key->id}}" {{($key->id == $status->order_status_type_id)?'selected':''}}>{{$key->name}}</option>
                                @endforeach
                            </select>
                            @error('order_status_type_id')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     <div class="form-group col-md-3">
                            <label class="form-control-label">الاسم بالعربية: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="ar[name]" value="{{$status->translate('ar')->name}}" placeholder="">
                            @error('ar[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    

                        <div class="form-group col-md-3">
                            <label class="form-control-label">الاسم بالنجليزي: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="en[name]" value="{{$status->translate('en')->name}}" placeholder="">
                            @error('en[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    

                    </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" onclick='submitform()' class="btn btn-info">{{__('commonmodule::form.save')}}</button>
                        <a class="btn btn-secondary"  href="{{route('order_status.index')}}">{{__('commonmodule::form.cancel')}}</a>
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
