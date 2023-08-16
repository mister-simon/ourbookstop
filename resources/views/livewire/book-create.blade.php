<?php

use App\Models\Book;
use function Livewire\Volt\{state, computed, rules};

state(['series', 'series_index', 'author_surname', 'author_forename', 'title', 'genre', 'edition', 'co_author']);
state(['shelf' => fn() => $shelf]);

rules([
    'series' => ['nullable', 'string'],
    'series_index' => ['nullable', 'integer', 'min:0'],
    'author_surname' => ['nullable', 'string'],
    'author_forename' => ['nullable', 'string'],
    'title' => ['required', 'string'],
    'genre' => ['nullable', 'string'],
    'edition' => ['nullable', 'string'],
    'co_author' => ['nullable', 'string'],
]);

$create = function () {
    $data = $this->validate();

    $book = $this->shelf->books()->create($data);
    $this->dispatch('book-created', book: $book->id);

    $shelf = $this->shelf;
    $this->reset();
    $this->shelf = $shelf;
};

?>

<div>
    <x-subtitle>
        New Book
    </x-subtitle>

    <form wire:submit="create">
        <div class="grid grid-cols-4 gap-2">
            <x-text-input name="title" wire:model="title" />
            <x-text-input name="author_surname" wire:model="author_surname" />
            <x-text-input name="author_forename" wire:model="author_forename" />
            <x-text-input name="co_author" wire:model="co_author" />
            <x-genre-input name="genre" wire:model="genre" />
            <x-text-input name="series" wire:model="series" />
            <x-number-input name="series_index" wire:model="series_index" />
            <x-text-input name="edition" wire:model="edition" />
        </div>

        <x-button type="submit">Add Book</x-button>
    </form>
</div>
