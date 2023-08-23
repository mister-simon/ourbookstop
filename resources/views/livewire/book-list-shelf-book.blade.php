<?php

use function Livewire\Volt\{state, computed};

state(['book' => fn() => $book])->locked();
state(['colors' => ['border-slate-600 bg-slate-600', 'border-slate-900 bg-slate-900', 'border-zinc-500 bg-zinc-500', 'border-neutral-600 bg-neutral-600', 'border-neutral-800 bg-neutral-800', 'border-orange-800 bg-orange-800', 'border-green-800 bg-green-800', 'border-sky-800 bg-sky-800', 'border-rose-800 bg-rose-800', 'border-teal-800 bg-teal-800', 'border-teal-900 bg-teal-900', 'border-green-900 bg-green-900']]);

$colorIndex = computed(function () {
    $length = count($this->colors);
    return $this->book->integer_hash % $length;
});

$color = computed(function () {
    return $this->colors[$this->colorIndex];
});

?>

<div class="{{ $this->color }} relative mb-2 flex shrink flex-row flex-wrap border border-b-0" x-data="{ open: false }">
    <button
        class="flex max-h-40 grow items-center justify-center self-stretch px-1 py-4 dark:bg-white/10"
        @click="open = !open">
        <span class="text-mode-vertical line-clamp-3 overflow-hidden text-ellipsis">
            {{ $book->title }}
        </span>
    </button>
    <div
        x-cloak
        x-show="open"
        class="custom-scrollbar max-h-40 origin-left overflow-auto p-4"
        x-transition:enter="transition-all ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-x-50"
        x-transition:enter-end="opacity-100 transform scale-x-100"
        x-transition:leave="transition-all ease-in duration-300"
        x-transition:leave-end="opacity-0 transform scale-x-50">

        <h4 class="font-semibold">
            {{ $this->book->title }}
        </h4>

        @if ($this->book->author_name)
            <span> {{ $this->book->author_name }}</span>
        @endif
        @if ($this->book->co_author)
            <span class="text-xs"> With {{ $this->book->co_author }}</span>
        @endif

        <div class="text-xs">
            @foreach ($this->book->only('genre', 'series_text', 'edition') as $attribute => $value)
                <p>{{ str($attribute)->replace('_', ' ')->title() }}: {{ $value }}</p>
            @endforeach
        </div>
    </div>
    <hr class="absolute -inset-x-0 top-full w-screen -translate-x-1/2 border-b-4 border-t-4 border-b-amber-950 border-t-amber-900" role="presentation">
</div>
