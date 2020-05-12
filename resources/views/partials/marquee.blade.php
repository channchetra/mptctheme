<!-- marquee html -->
<div class="content">
    <div class="container marquee-wrap">
        <div id="marquee" class="marquee row primary-color">
          <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.setAttribute('scrollamount',0);" onmouseout="this.setAttribute('scrollamount',5);" >
            <ul>
              @query([
                'post_type' => 'ticker',
                'posts_per_page' => 4
              ])
              @posts
                <li><span class="oi oi-bell"></span> <a href="#">​​@title​</a></li>
              @endposts
              @noposts
              <li><span class="oi oi-bell"></span> <a href="#">​​សូមធ្វើការបញ្ចូល Ticker Post​</a></li>
              @endnoposts
            </ul>
          </marquee>
        </div>
    </div>
</div>