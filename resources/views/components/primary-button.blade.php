<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary hover:bg-transparent hover:text-primary hover:font-bold hover:ease-in-out']) }}>
    {{ $slot }}
</button>
