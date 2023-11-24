<x-app-layout>
    <x-page-header>
        {{ __('Shelf - :shelf', ['shelf' => $shelf->title]) }}

        <x-slot name="actions">
            <a href="{{ route('shelves.book.create', ['shelf' => $shelf]) }}" class="btn btn-primary">Add Book</a>
        </x-slot>
    </x-page-header>

    <x-page-card>
        <table class="table table-zebra table-pin-rows table-sm">
            <thead>
                <tr>
                    <th scope="col">Forename</th>
                    <th scope="col" class="border-r">Surname</th>
                    <th scope="col">Series</th>
                    <th scope="col" class="border-r">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Edition</th>
                    <th scope="col">CoAuthor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->author_forename }}</td>
                        <td class="border-r">{{ $book->author_surname }}</td>
                        <td>{{ $book->series_text }}</td>
                        <td class="border-r">{{ $book->title }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->co_author }}</td>
                @endforeach
            </tbody>
        </table>
    </x-page-card>

</x-app-layout>
