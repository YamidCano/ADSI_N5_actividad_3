<div>
    <div class="d-flex bd-highlight">
        <div class="p-2 bd-highlight">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#Store">
                Crear Registro
            </button>
        </div>
        {{-- <div class="ml-auto p-2 bd-highlight">
            <input class="form-control mr-sm-2 mt-2 mb-2" type="search" wire:model="search" placeholder="Buscar por nombre" aria-label="Search">
        </div> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Monitor</th>
                            <th scope="col">ficha</th>
                            <th scope="col">Instructor</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Jornada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->monitor->name }}
                                </td>
                                <td>
                                    {{ $item->ficha_r->code }} - {{ $item->ficha_r->name }}
                                </td>
                                <td>
                                    {{ $item->instructor->name }}
                                </td>
                                <td>
                                    {{ $item->date }}
                                </td>
                                <td>
                                    {{ $item->jornada->name }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" type="button"
                                            href="{{ route('detail.registro', $item->id) }}">
                                            Ver
                                        </a>
                                        <button type="button" class="btn btn-primary mr-2 ml-2"
                                            wire:click="edit({{ $item->id }})" wire:target="edit"
                                            data-toggle="modal" data-target="#update">
                                            Editar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $registrations->links() }}
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
                        Crear Registro
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
                                <label for="Name">Monitor *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="monitor">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($apprentices as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('monitor') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Ficha *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="ficha">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($fichas as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ficha') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Instructor *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="instructor">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($instructors as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('instructor') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Ficha *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="jornada">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($workingdays as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jornada') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Fecha *</label>
                                <input type="date" class="form-control" autocomplete="off" placeholder="Fecha"
                                    wire:model="fecha" />
                                @error('fecha') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">

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
                        Editar Registro
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
                                <label for="Name">Monitor *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="monitor">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($apprentices as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('monitor') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Ficha *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="ficha">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($fichas as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ficha') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Instructor *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="instructor">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($instructors as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('instructor') <span
                                    class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label for="Name">Ficha *</label>
                                <select class="custom-select" id="inputGroupSelect01" wire:model="jornada">
                                    <option selected>Selecione una Opcion</option>
                                    @foreach ($workingdays as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jornada') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label for="Name">Fecha *</label>
                                <input type="date" class="form-control" autocomplete="off" placeholder="Fecha"
                                    wire:model="fecha" />
                                @error('fecha') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">

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

</div>
