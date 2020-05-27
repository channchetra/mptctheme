<div class="container p-0">
    {!! get_search_form() !!}
</div>
<div class="container plr-lg-30">
    <div style="padding-bottom: 30px"></div>
    {!! Breadcrumbs::mptcBreadcrumbs() !!}
    <header class="block-heading text-left">
        <h4 class="text-danger font-weight-bold">
            @title
        </h4>
    </header>
    @content
</div>