@vite(['resources/css/components/edit-product-modal.css', 'resources/css/components/edit-product-modal.js'])
@extends('layout/large-modal')

@section('modal-title', 'Edit Product')

@section('modal-body')
    <div id="editProductModal" class="edit-product-blocks">
        <div class="first-block">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-content">
                    <label for="name">Product Name:</label>
                    <input class="name-input" type="text" id="name" name="name" maxlength="30" value="{{ old('name') }}">
                    @if($errors && $errors->has('name'))
                        <div style="color: red; margin-bottom: 10px;">
                            <span class="error-messages">{{ $errors->first('name') }}</span>
                        </div> 
                    @endif
                    <label for="description">Description:</label>
                    <textarea type="text" id="description" name="description" maxlength="140" rows="3">{{ old('description') }}</textarea>
                    @if($errors && $errors->has('description'))
                        <div style="color: red; margin-bottom: 10px;">
                            <span class="error-messages">{{ $errors->first('description') }}</span>
                        </div> 
                    @endif
                    <label for="sale-url">Sale URL:</label>
                    <textarea type="text" id="sale-url" name="sale-url" maxlength="500" rows="2">{{ old('sale-url') }}</textarea>
                    @if($errors && $errors->has('sale-url'))
                        <div style="color: red; margin-bottom: 10px;">
                            <span class="error-messages">{{ $errors->first('sale-url') }}</span>
                        </div> 
                    @endif
                    <label for="image-url">Image URL:</label>
                    <textarea type="text" id="image-url" name="image-url" maxlength="500" rows="2">{{ old('image-url') }}</textarea>
                    @if($errors && $errors->has('image-url'))
                        <div style="color: red; margin-bottom: 10px;">
                            <span class="error-messages">{{ $errors->first('image-url') }}</span>
                        </div> 
                    @endif
                    <div class="price-category">
                        <div>
                            <label for="price">Price:</label>
                            <input class="price-input" id="price" name="price" maxlength="10" value="{{ old('price') }}">
                            @if($errors && $errors->has('price'))
                                <div style="color: red; margin-bottom: 10px;">
                                    <span class="error-messages">{{ $errors->first('price') }}</span>
                                </div> 
                            @endif    
                        </div>
                        
                        <div>
                            <label for="price">Category:</label>
                            <select class="category-option" id="category" name="category">
                                <option value="">Select a Category</option>
                                <option value="1" {{ old('category') == 1 ? 'selected' : '' }}>Eletronic</option>
                                <option value="2" {{ old('category') == 2 ? 'selected' : '' }}>Fashion</option>
                                <option value="3" {{ old('category') == 3 ? 'selected' : '' }}>Home and Decoration</option>
                                <option value="4" {{ old('category') == 4 ? 'selected' : '' }}>Beauty and Self Care</option>
                                <option value="5" {{ old('category') == 5 ? 'selected' : '' }}>Gift Card</option>
                            </select>
                            @if($errors && $errors->has('category'))
                                <div style="color: red; margin-bottom: 10px;">
                                    <span class="error-messages">{{ $errors->first('category') }}</span>
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit">Save</button>
                <button id="closeEditModalBtn">Close</button>
            </form>
        </div>
        <div class="second-block">
            <div class="product-card">
                <div class="product-card-top">
                    <h3 id="preview-name"></h3>
                    <i id="product-card-favorite-icon" class="fa-regular fa-heart"></i>
                </div>
                <div class="product-card-body">
                    <div class="category" id="preview-category"></div>
                    <img id="preview-image" src="" alt="Product Name">
                    <div class="price-buy">
                        <p id="preview-price" class="price"></p>
                    </div>
                    <p class="more-details">Click to view more details</p>
                </div>
                <div class="product-card-footer">
                    <div class="product-card-profile">
                        <i id="product-card-profile-icon" class="fa-regular fa-user"></i><p>{{ auth()->user()->first_name}}</p>
                    </div>
                    {{-- <p>{{now()->format('d/m/Y')}}</p> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal-footer')
@endsection