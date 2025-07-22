@vite(['resources/css/layout/large-modal.css'])

<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>@yield('modal-title')</h2>
            <button class="close-modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body">
            @yield('modal-body')
        </div>
        <div class="modal-footer">
            @yield('modal-footer')
        </div>
    </div>
</div>