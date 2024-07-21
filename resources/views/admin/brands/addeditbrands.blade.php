<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="dealership-form">
        <form class="myform" method="POST" action="{{ !empty($brand)? route('admin.brand.update', ['id' => $brand->id]) : route('admin.brand.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input maxlength="255" type="text" name="name" class="form-control" required placeholder="Name" value="{{ @$brand->name }}" required>
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
                    <label>Name</label>
                    <input maxlength="255" type="text" name="slug" class="form-control" required placeholder="Slug" value="{{ @$brand->slug }}" required>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="cus-btn text-right">
                        <a href="{{ route('admin.brand.index') }}" class="cancle-btn">Back</a>
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


