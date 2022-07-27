<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">
                    <b>{{ $componentName }}</b> | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }}
                </h5>
                <h6 class="text-center text-warning" wire:loading>
                    POR FAVOR ESPERE
                </h6>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </span>
                            </div>
                            <input type="text" wire:model.lazy="roleName" class="form-control" placeholder="Ej. Admin">
                        </div>
                        @error('roleName') <span class="text-danger er">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"
                        wire:click.prevent="resetUI()"
                        class="btn btn-dark close-btn text-info"
                        data-dismiss="modal">
                    Cerrar
                </button>
                @if($selected_id < 1)
                    <button type="button"
                            wire:click.prevent="CreateRole()"
                            class="btn btn-dark close-modal">
                        Guardar
                    </button>
                @else
                    <button type="button"
                            wire:click.prevent="UpdateRole()"
                            class="btn btn-dark close-modal">
                        Actualizar
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>