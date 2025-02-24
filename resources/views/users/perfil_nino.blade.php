<div class="col-md-6 col-sm-12">
    <p>4. Sexo</p>
    <div class="form-check">
        @if(array_key_exists("sexo", $perfil) &&  $perfil["sexo"] == "1")
            <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="sexo" id="sexo1" value="1">
        @endif
        <label class="form-check-label" for="sexo1">
            Masculino
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("sexo", $perfil) &&  $perfil["sexo"] == "2")
            <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="sexo" id="sexo2" value="2">
        @endif
        <label class="form-check-label" for="sexo2">
            Femenino
        </label>
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <p>5. Escolaridad Actual</p>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "1")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad1" value="1">
        @endif
        <label class="form-check-label" for="escolaridad1">
            Preescolar
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "2")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad2" value="2">
        @endif
        <label class="form-check-label" for="escolaridad2">
            Primaria
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "3")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad3" value="3">
        @endif
        <label class="form-check-label" for="escolaridad3">
            Secundaria
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "4")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad4" value="4">
        @endif
        <label class="form-check-label" for="escolaridad4">
            Otro
        </label>
        <input class="form-control" type="text" id="escolaridad_otro" name="escolaridad_otro" value="{{$perfil["escolaridad_otro"]??null}}">
    </div>
</div>

<div class="mb-3 col-md-12 col-sm-12">
    <label for="nombre_tutor" class="form-label">6. Nombre del padre/madre/tutor</label>
    <input class="form-control" type="text" id="nombre_tutor" name="nombre_tutor" value="{{$perfil['nombre_tutor']??null}}">
</div>
<div class="col-md-6 col-sm-12">
    <p>7. ¿Quién llena este formulario?</p>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "1")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario1" value="1">
        @endif
        <label class="form-check-label" for="llenaformulario1">
            Padre
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "2")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario2" value="2">
        @endif
        <label class="form-check-label" for="llenaformulario2">
            Madre
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "3")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario3" value="3">
        @endif
        <label class="form-check-label" for="llenaformulario3">
            Tutor/a
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "4")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario4" value="4">
        @endif
        <label class="form-check-label" for="llenaformulario4">
            Otro
        </label>
        <input class="form-control" type="text" id="llenaformulario_otro" name="llenaformulario_otro" value="{{$perfil["llenaformulario_otro"]??null}}">
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <p>8. Cuidador principal</p>
    <div class="form-check">
        @if(array_key_exists("cuidador", $perfil) &&  $perfil["cuidador"] == "1")
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador1" value="1">
        @endif
        <label class="form-check-label" for="cuidador1">
            Padres
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("cuidador", $perfil) &&  $perfil["cuidador"] == "2")
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador2" value="2">
        @endif
        <label class="form-check-label" for="cuidador2">
            Abuelos
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("cuidador", $perfil) &&  $perfil["cuidador"] == "3")
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador3" value="3">
        @endif
        <label class="form-check-label" for="cuidador3">
            Niñera
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("cuidador", $perfil) &&  $perfil["cuidador"] == "4")
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="cuidador" id="cuidador4" value="4">
        @endif
        <label class="form-check-label" for="cuidador4">
            Otro
        </label>
        <input class="form-control" type="text" id="cuidador_otro" name="cuidador_otro" value="{{$perfil["cuidador_otro"]??null}}">
    </div>
</div>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="descripcion" class="form-label">9. ¿Cuál es la principal dificultad que ha notado en su hijo/a?<br><i>(Describa
            con sus propias palabras)</i></label>
    <textarea class="form-control" type="text" id="descripcion" name="descripcion" rows="3">{{$perfil["descripcion"]??null}}</textarea>
