<x-admin-layout>
    <x-slot name="pageName">{{ $pageName }}</x-slot>
    <x-slot name="breadCrumbs">
        <x-admin.breadcrumbs :pageName="$pageName" :breadCrumbs="$breadCrumbs"/>
    </x-slot>
    <div class="table-area product-table">
        <!-- action-btn -->
        <div class="action-drop">
            <a class="action-btn" href="{{ route('admin.product.create') }}">Add Product</a>
        </div>

        <table id="listingtable" class="display">
            <thead>
            <tr>
                <th class="all">Title</th>
                <th>URL (Slug)</th>
                <th>Image</th>
                <th>Category</th>
                <th>SubCategory</th>

                <th>brand_id</th>
                <th>color_id</th>
                <th>size_id</th>
            
                <th>price</th>
                <th>qty</th>

                <th class="all" style="width:70px height:30px;">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <x-slot name="pluginCss">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.dataTables.min.css') }}">
    </x-slot>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#listingtable').addClass('nowrap').dataTable({
                responsive: true,
                fixedHeader: true,
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: "{{ route('admin.product.tabledata') }}",
                    type: "POST",
                    async: true,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                columns: [
                    { data: "title" },
                    { data: "slug" },
                    { data: "featured_image" },
                    { data: "category_id" },
                    { data: "sub_category_id" },
                    { data: "brand_id" },
                    { data: "color_id" },
                    { data: "size_id" },
               
                    { data: "price" },
                    { data: "quantity" },

                    { data: "actions" }
                ],
                columnDefs: [
                    {targets: [2], orderable: false }
                ]
            });
        });
    </script>
</x-admin-layout>

