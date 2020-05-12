<ul class="b-item-wrap youtube-player">
    <div class="b-item row">
        <div class="b-thumnail-wrap col-sm-7">
        <div class="b-thumnail"><li class="embed-responsive embed-responsive-6by4 youtube-thumb">{!! App\mptc_video_frame(get_post_meta(get_the_ID(), '_mptc_video_url', true)) !!}</li></div>
        </div>
        <div class="b-title-wrap col-sm-5">
            <div class="b-title">@title</div>
            @include('partials/meta-for-list')
        </div>
    </div>
</ul>