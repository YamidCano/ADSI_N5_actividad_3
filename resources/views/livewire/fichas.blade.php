<div>
    <div class="d-flex bd-highlight">
        <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#Store">
                Crear Ficha
            </button>
        </div>
        <div class="ml-auto p-2 bd-highlight">
            <input class="form-control mr-sm-2 mt-2 mb-2" type="search" wire:model="search" placeholder="Buscar por nombre" aria-label="Search">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fichas as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->code }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success"
                                            wire:click="view({{ $item->id }})" wire:target="view"
                                            data-toggle="modal" data-target="#view">
                                            Ver
                                        </button>
                                        <button type="button" class="btn btn-primary mr-2 ml-2"
                                            wire:click="edit({{ $item->id }})" wire:target="edit"
                                            data-toggle="modal" data-target="#update">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="$emit('remove', {{ $item->id }})">
                                            Eliminar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $fichas->links() }}
            </div>
        </div>
    </div>

    <!-- Modal  Crear-->
    <div wire:ignore.self class="modal fade" id="Store" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content card">
                <div class="modal-header">
                    <h5 class="mt-3 modal-title h4" id="Store">
                        Crear Ficha
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Codigo *</label>
                                <input type="number" class="form-control" autocomplete="off" placeholder="Codigo"
                                    wire:model="code" />
                                @error('code') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg">
                                <label for="Name">Nombre *</label>
                                <input type="text" placeholder="Nombre" class="form-control" wire:model="name" />
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        Salir
                    </button>
                    <button type="button" class="btn btn-success" wire:click="save" wire:loading.attr="disabled"
                        wire:target="save" class="dasabled:opacity-25">
                        Crear <span wire:loading wire:target="save">{{ __('...') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Actualizar-->
    <div wire:ignore.self class="modal fade" id="update" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content card">
                <div class="modal-header">
                    <h5 class="mt-3 modal-title h4" id="update">
                        Editar Ficha
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Codigo *</label>
                                <input type="number" class="form-control" autocomplete="off" placeholder="Codigo"
                                    wire:model="code" />
                                @error('code') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg">
                                <label for="Name">Nombre *</label>
                                <input type="text" placeholder="Nombre" class="form-control" wire:model="name" />
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        Salir
                    </button>
                    <button type="button" class="btn btn-success" wire:click="update" wire:loading.attr="disabled"
                        wire:target="update" class="dasabled:opacity-25">
                        Actualizar <span wire:loading wire:target="update">{{ __('...') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Ver-->
    <div wire:ignore.self class="modal fade" id="view" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content card">
                <div class="modal-header">
                    <h5 class="mt-3 modal-title h4" id="view">
                        Ver Aprendiz
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">??</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Codigo</label>
                                <div>
                                    <span class="h5">{{ $code }}</span>
                                </div>
                            </div>
                            <div class="col-lg">
                                <label for="Name">Nombre</label>
                                <div>
                                    <span class="h5">{{ $name }}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        Salir
                    </button>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script type="text/javascript">

            Livewire.on('remove', ID => {
                Swal.fire({
                    title: '??Estas seguro de eliminar?',
                    text: "??No podr??s revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si lo borra!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('fichas', 'destroyFichas', ID)
                        Swal.fire(
                            'Eliminar!',
                            'Su registro ha sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>

