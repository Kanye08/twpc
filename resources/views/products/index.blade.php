@extends('layouts.app')
@section('title', 'My Products')

@section('content')
<div class="space-y-5">
    <div class="flex items-center justify-between">
        <p class="text-slate-500 text-sm">Manage your product listings</p>
        <a href="{{ route('products.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition shadow-sm">
            + New Product
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        @if($products->count())
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-slate-500 max-w-xs truncate">{{ $product->description }}</td>
                            <td class="px-6 py-4 font-semibold text-emerald-700">₦{{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $product->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="px-3 py-1.5 text-xs font-medium text-brand-700 bg-brand-50 border border-brand-200 rounded-lg hover:bg-brand-100 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                          onsubmit="return confirm('Delete this product?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($products->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">{{ $products->links() }}</div>
            @endif
        @else
            <div class="text-center py-16">
                <p class="text-slate-700 font-semibold mb-1">No products yet</p>
                <p class="text-slate-400 text-sm mb-4">Get started by adding your first product</p>
                <a href="{{ route('products.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition">
                    + Add Product
                </a>
            </div>
        @endif
    </div>
</div>
@endsection