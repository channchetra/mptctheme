<footer class="footer">
  @include('partials.page-survey')
  <div class="container">
    <nav class="d-md-flex justify-content-between"> 
      <ul class="d-flex justify-content-center social">
        <li>{{ __('តាមដានលើបណ្ដាញសង្គម', 'sage') }}</li>
        <li>
          <a href="https://www.facebook.com/officialmptc/"><i class="icofont-facebook"></i></a>
        </li>
        <li>
          <a href="https://www.youtube.com/channel/UCVnVllUOZyF-HQqUvER945Q/videos"><i class="icofont-youtube-play"></i></a>
        </li>
      </ul>
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'container' => '', 'menu_class'=>'d-flex justify-content-center footer-nabar']) !!}
      @endif
    </nav>
  </div>
  <div class="container text-center">
    <small class="copyright">@php dynamic_sidebar('sidebar-footer') @endphp</small>
  </div>
</footer>