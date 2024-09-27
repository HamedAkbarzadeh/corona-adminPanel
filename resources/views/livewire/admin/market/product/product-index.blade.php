@push('toast')
    @include('layouts.alerts.toast.success')
@endpush
<div class="col-10 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category</h4>
            <div class=" d-flex flex-row justify-content-between">
                {{-- search --}}
                <div>
                    <input type="text" class="form-control" wire:model.debounce.500ms.live='search'
                        placeholder="search box">
                </div>
                <a wire:navigate href="{{ route('admin.market.product.create') }}"
                    class="btn btn-outline-light px-5 py-2 shadow-box-soft">Create</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    @if ($data->image == null)
                                        <img src="{{ route('generate.image') }}" id="orgImage"
                                            onerror="handleImageError()" width='100' alt="">
                                        <img src="{{ asset('app/' . $data->image) }}" id="replaceImage" class="d-none"
                                            width='100' alt="">
                                    @else
                                        <img src="{{ asset('app/' . $data->image) }}" width='100' alt="">
                                    @endif
                                </td>
                                <td>{{ number_format($data->price) }}</td>
                                <td>{{ $data->category->name }}</td>

                                <td wire:click='changeStatus({{ $data->id }})'>
                                    @if ($data->status == 0)
                                        <label style="cursor: pointer;" class="badge badge-danger">disable</label>
                                    @else
                                        <label style="cursor: pointer;" class="badge badge-success">enable</label>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click='remove({{ $data->id }})' type="button"
                                        class="btn btn-danger">
                                        X
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>
                                    <div class="badge badge-danger w-100">
                                        Is Empty
                                    </div>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $datas->links('livewire::bootstrap') }}
            </div>
        </div>
    </div>
</div>
<script>
    function handleImageError() {
        var imgElement = document.getElementById('orgImage');
        var errorMessage = document.getElementById('replaceImage');

        imgElement.style.display = 'none';
        errorMessage.style.display = 'block';
    }
</script>
