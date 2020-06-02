<div class="container p-0">
    {!! get_search_form() !!}
</div>
<div class="container plr-lg-30">
    <div class="breadcrum">{!! Breadcrumbs::mptcBreadcrumbs() !!}</div>
    <header class="block-heading text-left">
        <h4 class="text-danger font-weight-bold">
            @title
        </h4>
    </header>
    @content
</div>