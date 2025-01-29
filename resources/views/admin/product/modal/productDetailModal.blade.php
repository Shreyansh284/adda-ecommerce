<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Product Image -->
                        <img src="{{ asset($product->images->first()->image) }}" alt="Product Image"
                            class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <h5><strong>Product Name:</strong> <span class="text-primary">{{ $product->productName }}</span>
                        </h5>
                        <p><strong>Product ID:</strong> {{ $product->id }}</p>
                        <p><strong>Price:</strong> {{ $product->price }}</p>
                        {{-- <p><strong>Status:</strong> Available</p> --}}
                        <p><strong>Category:</strong> {{ $product->category->categoryName }}</p>
                        <p><strong>Sub-category:</strong> {{ $product->subcategory->subCategoryName }}</p>
                        <p><strong>Details:</strong> {{ $product->description }}</p>
                        <p><strong>Additional Description:</strong> {{ $product->additionalInfo }}</p>
                        {{-- <p><strong>Available Sizes:</strong></p>
                        <ul>
                            <li>Small - 10 in stock</li>
                            <li>Medium - 5 in stock</li>
                            <li>Large - 2 in stock</li>
                        </ul> --}}
                        <p><strong>Available Sizes:</strong></p>
                        <ul>
                            @foreach ($product->sizes as $size)
                                <li>{{ strtoupper($size->size) }} - {{ $size->quantity }} in stock</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
