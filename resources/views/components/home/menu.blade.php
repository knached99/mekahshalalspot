@props(['sections', 'menuItems'])

@php
    use Illuminate\Support\Str;
@endphp
<div style="display: none;">
<livewire:cart />
</div>
<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Our Menu</h2>
        </div>

        <!-- Filters Menu -->
        <ul class="filters_menu">
            <li class="section-item active" data-filter="all">All</li>
            @foreach ($sections as $section)
                <li class="section-item" data-filter="{{ Str::slug($section->name) }}">
                    {{ $section->name }}
                </li>
            @endforeach
        </ul>

        <!-- Menu Items -->
        <div class="filters-content">
            <div class="row grid">
                @foreach ($menuItems as $item)
                    @php
                        $sectionSlug = Str::slug($item->menuSection->name);
                    @endphp
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 menu-item {{ $sectionSlug }}">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
                            </div>
                            <div class="detail-box">
                                <h5>{{ $item->name }}</h5>
                                <p>{{ $item->description }}</p>
                                <div class="options">
                                    <h6>${{ number_format($item->price, 2) }}</h6>
                                
                               <livewire:menu-item-button :item="json_encode([
                                'id' => $item->itemID,
                                'name' => $item->name,
                                'price' => $item->price,
                                'image' => asset('storage/' . $item->image_path),
                                'description' => $item->description
                            ])" />


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@once
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const sectionItems = document.querySelectorAll('.section-item');
                const menuItems = document.querySelectorAll('.menu-item');

                sectionItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const filter = item.getAttribute('data-filter');

                        // Highlight active filter
                        sectionItems.forEach(i => i.classList.remove('active'));
                        item.classList.add('active');

                        // Filter menu items
                        menuItems.forEach(menuItem => {
                            if (filter === 'all' || menuItem.classList.contains(filter)) {
                                menuItem.style.display = 'block';
                            } else {
                                menuItem.style.display = 'none';
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endonce
