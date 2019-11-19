
  <div class="head">
    <div class="title primary-color"><h4>{!! get_the_title() !!}<h4></div>
    @include('partials/entry-meta')
  </div>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
