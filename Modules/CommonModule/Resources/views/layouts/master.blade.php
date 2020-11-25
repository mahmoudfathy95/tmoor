
<!DOCTYPE html>

@if(\App::getLocale()=='en')
<html lang="en" dir="ltr" class="ltr">
@else
<html lang="en" dir="rtl" class="rtl">
@endif
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title')</title>

    <!-- vendor css -->
    @include('commonmodule::layouts.css')
      @yield('css')

  </head>

  <body>

 
      
  <div class="overlay">

  </div>


  <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="{{url('/dashboard')}}"><img src="" width="50px"><span> {{__('commonmodule::sidebar.bankknowledge')}}</span></a></div>
    @include('commonmodule::layouts.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('commonmodule::layouts.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>@yield('page_header')</h4>
        </div>
      </div><!-- d-flex -->

      @yield('content')<!-- br-pagebody -->


        @include('commonmodule::layouts.footer')
        @include('commonmodule::layouts.js')
        @include('sweetalert::alert')
        @yield('js')
    </div><!-- br-mainpanel -->

  </body>
</html>