</div>
<div class="col-md-6 col-sm-12">
    <p>10. Desde cuándo ha notado esta dificultad</p>
    <div class="form-check">
        @if(array_key_exists("tiempodificultad", $perfil) &&  $perfil["tiempodificultad"] == "1")
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad1" value="1">
        @endif
        <label class="form-check-label" for="tiempodificultad1">
            Menos de 6 meses
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("tiempodificultad", $perfil) &&  $perfil["tiempodificultad"] == "2")
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad2" value="2">
        @endif
        <label class="form-check-label" for="tiempodificultad2">
            Entre 6 meses y 1 año
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("tiempodificultad", $perfil) &&  $perfil["tiempodificultad"] == "3")
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="tiempodificultad" id="tiempodificultad3" value="3">
        @endif
        <label class="form-check-label" for="tiempodificultad3">
            Más de 1 año
        </label>
    </div>
</div>
<h3 class="col-md-12">II. Antecedentes Médicos y del desarrollo</h3>
<h5 class="col-md-12">1. Embarazo y nacimiento</h5>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>11. ¿Cómo fue el embarazo?</p>
            <div class="form-check">
                @if(array_key_exists("embarazo", $perfil) &&  $perfil["embarazo"] == "1")
                    <input class="form-check-input" type="radio" name="embarazo" id="embarazo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="embarazo" id="embarazo1" value="1">
                @endif
                <label class="form-check-label" for="embarazo1">
                    Sin complicaciones
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("embarazo", $perfil) &&  $perfil["embarazo"] == "2")
                    <input class="form-check-input" type="radio" name="embarazo" id="embarazo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="embarazo" id="embarazo2" value="2">
                @endif
                <label class="form-check-label" for="embarazo2">
                    Con complicaciones
                </label>
                <input class="form-control" type="text" id="embarazo_otro" name="embarazo_otro" value="{{$perfil["embarazo_otro"]??null}}">
                <label class="form-check-label" for="embarazo_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>12. ¿Tipo de parto?</p>
            <div class="form-check">
                @if(array_key_exists("parto", $perfil) &&  $perfil["parto"] == "1")
                    <input class="form-check-input" type="radio" name="parto" id="parto1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="parto" id="parto1" value="1">
                @endif
                <label class="form-check-label" for="parto1">
                    Natural
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("parto", $perfil) &&  $perfil["parto"] == "2")
                    <input class="form-check-input" type="radio" name="parto" id="parto2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="parto" id="parto2" value="2">
                @endif
                <label class="form-check-label" for="parto2">
                    Cesárea
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("parto", $perfil) &&  $perfil["parto"] == "3")
                    <input class="form-check-input" type="radio" name="parto" id="parto3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="parto" id="parto3" value="3">
                @endif
                <label class="form-check-label" for="parto3">
                    Prematuro (menos de 37 semanas)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("parto", $perfil) &&  $perfil["parto"] == "4")
                    <input class="form-check-input" type="radio" name="parto" id="parto4" value="4" checked>
                @else
                    <input class="form-check-input" type="radio" name="parto" id="parto4" value="4">
                @endif
                <label class="form-check-label" for="parto4">
                    Otro
                </label>
                <input class="form-control" type="text" id="parto3" name="parto_otro" value="{{$perfil["parto_otro"]??null}}">
                <label class="form-check-label" for="parto_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>13. ¿Hubo complicaciones en el parto?</p>
            <div class="form-check">
                @if(array_key_exists("complicaciones", $perfil) &&  $perfil["complicaciones"] == "1")
                    <input class="form-check-input" type="radio" name="complicaciones" id="complicaciones1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="complicaciones" id="complicaciones1" value="1">
                @endif
                <label class="form-check-label" for="complicaciones1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("complicaciones", $perfil) &&  $perfil["complicaciones"] == "2")
                    <input class="form-check-input" type="radio" name="complicaciones" id="complicaciones2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="complicaciones" id="complicaciones2" value="2">
                @endif
                <label class="form-check-label" for="complicaciones2">
                    Si
                </label>
                <input class="form-control" type="text" id="complicaciones_otro" name="complicaciones_otro" value="{{$perfil["complicaciones_otro"]??null}}">
                <label class="form-check-label" for="complicaciones_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
