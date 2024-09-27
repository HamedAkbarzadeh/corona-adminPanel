<div class="col-10 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Meta</h4>
            <p class="card-description"> Basic form elements </p>
            <form wire:submit.debounce.1000ms='save' class="forms-sample col-12" id="form">

                <section class="row">
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="specify" class="require">Please Enter Specify</label>
                            <input wire:model.defer="meta_key" id="specify" type="text" class="form-control"
                                placeholder="Specify ...">
                            @error('specify.name')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="value" class="require">Please Enter Value</label>
                            <input wire:model.defer="meta_value" id="value" type="text" class="form-control"
                                placeholder="Value ...">

                            @error('specify.name')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                    </section>




                    <section class="col-12">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a wire:navigate href="{{ route('admin.market.product.index') }}"
                            class="btn btn-dark py-2 px-3">Cancel</a>
                    </section>
                </section>

            </form>
        </div>
    </div>

</div>
