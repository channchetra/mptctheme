{{--
  Template Name: Full page
  Template Post Type: page, post, tourism, service
--}}

@extends('layouts.home')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