</ul>
<h5 class="col-md-12">2. Desarrollo temprano</h5>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>14. ¿Hubo dificultades en la alimentación al nacer?</p>
            <div class="form-check">
                @if(array_key_exists("alimentacion", $perfil) &&  $perfil["alimentacion"] == "1")
                    <input class="form-check-input" type="radio" name="alimentacion" id="alimentacion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="alimentacion" id="alimentacion1" value="1">
                @endif
                <label class="form-check-label" for="alimentacion1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("alimentacion", $perfil) &&  $perfil["alimentacion"] == "2")
                    <input class="form-check-input" type="radio" name="alimentacion" id="alimentacion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="alimentacion" id="alimentacion2" value="2">
                @endif
                <label class="form-check-label" for="alimentacion2">
                    Sí (Ejemplo: succión, deglución)
                </label>
            </div>
        </div>
    </li>
</ul>
<ul class="list-group">
    <li class="list-group-item">
        <p>15. Edad en que comenzó a:</p>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="input-group">
                    <span class="input-group-text">Sostener la cabeza:</span>
                    <input class="form-control" type="number" name="sostener_cabeza" value="{{$perfil['sostener_cabeza']??0}}" id="sostener_cabeza"
                           placeholder="meses">
                    <span class="input-group-text">meses</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="input-group">
                    <span class="input-group-text">Sentarse sin apoyo:</span>
                    <input class="form-control" type="number" name="sentarse" value="{{$perfil['sentarse']??0}}" id="sentarse" placeholder="meses">
                    <span class="input-group-text">meses</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="input-group">
                    <span class="input-group-text">Caminar solo/a:</span>
                    <input class="form-control" type="number" name="caminar" value="{{$perfil['caminar']??0}}" id="caminar"
                           placeholder="meses">
                    <span class="input-group-text">meses</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="input-group">
                    <span class="input-group-text">Decir sus primeras palabras:</span>
                    <input class="form-control" type="number" name="palabras" value="{{$perfil['palabras']??0}}" id="palabras" placeholder="meses">
                    <span class="input-group-text">meses</span>
                </div>
            </div>
        </div>

    </li>
</ul>
<div class="mb-3 col-md-12 col-sm-12">
    <h6>16. ¿Ha recibido algún diagnóstico médico importante?</h6>
    <div class="form-check">
        @if(array_key_exists("diagnostico", $perfil) &&  $perfil["diagnostico"] == "1")
            <input class="form-check-input" type="radio" name="diagnostico" id="diagnostico1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="diagnostico" id="diagnostico1" value="1">
        @endif
        <label class="form-check-label" for="diagnostico1">
            No
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("diagnostico", $perfil) &&  $perfil["diagnostico"] == "2")
            <input class="form-check-input" type="radio" name="diagnostico" id="diagnostico2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="diagnostico" id="diagnostico2" value="2">
        @endif
        <label class="form-check-label" for="diagnostico2">
            Si
        </label>
        <input class="form-control" type="text" id="diagnostico_otro" name="diagnostico_otro" value="{{$perfil["diagnostico_otro"]??null}}">
        <label class="form-check-label" for="diagnostico_otro">
            Especifique
        </label>
    </div>
</div>
<div class="mb-3 col-md-12 col-sm-12">
    <h6>17. ¿Ha requerido hospitalización o cirugías?</h6>
    <div class="form-check">
        @if(array_key_exists("cirugias", $perfil) &&  $perfil["cirugias"] == "1")
            <input class="form-check-input" type="radio" name="cirugias" id="cirugias1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="cirugias" id="cirugias1" value="1">
        @endif
        <label class="form-check-label" for="cirugias1">
            No
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("cirugias", $perfil) &&  $perfil["cirugias"] == "2")
            <input class="form-check-input" type="radio" name="cirugias" id="cirugias2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="cirugias" id="cirugias2" value="2">
        @endif
        <label class="form-check-label" for="cirugias2">
            Si
        </label>
        <input class="form-control" type="text" id="cirugias_otro" name="cirugias_otro" value="">
        <label class="form-check-label" for="cirugias_otro">
            Especifique
        </label>
    </div>
