<div>
    <div class="d-flex bd-highlight">
        @if ($this->registration_s == 0)
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#Store">
                    Agregar Aprendiz
                </button>
            </div>
            <div class="ml-auto p-2 bd-highlight">
                <button type="button" class="btn btn-danger mt-2 mb-2"
                    wire:click="$emit('cerrar', {{ $registration_id }})">
                    Cerrar
                </button>
            </div>
        @else
            <div class="text-danger h5">
                Registro Cerrado
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center align-middle">
                <tr>
                    <td rowspan="3" class="p-0 align-middle">
                        <img src="{{ asset('img') }}/logo.png" alt="" width="40" height="40">
                    </td>
                    <td class="p-0">
                        Servicio Nacional de Aprendizaje SENA
                    </td>
                    <td rowspan="2" class="p-0 align-middle">
                        Version: 01
                    </td>
                </tr>
                <tr>
                    <td class="p-0">
                        Sistema Integrado de Gestion
                    </td>
                </tr>
                <tr>
                    <td class="p-0">
                        Plantilla Asistencia
                    </td>
                    <td class="p-0">
                        Codigo: SNA-01-P
                    </td>
                </tr>
            </table>
            <div class="row text-center">
                <div class="col-sm">
                    Ficha: {{ $registration_fc }} - {{ $registration_fn }}
                </div>
                <div class="col-sm">
                    Monitor: {{ $registration_m }}
                </div>
                <div class="col-sm">
                    Jornada: {{ $registration_j }}
                </div>
            </div>
            <div class="row text-center mt-2 mb-4">
                <div class="col-sm">
                    Instructor: {{ $registration_i }}
                </div>
                <div class="col-sm">
                    Fecha: {{ $registration_d }}
                </div>
                <div class="col-sm">
                    Estado: @if ($registration_s == 0)
                        Abierto
                    @elseif ($registration_s == 1)
                        Cerrado
                    @endif
                </div>
            </div>
            <table
                class="table table-bordered table-striped table-hover card-table table-vcenter text-nowrap text-center">
                <thead>
                    <tr>
                        <th class="p-2" scope="col">nombre</th>
                        <th class="p-2" scope="col">correo</th>
                        <th class="p-2" scope="col">celular</th>
                        <th class="p-2" scope="col">N Documento</th>
                        @if ($this->registration_s == 0)
                        <th></th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailregistrations as $item)
                        <tr>
                            <td class="p-2">
                                {{ $item->aprendiz->name }}
                            </td>
                            <td class="p-2">
                                {{ $item->aprendiz->email }}
                            </td>
                            <td class="p-2">
                                {{ $item->aprendiz->cel }}
                            </td>
                            <td class="p-2">
                                {{ $item->aprendiz->ndocumento }}
                            </td>
                            @if ($this->registration_s == 0)
                                <td class="p-2">
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger"
                                                wire:click="$emit('remove', {{ $item->id }})">
                                                X
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $detailregistrations->links() }}
        </div>
    </div>

    <!-- Modal  Crear-->
    <div wire:ignore.self class="modal fade" id="Store" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content card">
                <div class="modal-header">
                    <h5 class="mt-3 modal-title h4" id="Store">
                        Listado Aprendice Ficha - {{ $registration_fn }} ('{{ $registration_fc }}')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" wire:click="cerrar"
                        aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex bd-highlight">
                        {{-- <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#Store">
                                Agregar Aprendiz
                            </button>
                        </div> --}}
                        <div class="ml-auto p-2 bd-highlight">
                            <input class="form-control mr-sm-2 mt-2 mb-2" type="search" wire:model="search"
                                placeholder="Buscar por nombre" aria-label="Search">
                        </div>
                    </div>
                    <table
                        class="table table-bordered table-striped table-hover card-table table-vcenter text-nowrap text-center">
                        <thead>
                            <tr>
                                <th class="p-2" scope="col">nombre</th>
                                <th class="p-2" scope="col">correo</th>
                                <th class="p-2" scope="col">celular</th>
                                <th class="p-2" scope="col">N Documento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aprendices_f as $item)
                                <tr>
                                    <td class="p-2">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-2">
                                        {{ $item->email }}
                                    </td>
                                    <td class="p-2">
                                        {{ $item->cel }}
                                    </td>
                                    <td class="p-2">
                                        {{ $item->ndocumento }}
                                    </td>
                                    <td class="p-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success"
                                                wire:click="$emit('agregar', {{ $item->id }})">
                                                Agregar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $aprendices_f->links() }}
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
            Livewire.on('agregar', ID => {
                Swal.fire({
                    title: '¿Estas seguro de Agrgar el Aprendiz?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, agregar!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('detail-registration', 'agregarApprentices', ID)
                        Swal.fire(
                            'Agregado!',
                            'Su registro ha agregado Exitoxamente.',
                            'success'
                        )
                    }
                })
            });
            Livewire.on('remove', ID => {
                Swal.fire({
                    title: '¿Estas seguro de eliminar el Aprendiz?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('detail-registration', 'removeApprentices', ID)
                        Swal.fire(
                            'Agregado!',
                            'Su registro ha eliminado Exitoxamente.',
                            'success'
                        )
                    }
                })
            });
            Livewire.on('cerrar', ID => {
                Swal.fire({
                    title: '¿Estas seguro de cerrar el registro?',
                    text: "No podras hacer cambios despues",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Cerrar!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('detail-registration', 'CerrarRegistre', ID)
                        Swal.fire(
                            'Cerrado!',
                            'Su registro ha Cerrado Exitoxamente.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
