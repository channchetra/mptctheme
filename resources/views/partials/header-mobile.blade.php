<div class="nav-sidebar d-md-block d-lg-none primary-background-color">
    <div class="nav-sidebar-header">
        <!-- mobile search form -->
        <div class="pt-2"></div>
        <!-- mobile polylang -->
        <div class="languages d-block text-center">
            <ul>
                {{-- <li class="active"><a href="#">ខ្មែរ</a></li>
                <li><a href="#">Eng</a></li> --}}
            @php
                do_action( 'wpml_language_switcher' );
            @endphp
            </ul>
        </div>
        <!-- mobile top menu bar -->
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'top_navigation', 'container' => 'nav', 'menu_class' => 'short-link']) !!}
        @endif
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend primary-background-color">
                    <button class="btn btn-outline" type="submit" id="button-addon1"><span class="oi oi-magnifying-glass"></span></button>
                </div>
                <input type="text" class="form-control" placeholder="{{ __('ស្វែងរក', 'sage') }}" name= "s" id="s" value="{{ the_search_query() }}" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>	
    </div>
    <!-- mobile main navigation -->
    <nav class="collapse-navbar sm-navbar">
        <ul>
        <!-- automaticaly adding html menu by script from desktop main navigation -->
        </ul>
    </nav>
</div>