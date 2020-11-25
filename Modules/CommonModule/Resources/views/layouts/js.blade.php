<script src="{{asset('assets/admin/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{asset('assets/admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/rickshaw/vendor/d3.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/rickshaw/vendor/d3.layout.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/admin/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/admin/lib/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/select2/js/select2.full.min.js')}}"></script>
{{--<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>--}}
<script src="{{asset('assets/admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js')}}"></script>

<script src="{{asset('assets/admin/lib/highlightjs/highlight.pack.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/timepicker/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/spectrum-colorpicker/spectrum.js')}}"></script>
<script src="{{asset('assets/admin/lib/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{asset('assets/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('assets/admin/lib/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

<script src="{{asset('assets/admin/lib/jquery-steps/build/jquery.steps.min.js')}}"></script>



<script src="{{asset('assets/admin/lib/gmaps/gmaps.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bracket.js')}}"></script>
<script src="{{asset('assets/admin/js/map.shiftworker.js')}}"></script>
<script src="{{asset('assets/admin/js/ResizeSensor.js')}}"></script>
<script src="{{asset('assets/admin/js/ckeditor.js')}}"></script>
<script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('assets/admin/js/parsley.min.js')}}"></script>

@if(Session::has('success'))
<script>
   Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{ Session::get('success') }}',
                        showConfirmButton: false,
                        timer: 1500,
                        onAfterClose:function(){
                            location.reload();
                        }
                    })
</script>

@endif

@if(Session::has('error'))
<script>
   Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '{{ Session::get('error') }}',
                        showConfirmButton: false,
                        timer: 1500,
                        onAfterClose:function(){
                            location.reload();
                        }
                    })
</script>

@endif

<script>

    CKEDITOR.replace( 'details_ar' );
    CKEDITOR.replace( 'details_en' );


    $('#type').on('change',function () {
        var administration_id = $('#academic_administration_id').val();
        $('#education_office_id').html("<option selected disabled>{{__('schoolmodule::admin.choose_office')}}</option>");
        $.ajax({
            type:'get',
            url:"{{url('dashboard/getOffices')}}",
            data:{'academic_administration_id':administration_id,'type':this.value},
            success:function (response) {
                if(response.code == 200){
                    $.map(response.data, (item)=>{
                        $('#education_office_id').append('<option value="'+item.id+'">'+item.name+'</opttion>')
                    });

                }
            }
        });
    });


    $('#academic_level_id').on('change', function () {
        $('#academic_year_id').html("<option selected disabled>إختر الصف الدراسي</option>");
        $.ajax({
            type:'get',
            url:"{{url('dashboard/academic_years')}}/"+this.value,
            success:function (response) {
                if(response.code == 200){
                    $.map(response.data, (item)=>{
                        $('#academic_year_id').append('<option value="'+item.id+'">'+item.name+'</opttion>')
                    });

                }
            }
        });
    });

    $('#academic_year_id').on('change', function () {
        $('#subjects_id').html('');
        $.ajax({
            type:'get',
            url:"{{url('dashboard/getSubjects')}}/"+this.value,
            success:function (response) {
                if(response.code == 200){
                    $.map(response.data, (item)=>{
                        $('#subjects_id').append('<input type="checkbox" name="subjects[]" value="'+item.id+'" class="mr-lg-2 ml-lg-1">'+item.name);
                    });

                }
            }
        });
    });


    $('#datatable1').DataTable({
        responsive: false,
        "order": [[ 0, "desc" ]],
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });

    function validate()
        {
            var x,y,i,check=true;
            x = document.getElementsByClassName("tab-child");

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

    $('#create').submit(function(event){
        event.preventDefault();

        var url = $(this).attr('action')

        for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
                }

 var valid = validate();
 if(valid){
    $('.overlay').show();
        $('.overlay').html('<div class="lds-facebook"><div></div><div></div><div></div></div>')
        $.ajax({
            type: 'post',
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                $('.errors').text('');
                if (response.code == 200)
                {
                    $('.overlay').hide();
                    document.getElementById('create').reset();
                    $('#modaldemo8').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.success,
                        showConfirmButton: false,
                        timer: 1500,
                        onAfterClose:function(){
                            location.reload();
                        }
                    })

                } else if (response.code == 400) {
                    $('.overlay').hide();

                    $.each(response.errors, function( index, value ) {


                       $('#'+index).siblings("span").text(value)
                    });
                }
            },error: function()
            {
                console.log(response);

            }
        });
 }


    });




</script>


