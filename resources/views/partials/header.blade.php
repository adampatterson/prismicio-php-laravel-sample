@php
    use Prismic\Dom\RichText;
    use Prismic\Dom\Link;
    use Prismic\Document;
@endphp

@if (isset($menu))
    <header class="site-header">
        <a href="/">
            <div class="logo">{{ RichText::asText($menu->data->title) }}</div>
        </a>
        <nav>
            <ul>
                @foreach ($menu->data->menu_links as $item)
                    @if ($item->link && $item->label)
                        <li>
                            <a href="{{ Link::asUrl($item->link, $linkResolver) }}">{{  RichText::asText($item->label) }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </header>
@endif
