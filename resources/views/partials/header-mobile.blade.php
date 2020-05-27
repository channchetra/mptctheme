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
    </div>
    <!-- mobile main navigation -->
    <div class="row">
        <nav class="collapse-navbar sm-navbar">
            <ul>
            <!-- automaticaly adding html menu by script from desktop main navigation -->
            </ul>
        </nav>
    </div>
</div>