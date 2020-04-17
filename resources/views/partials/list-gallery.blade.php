<div class="b-item-wrap">
    <div class="b-item row">
        <div class="b-thumnail-wrap col-xs-12 col-sm-5">
            <div class="b-thumnail"><img src="{!! App\mptc_thumbnail() !!}" /></div>
        </div>
        <div class="b-title-wrap col-x-12 col-sm-7">
            <div class="b-title"><a href="{{ the_permalink() }}">{!! get_the_title() !!}</a></div>
            @include('partials/meta-for-list')
        </div>
    </div>
</div>