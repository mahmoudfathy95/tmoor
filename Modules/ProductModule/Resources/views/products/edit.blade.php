@extends('commonmodule::layouts.master')
@section('title')
{{__('productmodule::category.updateproduct')}}
@endsection
@section('page_header')
{{__('productmodule::category.updateproduct')}}
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('productmodule::category.updateproduct')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{route('products.update',$item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                    <div class="row">
                     <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.title_ar')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="ar[name]" value="{{$item->translate('ar')->name}}" placeholder="{{__('productmodule::category.title_ar')}}">
                            @error('ar[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    

                 

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.title_en')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="text" name="en[name]" value="{{$item->translate('en')->name}}" placeholder="{{__('productmodule::category.title_en')}}">
                            @error('en[name]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.category')}}: <span class="tx-danger">*</span></label>
                            <select class="form-control tab-child"  name="category_id" >
                              @foreach($categories as $key)
                              <option {{$key->id==$item->category_id?'selected':''}} value="{{$key->id}}">{{$key->name}}</option>
                              @endforeach
                            </select>
                            @error('category_id')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.quantity')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="number" min="0" name="quantity" value="{{$item->quantity}}" placeholder="{{__('productmodule::category.quantity')}}">
                            @error('quantity')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.price')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="number" min="0" name="price" value="{{$item->price}}" placeholder="{{__('productmodule::category.price')}}">
                            @error('price')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.discounttype')}}: <span class="tx-danger">*</span></label>
                            <select class="form-control tab-child"  name="type">
                              <option {{isset($item->discount->type)&&$item->discount->type==1?'selected':''}} value="1">value</option>
                              <option {{isset($item->discount->type)&&$item->discount->type==2?'selected':''}} value="2">percentage</option>
                            </select>
                            @error('type')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.discount')}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="number" min="0" name="value" value="{{isset($item->discount)?$item->discount->value:0}}" placeholder="{{__('productmodule::category.discount')}}">
                            @error('value')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                            <div class="form-group col-md-6">
                            <label class="form-control-label">العدد: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child" type="number" min="0" name="number" value="{{$item->number}}" placeholder="العدد">
                            @error('number')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-control-label">وحدة القياس: <span class="tx-danger">*</span></label>
                            <select class="form-control tab-child"   name="measurement_id" >
                            @foreach($measurements as $key)
                            <option {{$key->id==$item->measurement_id?'selected':''}} value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                            </select>
                            @error('measurement_id')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.desc_ar')}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child " type="text" name="ar[description]" value="{{old('ar[description]')}}" >{{$item->translate('ar')->description}}</textarea>
                            @error('ar[description]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{__('productmodule::category.desc_en')}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child" type="text" name="en[description]" >{{$item->translate('en')->description}}</textarea>
                            @error('en[description]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center form-group col-md-6">
                        <input type="file" name="img" id="file-3" class="inputfile" data-multiple-caption="{count} files selected" >
                            <label for="file-3" class="if-style-1 if-primary">
                                <div class="icon-wrapper">
                                <img style="width: 100%;height: 100%;border-radius: 50%;" src="{{asset('images/products').'/'.$item->image}}">
                                </div><!-- icon-wrapper -->
                                <span>Choose main image</span>
                            </label>
                            </div>

                            <div class="text-center form-group col-md-6">
                            <input type="file" name="imgs[]" id="file-4" class="inputfile"
                                  data-multiple-caption="{count} files selected" multiple>
                                <label for="file-4" class="if-style-1 if-primary">
                                  <div class="icon-wrapper">
                                    <i class="icon ion-ios-upload-outline"></i>
                                  </div><!-- icon-wrapper -->
                                  <span>Choose other images</span>
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
