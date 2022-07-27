<div>
    <style></style>

    <div class="row layout-top-spacing">
        <div class="col-sm-12 col-md-8">
            @include('livewire.pos.partials.detail')
        </div>
        <div class="col-sm-12 col-md-4">
            @include('livewire.pos.partials.total')
            @include('livewire.pos.partials.coins')
        </div>
    </div>
</div>

@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')