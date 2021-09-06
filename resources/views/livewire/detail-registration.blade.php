<div>
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
                    Monitor:{{ $registration_m }}
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
                    Monitor:{{ $registration_d }}
                </div>
                <div class="col-sm">
                    Estado: @if ($registration_s == 0)
                        Abierto
                    @elseif ($registration_s == 1)
                        Cerrado
                    @endif
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover card-table table-vcenter text-nowrap text-center">
                <thead>
                    <tr>
                        <th class="p-2" scope="col">No.</th>
                        <th class="p-2" scope="col">id</th>
                        <th class="p-2" scope="col">nombre</th>
                        <th class="p-2" scope="col">correo</th>
                        <th class="p-2" scope="col">celular</th>
                        <th class="p-2" scope="col">N Documento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apprentices as $item)
                        <tr>
                            <td class="p-2" >
                                #
                            </td>
                            <td class="p-2" >
                                {{ $item->id }}
                            </td>
                            <td class="p-2" >
                                {{ $item->name }}
                            </td>
                            <td class="p-2" >
                                {{ $item->email }}
                            </td>
                            <td class="p-2" >
                                {{ $item->cel }}
                            </td>
                            <td class="p-2" >
                                {{ $item->ndocumento }}
                            </td>
                            <td class="p-2" >
                                <div class="btn-group">

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
