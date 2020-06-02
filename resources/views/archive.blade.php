@extends('layouts.app')
@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  {{-- <h2>{!! App\mptc_render_layout_class() !!}</h2> --}}
  <div class="{{ App\mptc_render_layout_class() }}" >
    @while (have_posts()) @php the_post() @endphp
      @include('partials.categories')
    @endwhile
  </div>
    {{ App\mptc_post_paginations() }}
@endsection