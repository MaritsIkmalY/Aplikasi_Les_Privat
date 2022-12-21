<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary hover:bg-transparent hover:text-secondary hover:font-bold hover:ease-in-out']) }}>
    {{ $slot }}
</button>
