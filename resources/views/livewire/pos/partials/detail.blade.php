<div class="connect-sorting">
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">
                @if($total > 0)
                <div class="table-responsive tblscroll" style="max-height: 650px; overflow:hidden">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                            <tr>
                                <th width="10%"></th>
                                <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                <th class="table-th text-center text-white">PRECIO</th>
                                <th class="table-th text-center text-white" width="13%">CANT</th>
                                <th class="table-th text-center text-white">IMPORTE</th>
                                <th class="table-th text-center text-white">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="text-center table-th">
                                    @if(count($item->attributes) > 0)
                                    <span>
                                        <img src="{{ asset('storage/product/' . $item->attributes[0]) }}" alt="Imágen de producto" height="90" width="90" class="rounded">
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <h6>
                                        {{ $item->name }}
                                    </h6>
                                </td>
                                <td class="text-center">
                                    ${{ number_format($item->price, 2) }}
                                </td>
                                <td>
                                    <input type="number" id="r{{ $item->id }}"
                                        wire:change="updateQty({{ $item->id }}, $('#r' + {{ $item->id }}).val())"
                                        style="font-size: 1rem!important"
                                        class="form-control text-center"
                                        value="{{ $item->quantity }}"
                                    >
                                </td>
                                <td class="text-center">
                                    <h6>
                                        ${{ number_format($item->price * $item->quantity, 2) }}
                                    </h6>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-dark mbmobile" onclick="Confirm('{{ $item->id }}', 'removeItem', '¿CONFIRMAS ELIMINAR EL REGISTRO?')">

                                    </button>
                                    <button class="btn btn-dark mbmobile" wire:click.prevent="decreaseQty({{ $item->id }})">

                                    </button>
                                    <button class="btn btn-dark mbmobile" wire:click.prevent="increaseQty({{ $item->id }})">

                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <h5 class="text-center text-muted">Agrega productos a la venta</h5>
                @endif
                <div wire:loading.inline wire:target="saveSale">
                    <h4 class="text-dange text-center">Guardando Venta...</h4>
                </div>
            </div>
        </div>
    </div>
</div>