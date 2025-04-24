@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Invoice History</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead>
                <tr>
                    <th class="px-4 py-2">Invoice #</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Currency</th>
                    <th class="px-4 py-2">Due Date</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse($invoices as $invoice)
                    <tr>
                        <td class="px-4 py-2">{{ $invoice->invoice_number }}</td>
                        <td class="px-4 py-2">{{ $invoice->amount }}</td>
                        <td class="px-4 py-2">{{ $invoice->currency }}</td>
                        <td class="px-4 py-2">{{ $invoice->due_date }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-white text-xs font-semibold
                                @if($invoice->status === 'pending') bg-yellow-500
                                @elseif($invoice->status === 'due') bg-blue-500
                                @elseif($invoice->status === 'overdue') bg-red-500
                                @elseif($invoice->status === 'paid') bg-green-500
                                @endif">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $invoice->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No invoices found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
