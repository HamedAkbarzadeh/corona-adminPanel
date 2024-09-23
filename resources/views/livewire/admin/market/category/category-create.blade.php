<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form wire:submit.debounce.1000ms='save' class="forms-sample col-12" id="form">

                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1" class="require">Name</label>
                            <input wire:model.defer="form.name" type="text" class="form-control" placeholder="Name">

                            @error('form.name')
                            <div class="text-danger">{{
                                $message }}
                            </div>
                            @enderror
                        </div>

                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2" class="require">Status</label>
                            <select wire:model.defer="form.status" class="form-control" id="exampleFormControlSelect2">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                                @error('form.status')
                                <div class="text-danger">{{
                                    $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2" class="require">Show In Menu</label>
                            <select wire:model.defer="form.show_in_menu" class="form-control"
                                id="exampleFormControlSelect2">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                                @error('form.show_in_menu')
                                <div class="text-danger">{{
                                    $message }}
                                </div>
                                @enderror
                            </select>
                        </div>
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2" class="require">Select The Parent (if it has)</label>
                            <select wire:model.defer='form.parent_id' class="form-control"
                                id="exampleFormControlSelect2">
                                <option>This is the parent</option>
                                @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('form.parent_id')
                            <div class="text-danger">{{
                                $message }}
                            </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tags">tags</label>
                            <input type="text" wire:model.defer='form.tags' placeholder="for example : post,offer"
                                class="form-control" id="tags">
                            @error('form.tags')
                            <div class="text-danger">{{
                                $message }}
                            </div>
                            @enderror
                        </div>
                    </section>




                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input wire:model.defer='form.image' class="form-control" type="file">
                            <span class="text-success" wire:loading wire:target='form.image'>Uploading...</span>
                            @error('form.image')
                            <div class="text-danger">{{
                                $message }}
                            </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12 ">
                        <div class="form-group">
                            <label for="exampleTextarea1">description</label>
                            <textarea wire:model.defer='form.description' class="form-control" id="exampleTextarea1"
                                rows="4"></textarea>
                            @error('form.description')
                            <div class="text-danger">{{
                                $message }}
                            </div>
                            @enderror
                        </div>
                    </section>
                    <section class="col-12">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button wire:navigate href="{{ route('admin.market.category.index') }}"
                            class="btn btn-dark py-2 px-3">Cancel</button>
                    </section>
                </section>

            </form>
        </div>
    </div>
</div>