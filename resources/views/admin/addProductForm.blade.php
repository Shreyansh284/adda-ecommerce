@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Add Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/products">Products</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/product/add">Add Product</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Add New Product</h4>
                    <form action="/add-product" method="POST" enctype="multipart/form-data">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" name="name" id="productName" class="form-control" placeholder="Enter product name" required>
                        </div>

                        <!-- Product Price and Status -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" name="price" id="productPrice" class="form-control" placeholder="Enter product price" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="productStatus" class="form-label">Status</label>
                                <select name="status" id="productStatus" class="form-select" required>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                        </div>

                        <!-- Product Category and Subcategory -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select name="category" id="productCategory" class="form-select" required>
                                    <option value="electronics">Electronics</option>
                                    <option value="clothing">Clothing</option>
                                    <option value="accessories">Accessories</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="productSubCategory" class="form-label">Sub-category</label>
                                <select name="sub_category" id="productSubCategory" class="form-select">
                                    <option value="headphones">Headphones</option>
                                    <option value="t-shirts">T-Shirts</option>
                                    <option value="watches">Watches</option>
                                </select>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" name="image" id="productImage" class="form-control" accept="image/*" required>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Product Description</label>
                            <textarea name="description" id="productDescription" class="form-control" rows="3" placeholder="Enter product description" required></textarea>
                        </div>

                        <!-- Additional Description -->
                        <div class="mb-3">
                            <label for="additionalDescription" class="form-label">Additional Description</label>
                            <textarea name="additional_description" id="additionalDescription" class="form-control" rows="3" placeholder="Enter additional details about the product"></textarea>
                        </div>

                        <!-- Available Sizes -->
                        <div class="mb-3">
                            <label class="form-label">Available Sizes</label>
                            <div id="sizeFieldsContainer">
                                <div class="row g-2 align-items-center mb-2">
                                    <div class="col-md-5">
                                        <input type="text" name="sizes[]" class="form-control" placeholder="Size (e.g., Small)" required>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" name="stocks[]" class="form-control" placeholder="Stock (e.g., 10)" required>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-size-field">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm mt-2" id="addSizeField">Add More Sizes</button>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
    const addSizeField = document.getElementById('addSizeField');
    const sizeFieldsContainer = document.getElementById('sizeFieldsContainer');

    // Add new size and stock field
    addSizeField.addEventListener('click', () => {
        const sizeFieldHTML = `
            <div class="row g-2 align-items-center mb-2">
                <div class="col-md-5">
                    <input type="text" name="sizes[]" class="form-control" placeholder="Size (e.g., Medium)" required>
                </div>
                <div class="col-md-5">
                    <input type="number" name="stocks[]" class="form-control" placeholder="Stock (e.g., 20)" required>
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger btn-sm remove-size-field">Remove</button>
                </div>
            </div>
        `;
        sizeFieldsContainer.insertAdjacentHTML('beforeend', sizeFieldHTML);
    });

    // Remove size field dynamically
    sizeFieldsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-size-field')) {
            e.target.closest('.row').remove();
        }
    });
</script>
@endsection