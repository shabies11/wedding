<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="dealership-form">
        <form class="myform" method="POST" action="{{ !empty($page)? route('admin.page.update', ['id' => $page->id]) : route('admin.page.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>City</label>
                    <select class="form-control" name="city">
                        <option disabled selected>Select City</option>
                        <option {{ @$page->city == 'Islamabad' ? 'selected' : '' }} value="Islamabad">Islamabad</option>
                        <option {{ @$page->city == 'Mandi Baha Uddin' ? 'selected' : '' }} value="Mandi Baha Uddin">Mandi Baha Uddin</option>
                        <option {{ @$page->city == 'Jhelum' ? 'selected' : '' }} value="Jhelum">Jhelum</option>
                        <option {{ @$page->city == 'Faisalabad' ? 'selected' : '' }} value="Faisalabad">Faisalabad</option>
                        <option {{ @$page->city == 'Lahore' ? 'selected' : '' }} value="Lahore">Lahore</option>
                        <option {{ @$page->city == 'Karachi' ? 'selected' : '' }} value="Karachi">Karachi</option>
                    </select>

                    <label>Venue Tagline</label>
                    <input maxlength="255" type="text" name="tagline" class="form-control" required placeholder="Venue tagline" value="{{ @$page->tagline }}" required>
                    <label>Vendor:(Like: wedding, birthday,function etc.)</label>
                    <select type="text" class="form-control" name="vendor">
                        <option disabled selected>Select Vendor Type</option>
                        <option {{ @$page->vendor == 'Wedding Venues' ? 'selected' : '' }} value="Wedding Venues">Wedding Venues</option>
                        <option {{ @$page->vendor == 'Catering' ? 'selected' : '' }} value="Catering">Catering</option>
                        <option {{ @$page->vendor == 'Decoration' ? 'selected' : '' }} value="Decoration">Decoration</option>
                        <option {{ @$page->vendor == 'Bridal Entry' ? 'selected' : '' }} value="Bridal Entry">Bridal Entry</option>
                        <option {{ @$page->vendor == 'Groom Entry' ? 'selected' : '' }} value="Groom Entry">Groom Entry</option>

                    </select>
                    {{-- <input maxlength="255" type="text" name="purpose" class="form-control" required placeholder="Purpose" value="{{ @$page->purpose }}" required> --}}
                </div>
                <div class="form-group col-md-6">
                    <label>Featured Image <a href="javascript:;" id="selectimage" class="edit-logo" onclick="selectImage('featured_image');"><img class="img-fluid" src="{{ asset('img/pen.svg') }}" alt="Select Image"> Select File</a></label>
                    <div style="display: none">
                        <input type="file" name="featured_image" id="featured_image" />
                    </div>
                    <div class="update-logo">
                        <img class="img-thumbnail" style="height: 100px;cursor: pointer" onclick="selectImage('featured_image');" src="{{ !empty($page)? $page->featured_image : asset('img/placeholder-img.png') }}" alt="">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label>Meta Title</label>
                    <input maxlength="255" type="text" name="meta_title" class="form-control" required placeholder="Meta Title" value="{{ @$page->meta_title }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Meta Description</label>
                    <input maxlength="255" type="text" name="meta_description" class="form-control" required placeholder="Meta Description" value="{{ @$page->meta_description }}" required>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                    <label>Details</label>
                    <textarea name="description" class="form-control tinymceeditor" rows="5">{{ @$page->description }}</textarea>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="cus-btn text-right">
                        <a href="{{ route('admin.page.index') }}" class="cancle-btn">Back</a>
                        <button type="submit" class="send-btn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="pluginCss"></x-slot>
    <x-admin.tinymce/>
</x-admin-layout>
