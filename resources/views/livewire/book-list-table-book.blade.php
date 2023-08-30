<tr
    class="{{ $this->rowClasses }} whitespace-nowrap border-b px-6 py-2 transition duration-300 ease-in-out hover:bg-neutral-100 dark:hover:bg-neutral-600">
    @if ($this->edit)
        <td class="px-3">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="author_surname"
                name="author_surname"
                :id="'author_surname-' . $this->book->id"
                x-init="$el.focus()" />
        </td>
        <td class="border-r px-3 dark:border-neutral-500">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="author_forename"
                name="author_forename"
                :id="'author_forename-' . $this->book->id" />
        </td>
        <td class="px-3">
            <div class="flex flex-row">
                <x-text-input
                    wire:keydown.enter="save"
                    hide-label
                    wire:model="series"
                    name="series"
                    :id="'series-' . $this->book->id" />

                <x-number-input
                    wire:keydown.enter="save"
                    hide-label
                    wire:model="series_index"
                    label="Index"
                    name="series_index"
                    :id="'series_index-' . $this->book->id"
                    min="0" />
            </div>
        </td>
        <td class="border-r px-3 dark:border-neutral-500">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="title"
                name="title"
                :id="'title-' . $this->book->id" />
        </td>
        <td class="px-3">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="genre"
                name="genre"
                :id="'genre-' . $this->book->id" />
        </td>
        <td class="px-3">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="edition"
                name="edition"
                :id="'edition-' . $this->book->id" />
        </td>
        <td class="px-3">
            <x-text-input
                wire:keydown.enter="save"
                hide-label
                wire:model="co_author"
                name="co_author"
                :id="'co_author-' . $this->book->id" />
        </td>
    @else
        <td class="whitespace-break-spaces px-6 py-2">{{ $this->book->author_surname }}</td>
        <td class="whitespace-break-spaces border-r px-6 py-2 dark:border-neutral-500">{{ $this->book->author_forename }}</td>
        <td class="whitespace-break-spaces px-6 py-2">{{ $this->book->series_text }}</td>
        <td class="whitespace-break-spaces border-r px-6 py-2 dark:border-neutral-500">{{ $this->book->title }}</td>
        <td class="whitespace-break-spaces px-6 py-2">{{ $this->book->genre }}</td>
        <td class="whitespace-break-spaces px-6 py-2">{{ $this->book->edition }}</td>
        <td class="whitespace-break-spaces px-6 py-2">{{ $this->book->co_author }}</td>
    @endif

    <td class="px-6 py-2">
        @if ($this->edit)
            <x-button
                wire:click="save"
                class="block w-full !bg-success"
                wire:loading.attr="disabled">
                <span wire:loading.delay wire:target="save">
                    @svg('heroicon-o-arrow-path', 'w-4 h-4 animate-spin')
                </span>
                <span wire:loading.delay.remove wire:target="save">
                    @svg('heroicon-o-check', 'w-4 h-4')
                </span>
            </x-button>
        @else
            <x-button
                wire:click="$set('edit', true)"
                class="block w-full">
                <span wire:loading.delay>
                    @svg('heroicon-o-pencil-square', 'w-4 h-4 animate-spin')
                </span>
                <span wire:loading.delay.remove>
                    @svg('heroicon-o-check', 'w-4 h-4')
                </span>
            </x-button>
        @endif
    </td>
</tr>