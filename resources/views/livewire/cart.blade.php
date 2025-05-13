<div>
    <h3>Your Cart</h3>
    <ul class="list-group">
        @forelse ($cart as $id => $item)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="d-flex">
                    @if ($item['image'])
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                            style="width: 60px; height: 60px; object-fit: cover; margin-right: 15px;">
                    @endif
                    <div>
                        <strong>{{ $item['name'] }}</strong><br>
                        <small class="text-muted">{{ $item['description'] }}</small><br>
                        ${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }} =
                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                    </div>
                </div>
                <div class="ms-3">
                    <button wire:click="decreaseQuantity({{ $id }})" class="btn btn-sm btn-warning">-</button>
                    <button wire:click="increaseQuantity({{ $id }})" class="btn btn-sm btn-success">+</button>
                    <button wire:click="removeItem({{ $id }})" class="btn btn-sm btn-danger">Remove</button>
                </div>
            </li>
        @empty
            <li class="list-group-item">Your cart is empty.</li>
        @endforelse
    </ul>

    <div class="mt-3">
        <strong>Total: ${{ number_format($this->getTotal(), 2) }}</strong>
    </div>
</div>
