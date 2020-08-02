@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;

    $backgroundImageUrl = isset($homepage_banner->image->url) ? $homepage_banner->image->url : '';
    $buttonUrl = Link::asUrl($homepage_banner->button_link, $linkResolver);
    $buttonText = $homepage_banner->button_label;
@endphp

@extends('layouts.app')

@section('content')

    <section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url({{ $backgroundImageUrl }});">
        <div class="banner-content container">
            <h2 class="banner-title">{{ RichText::asText($homepage_banner->title) }}</h2>
            <p className="banner-description">
                {!! RichText::asHtml($homepage_banner->tagline, $linkResolver) !!}
            </p>
            @if ($buttonUrl && $buttonText)
                <a
                    class="banner-button"
                    href="{{ $buttonUrl }}"
                >
                    {{ RichText::asText($buttonText) }}
                </a>
            @endif
        </div>
    </section>
    <div class="container">
        @foreach ($document->data->page_content as $slice)
            @switch ($slice->slice_type)
                @case ('text_section')
                @include('partials.slices.text-section', ['slice' => $slice])
                @break
                @case ('quote')
                @include('partials.slices.quote', ['slice' => $slice])
                @break
                @case ('image_gallery')
                @include('partials.slices.image_gallery', ['slice' => $slice])
                @break
                @case ('image_highlight')
                @include('partials.slices.image_highlight', ['slice' => $slice])
                @break
                @case ('full_width_image')
                @include('partials.slices.full_width_image', ['slice' => $slice])
                @break
                @case ('video')
                @include('partials.slices.video', ['slice' => $slice])
                @break
                @case ('banner')
                @include('partials.slices.banner', ['slice' => $slice])
                @break


                @case ('highlight_section')
                @include('partials.slices.highlight-section', ['slice' => $slice])
                @break
                @case ('image_slider')
                @include('partials.slices.image-slider', ['slice' => $slice])
                @break

            @endswitch
        @endforeach
    </div>
@stop