</div>
<h3 class="col-md-12">III. Lenguaje y comunicación</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>18. ¿Ha notado dificultades en el habla o comunicación?</p>
            <div class="form-check">
                @if(array_key_exists("sonidos", $perfil) && $perfil["sonidos"])
                    <input class="form-check-input" type="checkbox" name="sonidos" id="sonidos"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="sonidos" id="sonidos"  value="1">
                @endif
                <label class="form-check-label" for="sonidos">
                    Pronunciación de sonidos
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("frases", $perfil) && $perfil["frases"])
                    <input class="form-check-input" type="checkbox" name="frases" id="frases" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="frases" id="frases" value="1">
                @endif
                <label class="form-check-label" for="frases">
                    Formación de frases
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("ordenes", $perfil) && $perfil["ordenes"])
                    <input class="form-check-input" type="checkbox" name="ordenes" id="ordenes" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="ordenes" id="ordenes" value="1">
                @endif
                <label class="form-check-label" for="ordenes">
                    Comprensión de órdenes o preguntas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("nodificultades", $perfil) && $perfil["nodificultades"])
                    <input class="form-check-input" type="checkbox" name="nodificultades" id="nodificultades" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="nodificultades" id="nodificultades" value="1">
                @endif
                <label class="form-check-label" for="nodificultades">
                    No tiene dificultades
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>19. ¿Su hijo/a interactúa con otros niños de su edad?</p>
            <div class="form-check">
                @if(array_key_exists("interactua", $perfil) &&  $perfil["interactua"] == "1")
                    <input class="form-check-input" type="radio" name="interactua" id="interactua1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="interactua" id="interactua1" value="1">
                @endif
                <label class="form-check-label" for="interactua">
                    Si, sin problemas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("interactua", $perfil) &&  $perfil["interactua"] == "2")
                    <input class="form-check-input" type="radio" name="interactua" id="interactua2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="interactua" id="interactua2" value="2">
                @endif
                <label class="form-check-label" for="interactua2">
                    Si, pero con algunas dificultades
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("interactua", $perfil) &&  $perfil["interactua"] == "3")
                    <input class="form-check-input" type="radio" name="interactua" id="interactua3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="interactua" id="interactua3" value="3">
                @endif
                <label class="form-check-label" for="interactua3">
                    No, prefiere jugar solo/a
                </label>
            </div>
        </div>
    </li>

    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>20. ¿Hace contacto visual al hablar?</p>
            <div class="form-check">
                @if(array_key_exists("contactovisual", $perfil) &&  $perfil["contactovisual"] == "1")
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual1" value="1">
                @endif
                <label class="form-check-label" for="contactovisual">
                    Si
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("contactovisual", $perfil) &&  $perfil["contactovisual"] == "2")
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual2" value="2">
                @endif
                <label class="form-check-label" for="contactovisual2">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("contactovisual", $perfil) &&  $perfil["contactovisual"] == "3")
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="contactovisual" id="contactovisual3" value="3">
                @endif
                <label class="form-check-label" for="contactovisual3">
                    A veces
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>21. ¿Responde cuando se le llama por su nombre?</p>
            <div class="form-check">
                @if(array_key_exists("respondenombre", $perfil) &&  $perfil["respondenombre"] == "1")
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre1" value="1">
                @endif
                <label class="form-check-label" for="respondenombre">
                    Si
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("respondenombre", $perfil) &&  $perfil["respondenombre"] == "2")
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre2" value="2">
                @endif
                <label class="form-check-label" for="respondenombre2">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("respondenombre", $perfil) &&  $perfil["respondenombre"] == "3")
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="respondenombre" id="respondenombre3" value="3">
                @endif
                <label class="form-check-label" for="respondenombre3">
                    A veces
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">IV. Atención, memoria y aprendizaje</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>22. ¿Cómo describiría la atención de su hijo/a?</p>
            <div class="form-check">
                @if(array_key_exists("atencion", $perfil) &&  $perfil["atencion"] == "1")
                    <input class="form-check-input" type="radio" name="atencion" id="atencion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="atencion" id="atencion1" value="1">
                @endif
                <label class="form-check-label" for="atencion">
                    Se concentra bien en las tareas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("atencion", $perfil) &&  $perfil["atencion"] == "2")
                    <input class="form-check-input" type="radio" name="atencion" id="atencion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="atencion" id="atencion2" value="2">
                @endif
                <label class="form-check-label" for="atencion2">
                    Se distrae con facilidad
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("atencion", $perfil) &&  $perfil["atencion"] == "3")
                    <input class="form-check-input" type="radio" name="atencion" id="atencion3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="atencion" id="atencion3" value="3">
                @endif
                <label class="form-check-label" for="atencion3">
                    Es difícil que termine una actividad
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>23. ¿Tiene problemas para recordar instrucciones o información reciente?</p>
            <div class="form-check">
                @if(array_key_exists("recordar", $perfil) &&  $perfil["recordar"] == "1")
                    <input class="form-check-input" type="radio" name="recordar" id="recordar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="recordar" id="recordar1" value="1">
                @endif
                <label class="form-check-label" for="recordar">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("recordar", $perfil) &&  $perfil["recordar"] == "2")
                    <input class="form-check-input" type="radio" name="recordar" id="recordar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="recordar" id="recordar2" value="2">
                @endif
                <label class="form-check-label" for="recordar2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>24. ¿Le cuesta organizar sus cosas o planear actividades?</p>
            <div class="form-check">
                @if(array_key_exists("actividades", $perfil) &&  $perfil["actividades"] == "1")
                    <input class="form-check-input" type="radio" name="actividades" id="actividades1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividades" id="actividades1" value="1">
                @endif
                <label class="form-check-label" for="actividades">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividades", $perfil) &&  $perfil["actividades"] == "2")
                    <input class="form-check-input" type="radio" name="actividades" id="actividades2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividades" id="actividades2" value="2">
                @endif
                <label class="form-check-label" for="actividades2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">V. Conducta y regulación emocional</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>25. ¿Cómo describe el estado de ánimo de su hijo/a en general?</p>
            <div class="form-check">
                @if(array_key_exists("estadoanimo", $perfil) &&  $perfil["estadoanimo"] == "1")
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo1" value="1">
                @endif
                <label class="form-check-label" for="estadoanimo">
                    Estable
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("estadoanimo", $perfil) &&  $perfil["estadoanimo"] == "2")
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo2" value="2">
                @endif
                <label class="form-check-label" for="estadoanimo2">
                    Cambia con dificultad (Ejemplo: pasa de estar contento a enojado con frecuencia)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("estadoanimo", $perfil) &&  $perfil["estadoanimo"] == "3")
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo3" value="3">
                @endif
                <label class="form-check-label" for="estadoanimo3">
                    Irritable o enojado la mayor parte del tiempo
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>26. ¿Cómo maneja la frustración?</p>
            <div class="form-check">
                @if(array_key_exists("frustracion", $perfil) &&  $perfil["frustracion"] == "1")
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion1" value="1">
                @endif
                <label class="form-check-label" for="frustracion">
                    Se adapta con facilidad
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("frustracion", $perfil) &&  $perfil["frustracion"] == "2")
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion2" value="2">
                @endif
                <label class="form-check-label" for="frustracion2">
                    Se molesta pero se calma solo/a
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("frustracion", $perfil) &&  $perfil["frustracion"] == "3")
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="frustracion" id="frustracion3" value="3">
                @endif
                <label class="form-check-label" for="frustracion3">
                    Tiene rabietas intensas o le cuesta mucho calmarse
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>27. ¿Tiene problemas con la autoridad? (Ejemplo: desafiante, no sigue normas)</p>
            <div class="form-check">
                @if(array_key_exists("autoridad", $perfil) &&  $perfil["autoridad"] == "1")
                    <input class="form-check-input" type="radio" name="autoridad" id="autoridad1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="autoridad" id="autoridad1" value="1">
                @endif
                <label class="form-check-label" for="autoridad">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("autoridad", $perfil) &&  $perfil["autoridad"] == "2")
                    <input class="form-check-input" type="radio" name="autoridad" id="autoridad2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="autoridad" id="autoridad2" value="2">
                @endif
                <label class="form-check-label" for="autoridad2">
                    Sí
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>28. ¿Ha notado signos de ansiedad o tristeza prolongada?</p>
            <div class="form-check">
                @if(array_key_exists("ansiedad", $perfil) &&  $perfil["ansiedad"] == "1")
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad1" value="1">
                @endif
                <label class="form-check-label" for="ansiedad">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("ansiedad", $perfil) &&  $perfil["ansiedad"] == "2")
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad2" value="2">
                @endif
                <label class="form-check-label" for="ansiedad2">
                    Sí
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>29. ¿Su hijo/a ha expresado pensamientos de lastimarse o no querer vivir?</p>
            <div class="form-check">
                @if(array_key_exists("lastimarse", $perfil) &&  $perfil["lastimarse"] == "1")
                    <input class="form-check-input" type="radio" name="lastimarse" id="lastimarse1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="lastimarse" id="lastimarse1" value="1">
                @endif
                <label class="form-check-label" for="lastimarse">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("lastimarse", $perfil) &&  $perfil["lastimarse"] == "2")
                    <input class="form-check-input" type="radio" name="lastimarse" id="lastimarse2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="lastimarse" id="lastimarse2" value="2">
                @endif
                <label class="form-check-label" for="lastimarse2">
                    Sí
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VI. Vida Social y escolar</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>30. ¿Cómo se relaciona con otros niños?</p>
            <div class="form-check">
                @if(array_key_exists("relacionninos", $perfil) &&  $perfil["relacionninos"] == "1")
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos1" value="1">
                @endif
                <label class="form-check-label" for="relacionninos">
                    Juega e interactúa sin problemas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("relacionninos", $perfil) &&  $perfil["relacionninos"] == "2")
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos2" value="2">
                @endif
                <label class="form-check-label" for="relacionninos2">
                    Prefiere estar solo/a
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("relacionninos", $perfil) &&  $perfil["relacionninos"] == "3")
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionninos" id="relacionninos3" value="3">
                @endif
                <label class="form-check-label" for="relacionninos3">
                    Tiene conflictos frecuentes con sus compañeros
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>31. ¿Cómo le va en la escuela?</p>
            <div class="form-check">
                @if(array_key_exists("escuela", $perfil) &&  $perfil["escuela"] == "1")
                    <input class="form-check-input" type="radio" name="escuela" id="escuela1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="escuela" id="escuela1" value="1">
                @endif
                <label class="form-check-label" for="escuela">
                    Buen rendimiento
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("escuela", $perfil) &&  $perfil["escuela"] == "2")
                    <input class="form-check-input" type="radio" name="escuela" id="escuela2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="escuela" id="escuela2" value="2">
                @endif
                <label class="form-check-label" for="escuela2">
                    Dificultades en algunas materias
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("escuela", $perfil) &&  $perfil["escuela"] == "3")
                    <input class="form-check-input" type="radio" name="escuela" id="escuela3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="escuela" id="escuela3" value="3">
                @endif
                <label class="form-check-label" for="escuela3">
                    Dificultades importantes en todas las materias
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>32. ¿Cómo reacciona ante la escuela?</p>
            <div class="form-check">
                @if(array_key_exists("reaccionescuela", $perfil) &&  $perfil["reaccionescuela"] == "1")
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela1" value="1">
                @endif
                <label class="form-check-label" for="reaccionescuela">
                    Va con gusto
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("reaccionescuela", $perfil) &&  $perfil["reaccionescuela"] == "2")
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela2" value="2">
                @endif
                <label class="form-check-label" for="reaccionescuela2">
                    Expresa desagrado, pero asiste
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("reaccionescuela", $perfil) &&  $perfil["reaccionescuela"] == "3")
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="reaccionescuela" id="reaccionescuela3" value="3">
                @endif
                <label class="form-check-label" for="reaccionescuela3">
                    Se niega a ir o muestra ansiedad extrema
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>33. ¿Realiza actividades extracurriculares?</p>
            <div class="form-check">
                @if(array_key_exists("extracurriculares", $perfil) &&  $perfil["extracurriculares"] == "1")
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares1" value="1">
                @endif
                <label class="form-check-label" for="extracurriculares">
                    Deportes
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("extracurriculares", $perfil) &&  $perfil["extracurriculares"] == "2")
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares2" value="2">
                @endif
                <label class="form-check-label" for="extracurriculares2">
                    Música/Arte
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("extracurriculares", $perfil) &&  $perfil["extracurriculares"] == "3")
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares3" value="3">
                @endif
                <label class="form-check-label" for="extracurriculares3">
                    Otro:
                </label>
                <input class="form-control" type="text" id="extracurriculares_otro" name="extracurriculares_otro" value="{{$perfil["extracurriculares_otro"]??null}}" placeholder="especifique">
            </div>
            <div class="form-check">
                @if(array_key_exists("extracurriculares", $perfil) &&  $perfil["extracurriculares"] == "4")
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares4" value="4" checked>
                @else
                    <input class="form-check-input" type="radio" name="extracurriculares" id="extracurriculares4" value="4">
                @endif
                <label class="form-check-label" for="extracurriculares4">
                    No
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VII. Hábitos y estilo de vida</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>34. ¿Cuántas horas duerme en promedio por noche?</p>
            <div class="form-check">
                @if(array_key_exists("duerme", $perfil) &&  $perfil["duerme"] == "1")
                    <input class="form-check-input" type="radio" name="duerme" id="duerme1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="duerme" id="duerme1" value="1">
                @endif
                <label class="form-check-label" for="duerme">
                    Menos de 6 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("duerme", $perfil) &&  $perfil["duerme"] == "2")
                    <input class="form-check-input" type="radio" name="duerme" id="duerme2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="duerme" id="duerme2" value="2">
                @endif
                <label class="form-check-label" for="duerme2">
                    Entre 6 y 8 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("duerme", $perfil) &&  $perfil["duerme"] == "3")
                    <input class="form-check-input" type="radio" name="duerme" id="duerme3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="duerme" id="duerme3" value="3">
                @endif
                <label class="form-check-label" for="duerme3">
                    Más de 8 horas
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>35. ¿Duerme de manera continua o tiene despertares frecuentes?</p>
            <div class="form-check">
                @if(array_key_exists("despertares", $perfil) &&  $perfil["despertares"] == "1")
                    <input class="form-check-input" type="radio" name="despertares" id="despertares1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="despertares" id="despertares1" value="1">
                @endif
                <label class="form-check-label" for="despertares">
                    Duerme bien
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("despertares", $perfil) &&  $perfil["despertares"] == "2")
                    <input class="form-check-input" type="radio" name="despertares" id="despertares2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="despertares" id="despertares2" value="2">
                @endif
                <label class="form-check-label" for="despertares2">
                    Se despierta varias veces
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>36. ¿Cuantas horas al día usa pantallas? (TV, video juegos, celular)</p>
            <div class="form-check">
                @if(array_key_exists("pantalla", $perfil) &&  $perfil["pantalla"] == "1")
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla1" value="1">
                @endif
                <label class="form-check-label" for="pantalla">
                    Menos de 1 hora
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("pantalla", $perfil) &&  $perfil["pantalla"] == "2")
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla2" value="2">
                @endif
                <label class="form-check-label" for="pantalla2">
                    Entre 1 y 3 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("pantalla", $perfil) &&  $perfil["pantalla"] == "3")
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="pantalla" id="pantalla3" value="3">
                @endif
                <label class="form-check-label" for="pantalla3">
                    Más de 3 horas
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>37. ¿Realiza actividad física regularmente?</p>
            <div class="form-check">
                @if(array_key_exists("actividadfisica", $perfil) &&  $perfil["actividadfisica"] == "1")
                    <input class="form-check-input" type="radio" name="actividadfisica" id="actividadfisica1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadfisica" id="actividadfisica1" value="1">
                @endif
                <label class="form-check-label" for="actividadfisica">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadfisica", $perfil) &&  $perfil["actividadfisica"] == "2")
                    <input class="form-check-input" type="radio" name="actividadfisica" id="actividadfisica2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadfisica" id="actividadfisica2" value="2">
                @endif
                <label class="form-check-label" for="actividadfisica2">
                    Sí
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VIII. Síntomas en adolescentes (solo para mayores de 12 años)</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>38. ¿Ha notado cambios drásticos en el estado de ánimo?</p>
            <div class="form-check">
                @if(array_key_exists("estadoanimo", $perfil) &&  $perfil["estadoanimo"] == "1")
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo1" value="1">
                @endif
                <label class="form-check-label" for="estadoanimo">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("estadoanimo", $perfil) &&  $perfil["estadoanimo"] == "2")
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="estadoanimo" id="estadoanimo2" value="2">
                @endif
                <label class="form-check-label" for="estadoanimo2">
                    Sí
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>39. ¿Se aísla de amigos o familiares?</p>
            <div class="form-check">
                @if(array_key_exists("aislamiento", $perfil) &&  $perfil["aislamiento"] == "1")
                    <input class="form-check-input" type="radio" name="aislamiento" id="aislamiento1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="aislamiento" id="aislamiento1" value="1">
                @endif
                <label class="form-check-label" for="aislamiento">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("aislamiento", $perfil) &&  $perfil["aislamiento"] == "2")
                    <input class="form-check-input" type="radio" name="aislamiento" id="aislamiento2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="aislamiento" id="aislamiento2" value="2">
                @endif
                <label class="form-check-label" for="aislamiento2">
                    Sí
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>40. ¿Ha mostrado interés en actividades de riesgo? (Ejemplo: consumo de sustancias, conductas peligrosas)</p>
            <div class="form-check">
                @if(array_key_exists("actividadesriesto", $perfil) &&  $perfil["actividadesriesto"] == "1")
                    <input class="form-check-input" type="radio" name="actividadesriesto" id="actividadesriesto1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadesriesto" id="actividadesriesto1" value="1">
                @endif
                <label class="form-check-label" for="actividadesriesto">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadesriesto", $perfil) &&  $perfil["actividadesriesto"] == "2")
                    <input class="form-check-input" type="radio" name="actividadesriesto" id="actividadesriesto2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadesriesto" id="actividadesriesto2" value="2">
                @endif
                <label class="form-check-label" for="actividadesriesto2">
                    Sí
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>41. ¿Ha expresado ideas de autolesionarse o pensamientos suicidas?</p>
            <div class="form-check">
                @if(array_key_exists("autolesionarse", $perfil) &&  $perfil["autolesionarse"] == "1")
                    <input class="form-check-input" type="radio" name="autolesionarse" id="autolesionarse1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="autolesionarse" id="autolesionarse1" value="1">
                @endif
                <label class="form-check-label" for="autolesionarse">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("autolesionarse", $perfil) &&  $perfil["autolesionarse"] == "2")
                    <input class="form-check-input" type="radio" name="autolesionarse" id="autolesionarse2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="autolesionarse" id="autolesionarse2" value="2">
                @endif
                <label class="form-check-label" for="autolesionarse2">
                    Sí
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">IX. Observaciones adicionales</h3>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="extra" class="form-label">(Escriba cualquier otro dato que considere importante sobre su hijo/a)</label>
    <textarea class="form-control" type="text" id="extra" name="extra" rows="3">{{$perfil["extra"]??null}}</textarea>
</div>
