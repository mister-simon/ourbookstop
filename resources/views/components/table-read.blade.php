@props(['read'])
<span class="tooltip" data-tip="{{ $read->trans() }}">
    @switch($read)
        @case(App\Enums\ReadStatus::YES)
            <span {{ $attributes->class('badge badge-success badge-lg aspect-square rounded-full border-base-content text-sm') }}>
                {{ $read->transShort() }}
            </span>
        @break

        @case(App\Enums\ReadStatus::NO)
            <span {{ $attributes->class('badge badge-error badge-lg aspect-square rounded-full border-base-content text-sm') }}>
                {{ $read->transShort() }}
            </span>
        @break

        @case(App\Enums\ReadStatus::PARTIAL)
            <span {{ $attributes->class('badge badge-warning badge-lg aspect-square rounded-full border-base-content text-sm') }}>
                {{ $read->transShort() }}
            </span>
        @break

        @case(App\Enums\ReadStatus::UNKNOWN)
            <span {{ $attributes->class('badge badge-ghost badge-outline badge-lg aspect-square rounded-full text-sm') }}>
                {{ $read->transShort() }}
            </span>
        @break
    @endswitch
</span>
