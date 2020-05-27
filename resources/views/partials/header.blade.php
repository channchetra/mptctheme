<!-- contain all containers -->
<div class="content">
  <!-- mobile header -->
  <div class="sm-header d-md-block d-lg-none">
    <a href="{{ $ptc_home_url }}" class="sm-logo inline-block vertical-align-middle py-2">
      <img src="{{ $logo_url }}" />
    </a>
    <div class="sm-title inline-block vertical-align-middle primary-color">
      <h1 class="font-moul">{{ $site_name }}</h1>
      <small>{{ $site_description }}</small>
    </div>
    <div class="nav-button vertical-align-middle">
      <div class="languages d-inline-block text-center">
        <ul class="text-center list-inline navbar-brand my-auto ml-3 d-lg-none language">
          {!! $lang_switcher !!}
        </ul>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu nav-icon primary-color"></span>
        </button>
    </div>
  </div>
  <!-- desktop header -->
  <div id="lg-header" class="lg-header-wrap">
    <div class="container lg-header d-none d-lg-block">
      <div class="row">
        <!-- desktop logo and site title -->
        <div class="col-8">
          <a href="{{ $ptc_home_url }}" class="lg-logo inline-block vertical-align-middle">
            <img src="{{ $logo_url }}" />
          </a>
          <div class="lg-title inline-block vertical-align-middle primary-color">
            <h1 class="font-moul">{{ $site_name }}</h1>
            <span>{{ $site_description }}</span>
          </div>
        </div>
        <!-- desktop Cambodia sign -->
        <div class="col logo-wrap text-right my-auto">
          
          <time class="mb-3 d-block khmer-time d-none">

            <div class="input-group d-none">
              <input type="text" id="input-khmer-time" readonly class="form-control" value="ថ្ងៃ៨រោច ខែចេត្រ ឆ្នាំជូត ទោស័ក ព.ស២៥៦៣" aria-describedby="basic-addon1">
              <div class="input-group-prepend">
                <i onclick="clickCopy.action('input-khmer-time')" id="basic-addon1" class="icofont-copy input-group-text" title="Click to copy"></i>
              </div>
            </div>

          </time>
          
          
          <!-- desktop polylang -->
          <div class="languages d-inline-block text-center">
            <ul>
              {!! $lang_switcher !!}
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- desktop main navigation -->
    <div class="lg-main-nav-wrap container">
      <div class="row d-none d-lg-block">        
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'container' => 'nav', 'container_class' => 'lg-main-nav']) !!}
        @endif
      </div>
      <div class="row">
        <nav class="collapse-navbar sm-navbar navbar-collapse collapse" id='main-nav'>
          <ul>
          <!-- automaticaly adding html menu by script from desktop main navigation -->
          </ul>
        </nav>
      </div>
    </div>
  </div>