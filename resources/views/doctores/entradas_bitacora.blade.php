@include("doctores.parts.bitacora_form")
@if(count($bitacoras) == 0)
    <h4>No hay entradas en esta bitacora</h4>
@else
    <table class="table">
        <thead>
        <tr>
            <th>Autor</th>
            <th>Entrada bitacora</th>
            <th>Fecha</th>

        </tr>
        </thead>
        <tbody>
        @foreach($bitacoras as $bitacora)
            @if(is_null($bitacora->comentador_id))
                <tr class="table-primary">
                    <td>{{ $bitacora->doctor->name }}</td>
            @else
                <tr class="table-warning">
                    <td>{{ $bitacora->comentador->name }}</td>
            @endif
                    <td>{{$bitacora->texto}}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($bitacora->created_at)->format("d-m-Y H:i:s") }} <button class="btn btn-sm btn-warning add_comentario_entrada" data-id="{{$bitacora->id}}" style="float:right;">Agregar comentario</button>
                    </td>
                </tr>




                <tr class="d-none comentar_entrada" id="form_comentario_bitacora{{$bitacora->id}}">
                    <td></td>
                    <td></td>
                    <td>
                        <form method="POST" action="{{ route('bitacora.comentar_entrada', ["id"=>$bitacora->id]) }}">
                            @csrf
                            <div class="mb-3 col-md-12 col-sm-12">
                                <input class="form-control input_comentario" data-id="{{$bitacora->id}}" type="text" id="entrada_{{$bitacora->id}}" name="texto" placeholder="Comentario" >
                            </div>
                            <div class="mb-3">
                                <button id="submit_comentario_bitacora_{{$bitacora->id}}" class="btn btn-primary btn-sm d-none" type="submit">Guardar comentario</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @foreach($bitacora->comentarios as $comentario)
                    <tr>
                        <td>

                            <small><i>{{$comentario->doctor->name}} comentó</i></small>
                        </td>
                        <td><i>{{$comentario->texto}}</i></td>
                        <td>
                            {{ \Carbon\Carbon::parse($comentario->created_at)->format("d-m-Y H:i:s") }}
                        </td>
                    </tr>
                @endforeach
        @endforeach
        </tbody>
    </table>
@endif
