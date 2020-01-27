<article @php post_class() @endphp>
  {{-- <div class="mb-3"></div> --}}
  <div class="head">
    <div class="title primary-color"><h4>{!! get_the_title() !!}<h4></div>
    @include('partials/entry-meta')
  </div>
  <div class="content-detail">
    @php the_content() @endphp
  </div>
    @include('partials/relateds')
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{-- @php comments_template('/partials/comments.blade.php') @endphp --}}
</article>
