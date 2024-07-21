<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="dealership-form">
        <form class="myform" method="POST" action="{{ !empty($product)? route('admin.product.update', ['id' => $product->id]) : route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Title</label>
                    <input maxlength="255" type="text" name="title" class="form-control" required placeholder="title" value="{{ @$product->title }}" required>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>Category</label>
                    <select class="form-control" id="categories" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ @$Categories->category_id == $category->id? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>Sub Category</label>
                    <select class="form-control" id="categories" name="sub_category_id" required>
                        @foreach ($Subcategories as $sub_category)
                        <option value="{{ $sub_category->id }}" {{ @$SubCategories->sub_category_id == $sub_category->id? 'selected' : '' }}>{{ $sub_category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>brand</label>
                    <select class="form-control" id="categories" name="brand_id" required>
                        @foreach ($Brands as $brand)
                        <option value="{{ $brand->id }}" {{ @$brand->brand_id == $brand->id? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>Color</label>
                    <select class="form-control" id="categories" name="color_id" required>
                        @foreach ($color as $colors)
                        <option value="{{ $colors->id }}" {{ @$colors->color_id == $colors->id? 'selected' : '' }}>{{ $colors->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>Size</label>
                    <select class="form-control" id="categories" name="size_id" required>
                        @foreach ($size as $sizes)
                        <option value="{{ $sizes->id }}" {{ @$sizes->size_id == $sizes->id? 'selected' : '' }}>{{ $sizes->title }}</option>
                        @endforeach
                    </select>
                </div>

          

             

                <div class="form-group col-md-6">
                    <label>Featured Image <a href="javascript:;" id="selectimage" class="edit-logo" onclick="selectImage('featured_image');"><img class="img-fluid" src="{{ asset('img/pen.svg') }}" alt="Select Image"> Select File</a></label>
                    <div style="display: none">
                        <input type="file" name="featured_image" id="featured_image" />
                    </div>
                    <div class="update-logo">
                        <img class="img-thumbnail" style="height: 100px;cursor: pointer" onclick="selectImage('featured_image');" src="{{ !empty($blog)? $blog->featured_image : asset('img/placeholder-img.png') }}" alt="">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>slug</label>
                    <input maxlength="255" type="text" name="slug" class="form-control" required placeholder="Slug" value="{{ @$product->slug }}" required>
                </div>

             

                <div class="form-group col-md-12">
                    <label>price</label>
                    <input maxlength="255" type="text" name="price" class="form-control" required placeholder="meta_price" value="{{ @$product->meta_price }}" required>
                </div>

                <div class="form-group col-md-12">
                    <label>qty</label>
                    <input maxlength="255" type="text" name="qty" class="form-control" required placeholder="qty" value="{{ @$product->qty }}" required>
                </div>

                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="cus-btn text-right">
                        <a href="{{ route('admin.product.index') }}" class="cancle-btn">Back</a>
                        <button type="submit" class="send-btn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="pluginCss">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    </x-slot>
    <x-admin.tinymce/>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#categories").select2();
        });
    </script>
</x-admin-layout>


