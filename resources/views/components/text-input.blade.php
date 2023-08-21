<x-form-group :attributes="$attributes">
    <input {{ $attributes->merge([
        'type' => 'text',
        'name' => $attributes->get('name'),
        'id' => $attributes->get('id') ?? $attributes->get('name'),
        'placeholder' =>
            $label ??
            str($attributes->get('name'))->replace('_', ' ')->title(),
        'class' => 'peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0',
    ]) }} />
</x-form-group>
