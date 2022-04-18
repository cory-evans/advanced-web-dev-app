<div x-data="{show: false, onconfirm: () => { {{$onclick}} }}">
    <x-button.danger @click="show = true">
        {{ $btnText }}
    </x-button.danger>
    <div x-show="show" class="fixed inset-0 overflow-y-auto" role="dialog" aria-modal="true">
        <div x-show="show" class="fixed inset-0 bg-black bg-opacity-50" style="display: none;">
            <div class="relative min-h-screen flex items-center justify-center p-4">
                <div class="relative max-w-2xl w-full bg-white border border-black rounded-lg shadow-lg p-12 overflow-y-auto">
                    <!-- modal content -->
                    {{ $slot }}

                    <div class="mt-8 flex justify-between">
                        <x-button :variant="'secondary'" @click="show=false;">
                            Cancel
                        </x-button>
                        @if ($variant == 'danger')
                        <x-button :variant="'danger'" @click="onconfirm(); show=false;">
                            {{$btnText}}
                        </x-button>
                        @else
                        <x-button :variant="'primary'" @click="onconfirm(); show=false;">
                            {{$btnText}}
                        </x-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
