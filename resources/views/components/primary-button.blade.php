<button style="padding-block: 12px; background-color: oklch(58.5% 0.233 277.117)" onmouseover="this.style.opacity='0.9'"
    onmouseout="this.style.opacity='1'"
    {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
