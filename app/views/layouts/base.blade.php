@include('layouts.partials.header')
@include('layouts.partials.nav')


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
@include('layouts.partials.footer')