@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
@endphp
<section class="highlight content-section">
    <div class="highlight-left">
        {!!  RichText::asHtml($slice->primary->title) !!}
        {!!  RichText::asHtml($slice->primary->headline) !!}
        <p>
            <a href="{{ Link::asUrl($slice->primary->link, $linkResolver) }}">
                {{ RichText::asText($slice->primary->link_label)}}
            </a>
        </p>
    </div>
    <div class="highlight-right">
        <img
            src="{{ $slice->primary->featured_image->url}}"
            alt="{{ $slice->primary->featured_image->alt}}"
        />
    </div>
</section>
