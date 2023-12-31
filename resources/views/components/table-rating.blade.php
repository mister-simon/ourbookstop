@props(['rating'])
@if ($rating !== null)
    <span
        {{ $attributes->class('table-rating badge badge-outline badge-lg aspect-square rounded-full text-sm transition-[background-position] duration-1000')->style('--rating-pos:' . $rating * 10 . '%') }}>
        {{ Illuminate\Support\Number::format($rating, maxPrecision: 1) }}
    </span>
@else
    <span class="opacity-50">{{ __('N/A') }}</span>
@endif
