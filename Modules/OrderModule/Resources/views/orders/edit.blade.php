@extends('commonmodule::layouts.master')
@section('title')
تعديل كوبون
@endsection
@section('page_header')
تعديل كوبون
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">تعديل كوبون</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{route('coupon.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                    <div class="row">
                     <div class="form-group col-md-6">
                            <label class="form-control-label">الكود: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="code" value="{{$item->code}}" placeholder="الكود">
                            @error('code')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-6">
                            <label class="form-control-label">النوع: <span class="tx-danger">*</span></label>
                            <select name="type" class="form-control select2" data-placeholder="Choose Browser" >
                          
                                <option {{$item->type=='percentage'?'selected':''}} value="percentage">percentage</option>
                                <option {{$item->type=='value'?'selected':''}}  value="value">value</option>
                              
                            </select>
                            @error('cat_type')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                 

                        <div class="form-group col-md-6">
                            <label class="form-control-label">القيمة: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="value" value="{{$item->value}}" placeholder="القيمة">
                            @error('value')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-control-label">من: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="date" name="date_from" value="{{$item->date_from}}" >
                            @error('date_from')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">الى: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="date" name="date_to" value="{{$item->date_to}}" >
                            @error('date_to')
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


      $(function(){

        'use strict';

        $( '.inputfile' ).each( function()
        {
          var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

          $input.on( 'change', function( e )
          {
            var fileName = '';

            if( this.files && this.files.length > 1 )
              fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
              fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
              $label.find( 'span' ).html( fileName );
            else
              $label.html( labelVal );
          });

          // Firefox bug fix
          $input
          .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
          .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
        });

      });
   

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
