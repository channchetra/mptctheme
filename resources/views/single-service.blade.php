@extends('layouts.home')
@section('content')
  @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-service')
  @endwhile
@endsection