@extends('commonmodule::layouts.master')
@section('title')
بيانات الموقع
@endsection
@section('page_header')
بيانات الموقع
@endsection

@section('content')

        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">بيانات الموقع</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create1" role="form" action="{{url('dashboard/config')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="row">

                    @foreach($configs as $key)
                    @if($key->config_category_id !== 1)
                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{$key->name}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="ar[value][{{$key->key}}]" multiple value="{{$key->translate('ar')->value}}" placeholder="{{$key->name}}">
                            @error('ar[value]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if($key->config_category_id==1)
                    @if($key->key=='about' || $key->key=='privacy' || $key->key=='refund' || $key->key=='shipping' || $key->key=='about_bank')
                    <div class="form-group col-md-6">
                            <label class="form-control-label">{{$key->translate('ar')->name}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child "  name="ar[value][{{$key->key}}]" multiple  >{{$key->translate('ar')->value}}</textarea>
                            @error('ar[value]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{$key->translate('en')->name}}: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tab-child "  name="en[value][{{$key->key}}]" multiple > {{$key->translate('en')->value}}</textarea>
                            @error('en[value]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @else
                    <div class="form-group col-md-6">
                            <label class="form-control-label">{{$key->translate('ar')->name}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="ar[value][{{$key->key}}]" multiple value="{{$key->translate('ar')->value}}" placeholder="{{$key->translate('ar')->name}}">
                            @error('ar[value]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-control-label">{{$key->translate('en')->name}}: <span class="tx-danger">*</span></label>
                            <input class="form-control tab-child " type="text" name="en[value][{{$key->key}}]" multiple value="{{$key->translate('en')->value}}" placeholder="{{$key->translate('en')->name}}">
                            @error('en[value]')
                                <div style="background:transparent;margin:0;padding:0" class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif  
                    @endif
                    @endforeach
                



                    </div>


                    </div>
                    <!-- /.card-body -->
                    @can('update بيانات الموقع')
                    <div class="card-footer">
                        <button type="button" onclick='submitform()' class="btn btn-info">{{__('commonmodule::form.save')}}</button>
                        <a class="btn btn-secondary"  href="{{url('dashboard/admin')}}">{{__('commonmodule::form.cancel')}}</a>
                    </div>
                    @endcan
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
