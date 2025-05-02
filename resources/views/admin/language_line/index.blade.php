@extends('admin.layout.master')

@push('page_title')
Statik Tərcümələr
@endpush
@push('section_title')
Statik Tərcümələrin siyahısı
@endpush

@section('content')
<div class="card mb-3">
    <div class="card-header p-4 border-bottom bg-body d-flex align-items-center justify-content-between my-3">
        <a class="btn btn-sm btn-phoenix-success" href="{{ route('admin.language_line.create') }}" role="button"
            aria-controls="basic-example-code">Yenisini əlavə edin</a>
        <div class="ms-3" id="bulk-select-actions">
            <div class="d-flex">
                <select class="form-select form-select-sm" aria-label="Bulk actions" id="bulk-action-select">
                    <option value="delete">Delete</option>
                </select>
                <button class="btn btn-phoenix-danger btn-sm ms-2" type="button" id="apply-bulk-action">Apply</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="p-4 code-to-copy">
            <div id="tableExample3" data-list='{"valueNames":["id","group","key", "text"],"page":5,"pagination":true}'>
                <div class="search-box mb-3 mx-auto">
                    <form class="position-relative">
                        <input class="form-control search-input search form-control-sm" type="search"
                            placeholder="Axtarış" aria-label="Search">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
                <div class="table-responsive">
                    <form id="bulk-delete-form" method="post" action="{{ route('admin.language_line.bulk-delete') }}">
                        @csrf
                        @method('delete')
                        <table class="table table-striped table-sm fs-9 mb-0">
                            <thead>
                                <tr>
                                    <th class="white-space-nowrap border-top fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                        <div class="form-check mb-0 fs-8">
                                            <input class="form-check-input" id="bulk-select-all" type="checkbox">
                                        </div>
                                    </th>
                                    <th class="sort border-top ps-3" data-sort="id">Id</th>
                                    <th class="sort border-top" data-sort="group">Qrup</th>
                                    <th class="sort border-top" data-sort="key">Açar soz</th>
                                    <th class="sort border-top w-auto" data-sort="text">Mətn</th>
                                    <th class="sort text-end align-middle pe-0 border-top" scope="col">Fəaliyyətlər</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($models as $model)
                                <tr>
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8">
                                            <input class="form-check-input" type="checkbox" name="selected_ids[]" value="{{ $model->id }}">
                                        </div>
                                    </td>
                                    <td class="align-middle ps-3 id">{{ $model->id }}</td>
                                    <td class="align-middle group">{{ $model->group }}</td>
                                    <td class="align-middle key">{{ $model->key }}</td>
                                    <td class="align-middle text">
                                        @php
                                        $texts = $model->text;
                                        @endphp
                                        @if (is_array($texts))
                                        @foreach ($texts as $lang => $text)
                                        <p class="m-0 my-2"><strong>{{ strtoupper($lang) }}:</strong>
                                            {{ Str::limit($text, 50) }}
                                        </p>
                                        @endforeach
                                        @else
                                        <p class="m-0 my-2">{{ $model->text }}</p>
                                        @endif
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end pe-0">
                                        <div class="btn-reveal-trigger position-static">
                                            <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                <span class="fas fa-ellipsis-h fs-10"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="{{ route('admin.language_line.show', $model->id) }}"><span data-feather="info"></span></a>
                                                <a class="dropdown-item" href="{{ route('admin.language_line.edit', $model->id) }}"><span data-feather="edit"></span></a>
                                                <div class="dropdown-divider"></div>
                                                <form action="{{ route('admin.language_line.destroy', $model->id) }}" method="post" onclick="return confirm('Əminsiniz?','Bəli','Xeyir')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="dropdown-item text-danger"><span data-feather="delete"></span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
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
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('apply-bulk-action').addEventListener('click', function() {
        var selectedAction = document.getElementById('bulk-action-select').value;
        if (selectedAction === 'delete') {
            var selectedIds = document.querySelectorAll('input[name="selected_ids[]"]:checked');
            if (selectedIds.length > 0) {
                document.getElementById('bulk-delete-form').submit();
            } else {
                alert('Please select at least one translation to delete.');
            }
        }
    });

    document.getElementById('bulk-select-all').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>
@endsection
