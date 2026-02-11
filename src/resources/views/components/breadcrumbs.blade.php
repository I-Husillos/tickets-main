<ol class="breadcrumb float-sm-right">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$loop->last)
            <li class="breadcrumb-item">
                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
            </li>
        @else
            <li class="breadcrumb-item active">{{ $breadcrumb['label'] }}</li>
        @endif
    @endforeach
</ol>
