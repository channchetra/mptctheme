<div class="block-title primary-color">
    <span class="primary-color font-moul">{{ __('ព័ត៌មានជាប់ទាក់ទង', 'sage') }}</span>
</div>
<div class="b-1 row">
    {{-- {!! var_dump(Relateds::relatedbyCat()) !!} --}}
    @foreach (Relateds::relatedbyTag() as $item)
        <div class="b-item-wrap col-lg-6">
            <div class="b-item">
                <div class="b-thumnail"><img src="{{ $item['post_thumbnail'] }}" /></div>
                <div class="b-title"><a href="{{ $item['permalink'] }}">{{ $item['title'] }}</a></div>
                <div class="b-date">{{ $item['date'] }}</div>
            </div>
        </div>
    @endforeach
</div>