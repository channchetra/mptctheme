@extends('layouts.app')
@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="{{ App\mptc_render_layout_class() }}" >
    @while (have_posts()) @php the_post() @endphp
      @switch(get_term_meta(get_queried_object_id(), '_mptc_layout_type', true))
          @case('_documents')
            @include('partials.list-docs')
              @break
          @case('_videos')
            @include('partials.list-videos')  
              @break
          @case('_gallery')
            @include('partials.list-docs')
              @break
          @default
            @include('partials.categories')
      @endswitch

    @endwhile
  </div>
    {{ App\mptc_post_paginations() }}
@endsection