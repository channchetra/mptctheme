{{-- <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
<p class="byline author vcard">
  {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</p> --}}
<div class="meta">
  <div class="share">
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=381409555706841&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-share-button" data-href="{{ the_permalink() }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ the_permalink() }}" class="fb-xfbml-parse-ignore">{{__('Share', 'sage')}}</a></div>
  </div>
  <div class="date"><span>{{ get_the_date() }}</span></div>
  <div class="view"><span>{{ __('អត្ថបទដោយ៖ ', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">{{ get_the_author() }}</a></span></div>
</div>