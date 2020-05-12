@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header') --}}

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="b-2">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
  </div>
  {!! App\mptc_post_paginations() !!}
@endsection
