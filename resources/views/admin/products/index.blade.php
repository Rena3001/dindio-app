@extends('admin.layout.master')

@push('page_title')
Məhsullar
@endpush
@push('section_title')
Məhsulların Siyahısı
@endpush

@section('content')

<div class="card mb-3">
    <div class="card-header p-4 border-bottom bg-body d-flex align-items-center justify-content-between my-3">
        <a class="btn btn-sm btn-phoenix-success" href="{{ route('admin.products.create') }}" role="button" aria-controls="basic-example-code"> Yenisini əlavə edin</a>
        <div class="d-none ms-3" id="bulk-select-actions">
            <div class="d-flex">
                <select class="form-select form-select-sm" aria-label="Bulk actions" id="bulk-action-select">
                    <option value="delete">Delete</option>
                </select>
                <button class="btn btn-phoenix-danger btn-sm ms-2" type="button" id="apply-bulk-action">Apply</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="tableExample" data-list='{"valueNames":["order","id","title","category","brand","model"],"page":5,"pagination":true}'>
            <div class="d-flex align-items-center mb-3 ">
                <div class="search-box mx-auto">
                    <form class="position-relative">
                        <input class="form-control search-input search form-control-sm" type="search" placeholder="Axtarış" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="reordered-box">
                    <a href="{{ route('admin.products.reorder') }}" class="btn btn-phoenix-warning btn-sm ms-2">Yeniden Sırala</a>
                </div>
            </div>
            <div class="table-responsive mx-n1 px-1">
                <table class="table table-sm border-top border-translucent fs-9 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs-9 align-middle ps-0 border-top" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" id="bulk-select-example" type="checkbox" data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' indeterminate="indeterminate">
                                </div>
                            </th>
                            <th class="sort border-top ps-3" data-sort="order">Order</th>
                            <th class="sort border-top ps-3" data-sort="id">İd</th>
                            <th class="sort border-top w-auto" data-sort="title">Başlıq</th>
                            <th class="sort border-top w-auto" data-sort="category">Kateqoriya</th>
                            <th class="sort border-top w-auto" data-sort="brand">Brend</th>
                            <th class="sort border-top w-auto" data-sort="model">Model</th>
                            <th class="sort border-top w-auto">Şəkil</th>
                            <th class="sort text-end align-middle pe-0 border-top" scope="col">Fəaliyyətlər</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="bulk-select-body">
                        @foreach ($products as $product)
                        <tr data-id='{{$product->id}}'>
                            <td class="fs-9 align-middle">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" type="checkbox" data-bulk-select-row='{"order":{{$product->order}},"id":{{$product->id}}}'>
                                </div>
                            </td>
                            <td class="align-middle ps-3 order">{{ $product->order }}</td>
                            <td class="align-middle ps-3 id">{{ $product->id }}</td>
                            <td class="align-middle ps-3 title">
                                {{ $product->title }}
                            </td>
                            <td class="align-middle ps-3 category">{{$product->category?->title}}</td>
                            <td class="align-middle ps-3 brand">{{$product->brand?->title}}</td>
                            <td class="align-middle ps-3 model">{{$product->model?->title}}</td>
                            <td class="align-middle title">
                                @if ($product->image)
                                <div class="image">
                                    <img src="{{ $product->image }}" alt="{{$product->title}}" class="img-fluid">
                                </div>
                                @endif
                            </td>

                            <td class="align-middle white-space-nowrap text-end pe-0">
                                <div class="btn-reveal-trigger position-static">
                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="{{ route('admin.products.show', $product->id) }}"><span data-feather="info">Göstər</span></a>
                                        <a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}"><span data-feather="edit">Redakte et</span></a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" onclick="return confirm('Əminsiniz?','Bəli','Xeyir')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" style="width: fit-content;" class="dropdown-item text-danger">
                                                <span data-feather="delete">Sil</span></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                <div class="d-flex">
                    <button class="page-link" data-list-pagination="prev">
                        <span class="fas fa-chevron-left"></span>
                    </button>
                    <ul class="mb-0 pagination"></ul>
                    <button class="page-link pe-0" data-list-pagination="next">
                        <span class="fas fa-chevron-right"></span>
                    </button>
                </div>
            </div>
            <form id="bulk-delete-form" method="post" action="{{ route('admin.products.bulk-delete') }}" class="d-none">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>


@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const applyBulkActionBtn = document.getElementById('apply-bulk-action');
        const allItems = JSON.parse('{!! json_encode($products, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}');
        let orderedProducts;
        if (allItems && allItems.length > 0) {
            orderedProducts = allItems.map((value, index, array) => {
                return {
                    order: value.order,
                    id: value.id,
                };
            });
        }

        if (applyBulkActionBtn) {
            applyBulkActionBtn.addEventListener('click', function() {
                let selectedAction = document.getElementById('bulk-action-select').value;
                if (selectedAction === 'delete') {
                    const e = document.getElementById("bulk-select-example"),
                        i = window.phoenix.BulkSelect.getInstance(e);
                    let selectedIds = Array.from(i.getSelectedRows()).map(row => row.id);
                    if (selectedIds.length > 0) {
                        const formDelete = document.getElementById('bulk-delete-form');
                        selectedIds.forEach(id => {
                            let input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'selected_ids[]';
                            input.value = id;
                            formDelete.appendChild(input);
                        });
                        formDelete.submit();
                    } else {
                        alert('Please select at least one brand to delete.');
                    }
                }
            });
        }

        const tbody = document.querySelector('tbody');
        if (tbody) {
            Sortable.create(tbody, {
                animation: 150,
                onEnd: function(evt) {
                    const items = evt.from.children;
                    const products = [];
                    let ids = [],
                        orders = [];

                    for (let i = 0; i < items.length; i++) {
                        const dataId = items[i].querySelector('.id').innerText.trim();
                        const dataOrder = items[i].querySelector('.order').innerText.trim();
                        ids = [...ids, dataId];
                        orders = [...orders, dataOrder];
                    }

                    orders = orders.sort((a, b) => a - b);

                    for (let j = 0; j < ids.length; j++) {
                        products.push({
                            id: ids[j],
                            order: orders[j],
                        });
                    }

                    fetch(`{{ url(route('admin.products.changeOrder')) }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(products)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // console.log('Order updated successfully.');
                                if (data.req && data.req.length > 0) {
                                    data.req.forEach(item => {
                                        const row = document.querySelector(`tr[data-id="${item.id}"]`);
                                        if (row) {
                                            row.querySelector('.order').innerText = item.order;
                                        }
                                    });
                                }
                            } else {
                                console.error('Error updating order:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        }
    });
</script>
@endpush
