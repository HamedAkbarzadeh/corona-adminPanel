<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form wire:submit.debounce.1000ms='save' class="forms-sample col-12" id="form">

                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productName" class="require">Product Name</label>
                            <input wire:model.defer="form.name" id="productName" type="text" class="form-control"
                                placeholder="Name">

                            @error('form.name')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productPrice" class="require">Product Price</label>
                            <input wire:model.live.debounce.500ms="form.price" id="productPrice" type="text"
                                class="form-control" placeholder="Price ...">

                            @error('form.price')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productBrand" class="require">Select Brand</label>
                            <select wire:model.defer="form.brandID" class="form-control" id="productBrand">
                                <option value="">choose ...</option>
                                @foreach ($brands as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['original_name'] }}</option>
                                @endforeach

                            </select>
                            @error('form.brandID')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productCategory" class="require">Select Category</label>
                            <select wire:model.defer="form.categoryID" class="form-control" id="productCategory">
                                <option value="">choose ...</option>


                                @foreach ($categories as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach

                            </select>
                            @error('form.categoryID')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>



                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productStatus" class="require">Status</label>
                            <select wire:model.defer="form.status" class="form-control" id="productStatus">
                                <option value="">choose ...</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            @error('form.status')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="productStatusMarketable" class="require">Status For Maketable Product</label>
                            <select wire:model.defer="form.marketable" class="form-control"
                                id="productStatusMarketable">
                                <option value="">choose ...</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            @error('form.marketable')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="published_at_view" class="require">Published At</label>
                            <input type="text" name="published_at" id="published_at"
                                class="d-none form-control form-control-sm" value="{{ old('published_at') }}">
                            <input type="text" id="published_at_view" class="form-control form-control-sm"
                                value="{{ old('published_at') }}">
                            @error('form.published_at')
                                <div class="text-danger">{{ $message }}
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
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>

                    <section class="col-12">
                        <div class="form-group">
                            <label for="tags">tags</label>
                            <input type="text" wire:model.defer='form.tags' placeholder="for example : post,offer"
                                class="form-control" id="tags">
                            @error('form.tags')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>
                    <section class="col-12 ">
                        <div class="form-group">
                            <label for="introduction">Product Introduction</label>
                            <textarea wire:model.defer='form.introduction' class="form-control" id="introduction" rows="4"></textarea>
                            @error('form.introduction')
                                <div class="text-danger">{{ $message }}
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
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endpush

@push('script')
    @include('layouts.partials.jalali-date')
@endpush
