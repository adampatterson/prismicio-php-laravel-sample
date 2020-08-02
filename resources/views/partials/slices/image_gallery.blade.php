@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
@endphp
<section class="image-gallery content-section">
    {{ RichText::asText($slice->primary->gallery_title) }}

    <div class="gallery">
        @foreach($slice->items as $item)
            <div class="gallery-item">
                <img src="{{$item->image->url}}" alt="{{$item->item->alt ?? ''}}"/>
                {{ RichText::asText($item->image_description) }}
                <p class="gallery-link">
                    <a href="{{ Link::asUrl($item->link, $linkResolver) }}">{{  RichText::asText($item->link_label) }}</a>
                </p>
            </div>
        @endforeach
    </div>

</section>
