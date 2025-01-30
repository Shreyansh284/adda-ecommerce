{{-- <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($product->images->first()->image) }}" alt="Product Image"
                            class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <h5><strong>Product Name:</strong> <span class="text-primary">{{ $product->productName }}</span>
                        </h5>
                        <p><strong>Product ID:</strong> {{ $product->id }}</p>
                        <p><strong>Price:</strong> {{ $product->price }}</p>
                        <p><strong>Category:</strong> {{ $product->category->categoryName }}</p>
                        <p><strong>Sub-category:</strong> {{ $product->subcategory->subCategoryName }}</p>
                        <p><strong>Details:</strong> {{ $product->description }}</p>
                        <p><strong>Additional Description:</strong> {{ $product->additionalInfo }}</p>
                      
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
</div> --}}
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Product Image -->
                        <img id="product-image" src="" alt="Product Image" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8 border p-2">
                        <h5><strong>Product Name:</strong> <span class="text-primary text-capitalize"
                                id="product-name"></span></h5>
                        <hr>
                        <p><strong>Product ID:</strong> <span id="product-id"></span></p>
                        <p><strong>Price:</strong> <span id="product-price"></span></p>
                        <p><strong>Category:</strong> <span id="product-category"></span></p>
                        <p><strong>Sub-category:</strong> <span id="product-subcategory"></span></p>
                        <p><strong>Details:</strong> <span id="product-description"></span></p>
                        <p><strong>Additional Description:</strong> <span id="product-additional-info"></span></p>
                        <p><strong>Available Sizes:</strong></p>
                        <ul id="product-sizes"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".view-product").forEach(function(button) {
            button.addEventListener("click", function() {

                let product = JSON.parse(this.getAttribute("data-product"));
                console.log(product);

                document.getElementById("product-image").src = product.images.length ?
                    "{{ asset('') }}" + product.images[0].image :
                    "{{ asset('default.jpg') }}";
                document.getElementById("product-name").innerText = product.productName;
                document.getElementById("product-id").innerText = product.id;
                document.getElementById("product-price").innerText = product.price;
                document.getElementById("product-category").innerText = product.category ?
                    product.category.categoryName : "N/A";
                document.getElementById("product-subcategory").innerText = product.subcategory ?
                    product.subcategory.subCategoryName : "N/A";
                document.getElementById("product-description").innerText = product.description;
                document.getElementById("product-additional-info").innerText = product
                    .additionalInfo;

                let sizesList = document.getElementById("product-sizes");
                sizesList.innerHTML = "";
                if (product.sizes && product.sizes.length > 0) {
                    product.sizes.forEach(size => {
                        let li = document.createElement("li");
                        li.innerText = size.size.toUpperCase() + " - " + size.quantity +
                            " in stock";
                        sizesList.appendChild(li);
                    });
                } else {
                    sizesList.innerHTML = "<li>No sizes available</li>";
                }
            });
        });
    });
</script>
