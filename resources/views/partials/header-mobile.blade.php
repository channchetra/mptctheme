<div class="nav-sidebar d-md-block d-lg-none primary-background-color">
    <div class="nav-sidebar-header">
        <!-- mobile Royal Cambodia logo & title -->
        <!--img class="khmer-logo" src="src/sass/images/khmer-logo.png" /-->
        <object class="khmer-logo" class="d-inline-block" type="image/svg+xml" data="@asset(src/sass/images/Royal_Cambodia.svg)" width="" height=""></object>
        <h1 class="font-moul khmer-title primary-color">ព្រះរាជាណាចក្រកម្ពុជា <br/>ជាតិ សាសនា ព្រះមហាក្សត្រ</h1>
        <!-- mobile search form -->
        <form class="form-inline">
            <div class="input-group mb-3">
                <div class="input-group-prepend primary-background-color">
                    <button class="btn btn-outline" type="submit" id="button-addon1"><span class="oi oi-magnifying-glass"></span></button>
                </div>
                <input type="text" class="form-control" placeholder="ស្វែងរក" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>	
        <!-- mobile polylang -->
        <div class="languages d-block text-center">
            <ul>
                <li class="active"><a href="#">ខ្មែរ</a></li>
                <li><a href="#">Eng</a></li>
            </ul>
        </div>
        <!-- mobile top menu bar -->
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'top_navigation', 'container' => 'nav', 'container_class' => 'short-link']) !!}
        @endif
    </div>
    <!-- mobile main navigation -->
    <nav class="collapse-navbar sm-navbar">
        <ul>
        <!-- automaticaly adding html menu by script from desktop main navigation -->
        </ul>
    </nav>
</div>