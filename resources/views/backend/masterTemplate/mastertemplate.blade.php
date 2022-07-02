
<!DOCTYPE html>
<html lang="en">
  <head>
 
    @include('backend.includes.meta')
    <!-- Required meta tags -->
   <!-- MEta Tag Here -->

    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

   <!-- CSS FILE HERE -->
   @include('backend.includes.cssallBackend')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Laravel<i>ProEditio</i><span>]</span></a></div>
    @include('backend.includes.sidebarleft')
    <!-- br-sideleft -->
    
    <!-- ########## END: LEFT PANEL ########## -->
    
    <!-- ########## START: HEAD PANEL ########## -->
    
    @include('backend.includes.headertop')
    <!-- br-header -->
    
    <!-- ########## END: HEAD PANEL ########## -->
    
    <!-- ########## START: RIGHT PANEL ########## -->
    
    @include('backend.includes.headerRight')
    <!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
       @yield('fordashboard')
       <!-- foreditvendor -->
       @yield('foreditvendor')
            
     @include('backend.includes.footer')
    </div>
    <!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <!-- Script -->
    @include('backend.includes.script')
  </body>
</html>
