@php 
$summary = $this->getCartSummary();
@endphp
<div class="container my-4">
    <h3 class="mb-3 mt-5 fw-bold">Your Cart</h3>
    @if($error)
    <div class="alert alert-danger">{{$error}}
    @endif
    <ul class="list-group">
        @forelse ($cart as $id => $item)
            <li class="list-group-item">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start">
                    <div class="d-flex align-items-start w-100">
                
                        @if ($item['image'])
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                        @endif
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $item['name'] }}</h6>
                            <p class="mb-1 text-muted small">{{ $item['description'] }}</p>
                            <div class="fw-semibold">
                                ${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}
                                = ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 mt-md-0 d-flex flex-wrap gap-2">
                       <button wire:click="increaseQuantity('{{ $id }}')" class="btn btn-sm btn-outline-success">
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <span class="inline-block fw-bold">{{$item['quantity']}}</span>

                    <button wire:click="decreaseQuantity('{{ $id }}')" class="btn btn-sm btn-outline-warning">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                        <button wire:click="removeItem('{{ $id }}')" class="btn btn-sm btn-outline-danger">
                        Remove
                    </button>
                    </div>
                </div>
            </li>
        @empty
            <li class="list-group-item text-center">Your cart is empty.</li>
        @endforelse
    </ul>
    
    <div class="mt-4 text-end">
    <h5 class="fw-bold block">Subtotal: ${{ number_format($summary['subtotal'], 2) }} </h5>
    <h5 class="fw-bold block">Tax (6.35%): ${{ number_format($summary['tax'], 2) }} </h5>
    <h5 class="fw-bold block">Total: ${{ number_format($summary['total'], 2) }}</h5>
    @if(!empty($summary['subtotal']) || !empty($summary['tax']) || !empty($summary['total']))
    <button class="btn btn-outline-dark">Continue <i class="fa-solid fa-arrow-right-long"></i></button>
    @endif
    </div>
</div>
