  <div class="content">
    <!-- mobile header -->
    <div class="sm-header d-md-block d-lg-none">
      <div class="nav-button inline-block vertical-align-middle">
        <span class="oi oi-menu nav-icon primary-color"></span>
      </div>
      <a href="{{ home_url('/') }}" class="sm-logo inline-block vertical-align-middle">
        <img src="{{ $logo_url }}" />
      </a>
      <div class="sm-title inline-block vertical-align-middle primary-color">
        <h1 class="font-moul">{{ get_bloginfo('name', 'display') }}</h1>
      </div>
    </div>
    <!-- desktop header -->
    <div id="lg-header" class="lg-header-wrap d-none d-lg-block">
      <div class="container lg-header">
        <div class="row">
          <!-- desktop logo and site title -->
          <div class="col-7">
            <a href="{{ home_url('/') }}" class="lg-logo inline-block vertical-align-middle">
               <img src="{{ $logo_url }}" />
            </a>
            <div class="lg-title inline-block vertical-align-middle primary-color">
              <h1 class="font-moul">{{ get_bloginfo('name', 'display') }}</h1>
              <span>MINISTRY OF POSTS<br/>AND TELECOMMUNICATIONS</span>
            </div>
          </div>
          <!-- desktop Cambodia sign -->
          <div class="col-5 logo-wrap text-right">
            <!-- desktop top menu -->
            @if (has_nav_menu('primary_navigation'))
              {!! wp_nav_menu(['theme_location' => 'top_navigation', 'container' => 'nav', 'container_class' => 'short-link mb-2']) !!}
            @endif
            <!-- desktop Royal Cambodia logo -->
            <!-- h1 class="font-moul khmer-title primary-color inline-block">ព្រះរាជាណាចក្រកម្ពុជា <br/>ជាតិ សាសនា ព្រះមហាក្សត្រ</h1>
            <br/ -->
            <!-- desktop search form -->
            <form class="form-inline inline-block">
              <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend primary-background-color">
                  <button class="btn btn-outline" type="submit" id="button-addon1"><span class="oi oi-magnifying-glass"></span></button>
                </div>
                <input type="text" class="form-control" placeholder="ស្វែងរក" aria-label="Example text with button addon" aria-describedby="button-addon1">
              </div>
            </form>
            <!-- desktop polylang -->
            <div class="languages d-inline-block">
              <ul>
                <li class="active"><a href="#">ខ្មែរ</a></li>
                <li><a href="#">Eng</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- desktop main navigation -->
    <div class="lg-main-nav-wrap container d-none d-lg-block">
      <div class="row">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => 'nav', 'container_class' => 'lg-main-nav']) !!}
          @endif
      </div>
    </div>
  </div>
  <!-- Close Header Content -->