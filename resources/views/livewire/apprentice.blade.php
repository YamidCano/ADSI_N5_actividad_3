<div>
    <button type="button" class="btn btn-primary mt-3 mb-3" data-toggle="modal" data-target="#Store">
        Crear Aprendiz
    </button>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nombre</th>
                            <th scope="col">correo</th>
                            <th scope="col">celular</th>
                            <th scope="col">N Documento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apprentices as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->cel }}
                                </td>
                                <td>
                                    {{ $item->ndocumento }}
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
                {{ $apprentices->links() }}
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
                        Crear Aprendiz
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Nombre *</label>
                                <input type="text" placeholder="Nombre" class="form-control" wire:model="name" />
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Correo Electonico *</label>
                                <input type="email" class="form-control" autocomplete="off" placeholder="email"
                                    wire:model="email" />
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Celular *</label>
                                <input type="text" class="form-control UpperCase" placeholder="Celular"
                                    wire:model="cel" />

                                @error('cel') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Numero Documeto *</label>
                                    <input type="number" class="form-control UpperCase" placeholder="Numero Documeto"
                                        wire:model="ndocumento" />

                                @error('ndocumento') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="button" class="btn btn-success" wire:click="save" wire:loading.attr="disabled"
                        wire:target="save" class="dasabled:opacity-25">
                        {{ __('Create') }} <span wire:loading wire:target="save">{{ __('...') }}</span>
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
                        Editar Aprendiz
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Nombre *</label>
                                <input type="text" placeholder="Nombre" class="form-control" wire:model="name" />
                                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Correo Electonico *</label>
                                <input type="email" class="form-control" autocomplete="off" placeholder="email"
                                    wire:model="email" />
                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Celular *</label>
                                <input type="text" class="form-control UpperCase" placeholder="Celular"
                                    wire:model="cel" />

                                @error('cel') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Numero Documeto *</label>
                                    <input type="number" class="form-control UpperCase" placeholder="Numero Documeto"
                                        wire:model="ndocumento" />

                                @error('ndocumento') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="button" class="btn btn-success" wire:click="update" wire:loading.attr="disabled"
                        wire:target="update" class="dasabled:opacity-25">
                        {{ __('update') }} <span wire:loading wire:target="update">{{ __('...') }}</span>
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
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Nombre</label>
                                <div>
                                    <span class="h5">{{ $name }}</span>
                                </div>

                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Correo Electronico</label>
                                <div>
                                    <span class="h5">{{ $email }}</span>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Celular</label>
                                <div>
                                    <span class="h5">{{ $cel }}</span>
                                </div>

                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Numero Documento</label>
                                <div>
                                    <span class="h5">{{ $ndocumento }}</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click="cerrar" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script type="text/javascript">
            window.livewire.on('Store', () => {
                $('#Store').modal('hide');
            });
        </script>
        <script type="text/javascript">
            window.livewire.on('update', () => {
                $('#update').modal('hide');
            });
        </script>
        <script>
            Livewire.on('remove', ID => {
                Swal.fire({
                    title: '¿Estas seguro de eliminar?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si lo borra!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('apprentice', 'destroyApprentices', ID)
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
