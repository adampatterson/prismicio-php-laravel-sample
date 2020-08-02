@php
    use Prismic\Dom\RichText;
@endphp

<section class="content-section quote">
    <blockquote>
        {!! RichText::asHtml($slice->primary->quote_text, $linkResolver) !!}
    </blockquote>
    <div class="author">
        {!! RichText::asHtml($slice->primary->quote_author, $linkResolver) !!}
    </div>
</section>
