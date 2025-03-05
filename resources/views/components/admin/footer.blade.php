
<!-- Adding dynamic menu -->

    <script>
        const menuSections = document.getElementById('menuSections');
        const addSectionBtn = document.getElementById('addSectionBtn');
        const addItemModal = new bootstrap.Modal(document.getElementById('addItemModal'));
        let currentSectionId = null;

        // Add a new section
        addSectionBtn.addEventListener('click', () => {
            const sectionId = `section-${Date.now()}`;
            const sectionDiv = document.createElement('div');
            sectionDiv.className = 'card mb-4';
            sectionDiv.id = sectionId;
            sectionDiv.innerHTML = `
                <div class="card-header d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control w-75" placeholder="Section Name" />
                    <button class="btn btn-danger btn-sm" onclick="deleteSection('${sectionId}')">Delete Section</button>
                </div>
                <div class="card-body">
                    <button class="btn btn-success btn-sm mb-3" onclick="addItem('${sectionId}')">Add Item</button>
                    <div class="row g-3" id="${sectionId}-items">
                        <!-- Items will be added here -->
                    </div>
                </div>
            `;
            menuSections.appendChild(sectionDiv);
        });

        // Delete a section
        function deleteSection(sectionId) {
            const section = document.getElementById(sectionId);
            menuSections.removeChild(section);
        }

        // Add an item to a section
        function addItem(sectionId) {
            currentSectionId = sectionId;
            addItemModal.show();
        }

        // Image preview functionality
        document.getElementById('itemImage').addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = event.target.result;
                    imagePreview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle item form submission
        document.getElementById('addItemForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const itemName = document.getElementById('itemName').value;
            const itemPrice = document.getElementById('itemPrice').value;
            const itemImage = document.getElementById('itemImage').files[0];

            if (!itemImage) {
                alert('Please upload an image.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'col-md-4';
                itemDiv.innerHTML = `
                    <div class="card">
                        <img src="${event.target.result}" class="card-img-top" alt="${itemName}" style="max-height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">${itemName}</h5>
                            <p class="card-text">Price: $${itemPrice}</p>
                            <button class="btn btn-danger btn-sm" onclick="this.closest('.col-md-4').remove()">Delete Item</button>
                        </div>
                    </div>
                `;
                document.getElementById(`${currentSectionId}-items`).appendChild(itemDiv);
                addItemModal.hide();
                document.getElementById('addItemForm').reset();
                document.getElementById('imagePreview').classList.add('d-none');
            };
            reader.readAsDataURL(itemImage);
        });
    </script>
<!-- / Adding dynamic menu -->