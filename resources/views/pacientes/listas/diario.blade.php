<div class="accordion-body" id="">
    <h4>Diario de pensamientos</h4>

    <form method="POST" action="{{ route('diario_pensamiento.entrada_diario') }}" enctype="multipart/form-data">
        @csrf
        @if(Auth::user()->nivel == "doctor" or Auth::user()->nivel == "admin")
            <input type="hidden" name="paciente_id" value="{{request("id")??null}}">
        @endif
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="texto" class="form-label">Pensamiento</label>
            <textarea class="form-control" type="text" id="texto" name="texto"
                      placeholder="Agregar un pensamiento"></textarea>
        </div>
        <div class="mb-3 col-md-12">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Autor</th>
            <th>Entrada diario</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        @foreach($diario_pensamientos as $diario)
            @if($diario->usuario->nivel == "doctor")
                <tr class="table-primary">
                    <td>{{ ucfirst($diario->usuario->nivel) }}</td>
            @elseif($diario->usuario->nivel == "admin")
                <tr class="table-warning">
                    <td>{{ ucfirst($diario->usuario->nivel) }}</td>
            @else
                <tr class="table-success">
                    <td>{{ ucfirst($diario->usuario->nivel) }}</td>
            @endif
                    <td>{{$diario->texto}}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($diario->created_at)->format("d-m-Y H:i:s") }} <button class="btn btn-sm btn-warning add_comentario" data-id="{{$diario->id}}" style="float:right;">Agregar comentario</button>
                    </td>
            </tr>
            <tr class="d-none comentario_pensamiento" id="form_comentario_{{$diario->id}}">
                <td></td>
                <td></td>
                <td>
                    <form method="POST" action="{{ route('agregar_comentario_pensamiento', ["pensamiento_id"=>$diario->id]) }}">
                        @csrf
                        <div class="mb-3 col-md-12 col-sm-12">
                            <input class="form-control input_comentario" data-id="{{$diario->id}}" type="text" id="diario_{{$diario->id}}" name="texto" placeholder="Comentario" >
                        </div>
                        <div class="mb-3">
                            <button id="submit_comentario_{{$diario->id}}" class="btn btn-primary btn-sm d-none" type="submit">Guardar comentario</button>
                        </div>
                    </form>
                </td>
            </tr>
            @foreach($diario->comentarios as $comentario)
                <tr>
                    <td><small><i>{{$comentario->usuario->nivel}} comentó</i></small></td>
                    <td><i>{{$comentario->texto}}</i></td>
                    <td>
                        {{ \Carbon\Carbon::parse($comentario->created_at)->format("d-m-Y H:i:s") }}
                    </td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
