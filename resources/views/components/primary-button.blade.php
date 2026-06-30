<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-active focus:outline-none focus:ring-2 focus:ring-primary/30 transition']) }}>
    {{ $slot }}
</button>
