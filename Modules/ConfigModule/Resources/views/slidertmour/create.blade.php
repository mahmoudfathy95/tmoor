@extends('commonmodule::layouts.master')
@section('title')
اضافة سليدر
@endsection
@section('page_header')
اضافة سليدر
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اضافة سليدر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{url('dashboard/sliderTmour')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="row">
                     <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.title_ar')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="ar[name]" value="{{old('ar[name]')}}" placeholder="{{__('productmodule::category.title_ar')}}">
                            @error('ar[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    

                 

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.title_en')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="en[name]" value="{{old('en[name]')}}" placeholder="{{__('productmodule::category.title_en')}}">
                            @error('en[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">النوع: <span class="tx-danger">*</span></label>
                            <select name="cat_type" class="form-control select2" data-placeholder="Choose Browser" >
                          
                                <option value="1">اقسام</option>
                                <option value="2">منتجات</option>
                              
                            </select>
                            @error('cat_type')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">المنتجات: <span class="tx-danger">*</span></label>
                            <select name="product" class="form-control select2" data-placeholder="Choose Browser" >
                             @foreach($products as $key)
                                <option value="{{$key->id}}">{{$key->name}}</option>
                              @endforeach
                            </select>
                            @error('cat_type')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">الاقسام: <span class="tx-danger">*</span></label>
                            <select name="category" class="form-control select2" data-placeholder="Choose Browser" >
                             @foreach($categories as $key)
                                <option value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                            </select>
                            @error('cat_type')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="text-center form-group col-md-6">
                        <input type="file" name="img" id="file-3" class="inputfile" data-multiple-caption="{count} files selected" >
                            <label for="file-3" class="if-style-1 if-primary">
                                <div class="icon-wrapper">
                                    <i class="icon ion-ios-upload-outline"></i>
                                </div><!-- icon-wrapper -->
                                <span>Choose main image</span>
                            </label>
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
