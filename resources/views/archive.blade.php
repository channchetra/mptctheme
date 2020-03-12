@extends('layouts.app')
{{-- {{ dd(get_term_meta(get_queried_object_id(), '_mptc_layout_type', true)) }} --}}
@section('content')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
    {!! App\mptc_post_paginations() !!}
@endsection