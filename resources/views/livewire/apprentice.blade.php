<div>
    <div class="h2 mb-5">
        Aprendices
    </div>
    <select class="form-select" aria-label="Default select example">
        <option selected>Selecione monitor</option>
        @foreach ($monitor as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <div class="table-responsive">
        <table class="table table-striped table-hover card-table table-vcenter text-nowrap">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col">celular</th>
                    <th scope="col">N Documento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apprentices as $item)
                    <tr>
                        <th>
                            {{ $item->id }}
                        </th>
                        <th>
                            {{ $item->name }}
                        </th>
                        <th>
                            {{ $item->email }}
                        </th>
                        <th>
                            {{ $item->cel }}
                        </th>
                        <th>
                            {{ $item->ndocumento }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
