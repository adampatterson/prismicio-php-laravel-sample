@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
@endphp
@extends('layouts.app')

@section('content')

    <div class="container">
        {{ RichText::asText($document->data->title) }}
        {{ RichText::asText($document->data->content) }}
    </div>

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
