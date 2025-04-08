<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Product CRUD with Livewire</h2>

    <form wire:submit.prevent="store" class="mb-6" id="product-form">
        <input type="text" wire:model.defer="name" placeholder="Product Name" class="border p-2 rounded">
        <input type="number" wire:model.defer="price" placeholder="Price" class="border p-2 rounded">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</button>
        <button wire:click="resetInput" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>

    </form>

    <table class="table-auto w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">ID</th>
                <th class="p-2">Name</th>
                <th class="p-2">Price</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr wire:key="product-{{ $product->id }}">
                <td class="p-2">{{ $product->id }}</td>
                <td class="p-2">{{ $product->name }}</td>
                <td class="p-2">{{ $product->price }}</td>
                <td class="p-2">
                    <button wire:click="edit({{ $product->id }})" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $product->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- EDIT MODAL --}}
    @if($showEditModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h3 class="text-lg font-bold mb-4">Edit Product</h3>

            <input type="text" wire:model.defer="name" class="border p-2 rounded w-full mb-2" placeholder="Product Name">
            <input type="number" wire:model.defer="price" class="border p-2 rounded w-full mb-4" placeholder="Price">

            <div class="flex justify-end space-x-2">
                <button wire:click="close" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button wire:click="update" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </div>
    </div>
    @endif
</div>
