@php
    use Prismic\Dom\RichText;
@endphp

<section class="quote-banner text-section l-grid-container text-section-1col">
    <blockquote>
        {!! RichText::asHtml($slice->primary->quote_text, $linkResolver) !!}
    </blockquote>
    <div class="author">
        {!! RichText::asHtml($slice->primary->quote_author, $linkResolver) !!}
    </div>
</section>
