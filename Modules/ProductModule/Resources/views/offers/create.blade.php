@extends('commonmodule::layouts.master')
@section('title')
اضافة عرض
@endsection
@section('page_header')
اضافة عرض
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">اضافة عرض</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{url('dashboard/offers')}}" method="post" enctype="multipart/form-data">
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
                            <label class="form-control-label">منتجات العرض: <span class="tx-danger">*</span></label>
                            <select name="products[]" class="form-control select2" data-placeholder="Choose Browser" multiple="multiple">
                                @foreach($products as $key)
                                <option value="{{$key->id}}">{{$key->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label class="form-control-label">من: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="date" name="date_from" value="{{old('date_from')}}" placeholder="من">
                            @error('date_from')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group col-md-6">
                            <label class="form-control-label">الى: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="date" name="date_to" value="{{old('date_to')}}" placeholder="الى">
                            @error('date_to')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                      

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.price')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="number" min="0" name="price" value="0" placeholder="{{__('productmodule::category.price')}}">
                            @error('price')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                  
                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.desc_ar')}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child " type="text" name="ar[description]" value="{{old('ar[description]')}}" >{{__('productmodule::category.desc_ar')}}</textarea>
                            @error('ar[description]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.desc_en')}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child" type="text" name="en[description]" value="{{old('en[description]')}}" >{{__('productmodule::category.desc_en')}}</textarea>
                            @error('en[description]')
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
