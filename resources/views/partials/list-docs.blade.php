<div class="b-item-wrap">
    <div class="b-item row">
        {{-- <div class="col-1 text-right">
            <span class="b-id">1</span>
        </div> --}}
        <div class="b-title-wrap col-11">
            <div class="b-title margin-bottom-15"><a href="{{ the_permalink() }}">{!! get_the_title() !!}</a></div>
            <div class="b-date padding-top-15">
                {{ App\mptc_posted_on() }}
                {{ App\mptc_download_view() }}
            </div>
        </div>
    </div>
</div>