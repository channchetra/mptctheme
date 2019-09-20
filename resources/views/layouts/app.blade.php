<!doctype html>
<html class="responsive" {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    <div class="wrapper">
        @include( 'partials.header-mobile')
        @include('partials.header')
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    </div>
    @php wp_footer() @endphp
  </body>
</html>
