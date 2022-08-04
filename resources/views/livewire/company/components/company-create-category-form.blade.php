<div class="modal fade current-modal" wire:ignore.self id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Add category</h1>
                    <p>Add new category to your company.</p>
                </div>
                <form class="row gy-1 pt-75" wire:submit.prevent="addCategory">

                    <div class="col-12">
                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                        <input type="text" wire:model.lazy="name" class="form-control dt-full-name  {{$errors->has('name')? 'is-invalid' : '' }}"  placeholder="Category name" />
                        @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <small wire:loading wire:target="image" class="form-text text-muted mb-1"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Validating image...</small>
                        <label  wire:loading.remove wire:target="image"  class="form-label" for="basic-icon-default-company">Image(Max: 2MB)</label>
                        <input type="file" wire:model.lazy="image"  id="basic-icon-default-contact" class="form-control dt-contact {{$errors->has('image')? 'is-invalid' : '' }}"/>
                        @error('image') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>



                    <div class="col-12 text-center mt-2 pt-50" wire:loading.remove wire:target="image">
                        <button type="submit"  wire:loading.remove wire:target="addCategory"  class="btn btn-primary me-1">Add category</button>
                        <button type="submit"  wire:loading wire:target="addCategory"  class="btn btn-primary me-1"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                    <div class="col-12 text-center mt-2 pt-50" wire:loading wire:target="image">
                        <button type="button" disabled class="btn btn-outline-secondary mt-1">Please wait...</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
