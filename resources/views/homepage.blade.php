@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;

    $backgroundImageUrl = isset($homepage_banner->image->url) ? $homepage_banner->image->url : '';
    $buttonUrl = Link::asUrl($homepage_banner->button_link, $linkResolver);
    $buttonText = $homepage_banner->button_label;
@endphp

@extends('layouts.app')

@section('content')

    <div class="homepage" data-wio-id="{{ $document->id }}">

        <section class="homepage-banner" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url({{ $backgroundImageUrl }});">
            <div class="banner-content l-grid-container">
                <h1 class="banner-title">{{ RichText::asText($document->data->title) }}</h1>

                {!! RichText::asHtml($homepage_banner->tagline, $linkResolver) !!}

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

        @foreach ($document->data->page_content as $slice)
            @dump($slice->slice_type)
            @switch ($slice->slice_type)
                @case ('highlight_section')
                @include('partials.slices.highlight-section', ['slice' => $slice])
                @break
                @case ('banner')
                @include('partials.slices.banner', ['slice' => $slice])
                @break
                @case ('quote')
                @include('partials.slices.quote', ['slice' => $slice])
                @break
                @case ('text_section')
                @include('partials.slices.text-section', ['slice' => $slice])
                @break
                @case ('image_slider')
                @include('partials.slices.image-slider', ['slice' => $slice])
                @break
                @case ('gallery')
                @include('partials.slices.gallery', ['slice' => $slice])
                @break
                @case ('video')
                @include('partials.slices.video', ['slice' => $slice])
                @break
            @endswitch
        @endforeach

    </div>

@stop
