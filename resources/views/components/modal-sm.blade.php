<div class="modal fade" {{ $attributes->merge(['id' => '']) }} tabindex="-1" aria-labelledby="modalMdLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
