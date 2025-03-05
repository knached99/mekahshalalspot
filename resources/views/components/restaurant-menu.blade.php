

<div class="container my-5">
    <h1 class="text-center mb-4">Restaurant Menu Management</h1>

    <!-- Add Section -->
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="New Section Name" wire:model="newSectionName">
        <button class="btn btn-primary mt-2" wire:click="addSection">Add Section</button>
    </div>
    <div class="card mb-4">
    <div class='card-header d-flex justify-content-between align-items-center'>
    <h5>Section Name</h5>
    <button class="btn btn-danger btn-sm">Delete</button>
    </div>

    <div class="card-body">
    <button class="btn btn-secondary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="addItemModal">Add Item</button>

    <div class="row g-3">
    <div class="col-md-4">
    <div class="card">
    <img src="#" class="card-img-top" alt="Card Image"/>

    <div class="card-body">
    <h5 class="card-title">Card Title</h5>
    <p class="card-text">Price: $0.00</p>
    </div>
    </div>
    </div>
    </div>
    </div>



    <!-- Modal for Adding Items -->
    <div wire:ignore.self class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Menu Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addItem">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" wire:model="itemName" required>
                        </div>
                        <div class="mb-3">
                            <label for="itemPrice" class="form-label">Item Price</label>
                            <input type="number" class="form-control" wire:model="itemPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="itemImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" wire:model="itemImage" accept="image/*">
                            {{-- @if ($itemImage)
                                <img src="{{ $itemImage->temporaryUrl() }}" alt="Image Preview" class="img-fluid mt-2" style="max-height: 150px;">
                            @endif --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
