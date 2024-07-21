<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="dealership-form">
        <form class="myform" method="POST" action="{{ !empty($color)? route('admin.color.update', ['id' => $color->id]) : route('admin.color.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>title</label>
                    <input maxlength="255" type="text" name="title" class="form-control" required placeholder="" value="{{ @$color->title }}" required>
                </div>
                

                <div class="clearfix"></div>
                <div class="form-group col-md-2">
                    <label>Code</label>
                    <input maxlength="255" type="color" name="code" class="form-control"  value="{{ @$color->code }}" required>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="cus-btn text-right">
                        <a href="{{ route('admin.color.index') }}" class="cancle-btn">Back</a>
                        <button type="submit" class="send-btn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="pluginCss"></x-slot>
</x-admin-layout>
