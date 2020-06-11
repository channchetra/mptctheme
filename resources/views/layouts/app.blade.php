<!doctype html>
<html class="responsive" {!! get_language_attributes() !!}>
  @include('partials.head')
  <body>
    @php do_action('get_header') @endphp
    <div class="wrapper">
        @include('partials.header')
        <div class="content">
          <div class="container p-0">
            {!! get_search_form() !!}
          </div>
        </div>
        @php
            App\mptc_track_post_views(get_the_ID());
        @endphp
        @include('partials.breadcrum')
        <div class="content">
          <div class="container plr-lg-30">
            <div class="row">
              <div class="col-lg-8">
                <div class="detail-wrap">
                    @yield('content')
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
        </div>
    </div>
    <!--End of Wrapper -->
    @php wp_footer() @endphp
  </body>
</html>
