<div class="row mt-3">
    <div class="col-sm-12">
        <div class="connect-sorting">
            <h5 class="text-center mb-2">
                DENOMINACIONES
            </h5>
            <div class="container">
                <div class="row">
                    @foreach($denominations as $d)
                        <div class="col-sm mt-2">
                            <button wire:click.prevent="ACash({{ $d->value }})" class="btn btn-dark btn-block den">
                                {{ $d->value > 0 ? '$' . number_format($d->value, 2, ',', '') : 'Exacto' }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="connect-sorting-content mt-4">
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="input-group input-group-md mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-gp hideonsm" style="background: #3b3f5c; color:white">
                                    Efectivo F8
                                </span>
                            </div>
                            <input type="number" id="cash"
                                wire:model="efectivo"
                                wire:keydown.enter="saveSale"
                                class="form-control text-center"
                                value="{{ $efectivo }}"
                            >
                            <div class="group-append">
                                <span wire:click="$set('efectivo', 0)" class="input-group-text" style="background: #3b3f5c; color:white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                                        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <h4 class="text-muted">
                            Cambio: ${{ number_format($change, 2) }}
                        </h4>
                        <div class="row justify-content-between mt-5">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if($total > 0)
                                <button onclick="Confirm('', 'clearCart', '¿SEGURO DE ELIMINAR CARRITO?')"
                                class="btn btn-dark mtmobile">
                                    CANCELAR F4
                                </button>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                @if($efectivo >= $total && $total > 0)
                                <button wire:click.prevent="saveSale"
                                    class="btn btn-dark btn-md btn-block">
                                    GUARDAR F9
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>