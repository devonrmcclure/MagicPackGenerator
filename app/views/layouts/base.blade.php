@include('layouts.partials.header')


  <!-- Container -->
  <div class="container">
    <div class="flash-message row">
      @if(Session::has('flash-message'))
          <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {{ Session::get('flash-message') }}
          </div>
      @endif
    </div>
      <!-- Content -->
      @yield('content')

  </div>
  @section('footer-scripts')
    <!-- Scripts are placed here -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js') }}
    {{ HTML::script('tb/js/bootstrap.min.js') }}
  @show