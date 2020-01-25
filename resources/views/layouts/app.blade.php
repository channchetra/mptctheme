<!doctype html>
<html class="responsive" {!! get_language_attributes() !!}>
  @include('partials.head')
  <body>
    @php do_action('get_header') @endphp
    <div class="wrapper">
        @include('partials.header-mobile')
        @include('partials.header')
        @include('partials.marquee')
        @include('partials.breadcrum')
        <div class="content">
          <div class="container plr-lg-30">
            <div class="row">
              <div class="col-lg-8">
                <div class="detail-wrap">
                  <main class="main">
                    @yield('content')
                  </main>
                </div>
              </div>
          @if (App\display_sidebar())
            <div class="col-lg-4 sidebar">
              @include('partials.sidebar')
            </div>
          @endif
            </div>
          </div>
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
