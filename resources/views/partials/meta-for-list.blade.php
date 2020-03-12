<div class="b-date">
    @if (get_post_meta(get_the_ID(), '_mptc_lived_options', true))
        <span class="hot">HOT!</span>
    @endif
    {{-- <span post-date="2019/01/27" class="hot">HOT!</span> --}}
    {{ App\mptc_posted_on() }}
    {{ App\mptc_the_posted_view_count() }}
</div>