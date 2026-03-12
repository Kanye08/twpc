@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="max-w-2xl">
    <div class="mb-5">
        <a href="{{ route('products.index') }}" class="text-sm text-slate-500 hover:text-slate-700">← Back to Products</a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-semibold text-slate-800 mb-5">Edit Product</h2>

        <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                       class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition
                              {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                @error('name') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition resize-none
                                 {{ $errors->has('description') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-slate-700 mb-1.5">Price (₦)</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">₦</span>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0"
                           class="w-full pl-9 pr-4 py-2.5 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition
                                  {{ $errors->has('price') ? 'border-red-400 bg-red-50' : 'border-slate-300' }}">
                </div>
                @error('price') <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-brand-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition shadow-sm">
                    Save Changes
                </button>
                <a href="{{ route('products.index') }}" class="px-6 py-2.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-200 transition">
                    Cancel
                </a>
            </div>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-200">
            <h3 class="text-sm font-semibold text-red-600 mb-3">Danger Zone</h3>
            <form action="{{ route('products.destroy', $product) }}" method="POST"
                  onsubmit="return confirm('Delete this product permanently?')">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-50 text-red-700 border border-red-200 text-sm font-medium rounded-lg hover:bg-red-100 transition">
                    Delete Product
                </button>
            </form>
        </div>
    </div>
</div>
@endsection