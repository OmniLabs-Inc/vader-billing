@props(['invoice'])
@if($invoice)
<div x-data="{ open: true }" x-show="open" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
    <div class="bg-white rounded-lg shadow-lg max-w-md w-full p-8 relative">
        <button @click="open = false" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="flex flex-col items-center">
            <div class="mb-4">
                @if($invoice->status === 'pending')
                    <span class="inline-flex items-center justify-center w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
                    </span>
                @elseif($invoice->status === 'due')
                    <span class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 text-blue-600 rounded-full">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /></svg>
                    </span>
                @elseif($invoice->status === 'overdue')
                    <span class="inline-flex items-center justify-center w-16 h-16 bg-red-100 text-red-600 rounded-full">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /><circle cx="12" cy="12" r="10" /></svg>
                    </span>
                @endif
            </div>
            <h2 class="text-2xl font-bold mb-2">Invoice #{{ $invoice->invoice_number }}</h2>
            <div class="mb-2 text-lg">Amount: <span class="font-semibold">{{ $invoice->amount }} {{ $invoice->currency }}</span></div>
            <div class="mb-2">Due: <span class="font-semibold">{{ $invoice->due_date }}</span></div>
            <div class="mb-2">Description: {{ $invoice->description }}</div>
            <div class="mb-4">
                <span class="px-3 py-1 rounded-full text-white text-sm font-semibold"
                    :class="{
                        'bg-yellow-500': '{{ $invoice->status }}' === 'pending',
                        'bg-blue-500': '{{ $invoice->status }}' === 'due',
                        'bg-red-500': '{{ $invoice->status }}' === 'overdue',
                        'bg-green-500': '{{ $invoice->status }}' === 'paid',
                    }">
                    {{ ucfirst($invoice->status) }}
                </span>
            </div>
            <button class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">Pay Now</button>
        </div>
    </div>
</div>
@endif
