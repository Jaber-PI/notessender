<x-guest-layout>
    <x-card >
        <div class="flex justify-between">
            <div>
                <a href="#" class="text-xl font-bold hover:underline hover:text-blue-500">
                    {{ $note->title }}
                </a>
                <p class="text-xs">
                    {{ $note->body }}
                </p>
            </div>
            <div class="text-xs text-gray-500">
                {{ $note->sent_at->format('M-d-Y') }}
            </div>
        </div>
        <div class="flex items-end justify-between mt-4 space-x-1">
            <p class="text-xs">
                Sent By: <span class="font-semibold">
                    {{ $note->user->name }}
                </span>
            </p>
            <livewire:heartreact :note="$note" />
        </div>
    </x-card>
</x-guest-layout>
