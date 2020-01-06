<!doctype html>
<html class="responsive" {!! get_language_attributes() !!}>
  @include('partials.head')
  <body>
    @php do_action('get_header') @endphp
    <div class="wrapper">
      @include('partials.header-mobile')
      @include('partials.header')
      @include('partials.marquee')
      <div class="content">
        @yield('content')
      </div>
    <!--End of Body Class Content -->
    @php do_action('get_footer') @endphp
        <div class="content">
          @include('partials.footer')
          @include('partials.responsive-switcher')
        </div>
    </div>
    <!--End of Wrapper -->
    @php wp_footer() @endphp
  </body>
</html>
