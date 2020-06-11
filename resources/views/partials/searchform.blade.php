<div class="form-search without-slideshow py-4 px-4 mb-0">
    <form @if ( function_exists( 'pll_home_url' ) )
            action="{{ pll_home_url() }}"
        @else
            action="{{ home_url() }}"
        @endif method="get">
        <div class="input-field input-group">
            <input type="search" class="text-field form-control" placeholder="{{
                esc_attr_e('ស្វែងរក', 'sage')
            }}" value="{{ the_search_query() }}" name="s"/>
            <div class="input-group-append">
                <button type="submit" class="submit-field btn btn-primary"><span class="d-none d-md-inline">{{ __('ស្វែងរក', 'sage') }}</span> <i class="icofont-search"></i></button>
            </div>
        </div>
    </form>
</div>