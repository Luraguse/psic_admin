<div class="row collapse" id="collapseDiario">
    <h4>Diario de pensamientos</h4>

    <form method="POST" action="{{ route('diario_pensamiento.entrada_diario') }}" enctype="multipart/form-data">
        @csrf
        @if(Auth::user()->nivel == "doctor")
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
            @if(Auth::user()->nivel == "doctor")
                <tr class="{{ Auth::user()->id == $diario["usuario_id"]?"table-primary":"table-success" }}">
                    <td>{{ Auth::user()->id == $diario["usuario_id"]?"Doctor":"Paciente" }}</td>
            @else
                <tr class="{{ Auth::user()->id == $diario["usuario_id"]?"table-success":"table-primary" }}">
                    <td>{{ Auth::user()->id == $diario["usuario_id"]?"Paciente":"Doctor" }}</td>
            @endif
                    <td>{{$diario->texto}}</td>
                    <td>{{ \Carbon\Carbon::parse($diario->created_at)->format("d-m-Y H:i:s") }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
