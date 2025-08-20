@props([
    'title' => null,
])

<div
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title"
    @keydown.escape.window="open = false"
>
    <div class="fixed inset-0 bg-black/50" @click="open = false"></div>

    <div class="relative w-full max-w-3xl mx-4 bg-white rounded-2xl shadow-xl">
        <div class="flex items-center justify-between p-4 border-b">
            <h2 id="modal-title" class="text-lg font-semibold">
                {{ $title }}
            </h2>
            <button
                type="button"
                class="p-2 rounded-2xl hover:bg-gray-100"
                @click="open = false"
                aria-label="Fechar modal"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>