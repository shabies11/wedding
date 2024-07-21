<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="dealership-form">
        <form class="myform" method="POST" action="{{ !empty($faq)? route('admin.faq.update', ['id' => $faq->id]) : route('admin.faq.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Question</label>
                    <input type="text" name="title" class="form-control" placeholder="Question" value="{{ @$faq->title }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Order #</label>
                    <input type="number" name="order_no" class="form-control" placeholder="Order #" min="1" value="{{ @$faq->order_no }}" required>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                    <label>Answer</label>
                    <textarea name="description" class="form-control" placeholder="Answer" required>{{ @$faq->description }}</textarea>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="cus-btn text-right">
                        <a href="{{ url()->previous() }}" class="cancle-btn">Back</a>
                        <button type="submit" class="send-btn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="pluginCss"></x-slot>
</x-admin-layout>
