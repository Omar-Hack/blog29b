@isset($post_rights)
    @foreach ($post_rights as $post_right)
        <div class="post_card">
            <a href="{{ route('public.blog.show', $post_right) }}" aria-label="relacionados">
                <div class="post_card_content_right">
                    <img class="post_card_content_r_img" src="{{ asset($post_right->image) }}" alt="">
                </div>
            </a>
            <div class="footer-line-m"></div>
            <div class="post_card_content_r_buttom">
                <div class="post_card_content_c_title">
                    {{ $post_right->title }}
                </div>
                <div class="post_card_content_o_date">
                    <i class="far fa-clock"></i>&nbsp;
                    {{ $post_right->created_at->toFormattedDateString() }}
                </div>
            </div>
        </div>
        <div class="j-mt-20"></div>
    @endforeach
@endisset
