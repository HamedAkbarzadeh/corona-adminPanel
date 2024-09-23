<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Brand</h4>
            <div class=" d-flex flex-row justify-content-between">
                <p class="card-description"></p>
                <button class="btn btn-outline-light px-5 py-2 shadow-box-soft">Create</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Persian Name</th>
                            <th>Original Name</th>
                            <th>Logo</th>
                            <th>Tags</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->persian_name }}</td>
                                <td>{{ $data->original_name }}</td>
                                <td class="text-danger"><img src="{{ $data->image }}" width='100' alt=""></td>
                                <td>{{ $data->tags }}</td>
                                <td wire:click='changeStatus({{ $data->id }})'>
                                    @if ($data->status == 0)
                                        <label style="cursor: pointer;" class="badge badge-danger">disable</label>
                                    @else
                                        <label style="cursor: pointer;" class="badge badge-success">enable</label>
                                    @endif
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
