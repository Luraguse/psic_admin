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
    <div class="form-check">
        @if(array_key_exists("sexo", $perfil) &&  $perfil["sexo"] == "3")
            <input class="form-check-input" type="radio" name="sexo" id="sexo3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="sexo" id="sexo3" value="3">
        @endif
        <label class="form-check-label" for="sexo3">
            Prefiero no decir
        </label>
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <p>5. Estado Civil</p>
    <div class="form-check">
        @if(array_key_exists("estadocivil", $perfil) &&  $perfil["estadocivil"] == "1")
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil1" value="1">
        @endif
        <label class="form-check-label" for="estadocivil1">
            Soltero/a
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("estadocivil", $perfil) &&  $perfil["estadocivil"] == "2")
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil2" value="2">
        @endif
        <label class="form-check-label" for="estadocivil2">
            Casado/a
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("estadocivil", $perfil) &&  $perfil["estadocivil"] == "3")
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil3" value="3">
        @endif
        <label class="form-check-label" for="estadocivil3">
            Union Libre
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("estadocivil", $perfil) &&  $perfil["estadocivil"] == "4")
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="estadocivil" id="estadocivil4" value="4">
        @endif
        <label class="form-check-label" for="estadocivil4">
            Otro
        </label>
        <input class="form-control" type="text" id="estadocivil_otro" name="estadocivil_otro" value="{{$perfil["estadocivil_otro"]??null}}">
    </div>
</div>

<div class="col-md-6 col-sm-12">
    <p>6. Nivel de estudios alcanzado</p>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "1")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad1" value="1">
        @endif
        <label class="form-check-label" for="escolaridad1">
            Primaria
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "2")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad2" value="2">
        @endif
        <label class="form-check-label" for="escolaridad2">
            Secundaria
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "3")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad3" value="3">
        @endif
        <label class="form-check-label" for="escolaridad3">
            Preparatoria
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "4")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad4" value="4">
        @endif
        <label class="form-check-label" for="escolaridad4">
            Universidad
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "5")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad5" value="5" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad5" value="5">
        @endif
        <label class="form-check-label" for="escolaridad5">
            Posgrado
        </label>
    </div>
</div>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="ocupacionactual" class="form-label">7. Ocupacion actual</label>
    <input class="form-control" type="text" id="ocupacionactual" name="ocupacionactual" value="{{$perfil['ocupacionactual']??null}}">
</div>

<div class="col-md-6 col-sm-12">
    <p>8. ¿Quién refiere la consulta</p>
    <div class="form-check">
        @if(array_key_exists("refiereconsulta", $perfil) &&  $perfil["refiereconsulta"] == "1")
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta1" value="1">
        @endif
        <label class="form-check-label" for="refiereconsulta1">
            Personal médico
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("refiereconsulta", $perfil) &&  $perfil["refiereconsulta"] == "2")
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta2" value="2">
        @endif
        <label class="form-check-label" for="refiereconsulta2">
            Psicólogo
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("refiereconsulta", $perfil) &&  $perfil["refiereconsulta"] == "3")
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta3" value="3">
        @endif
        <label class="form-check-label" for="refiereconsulta3">
            Neuropsicólogo
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("refiereconsulta", $perfil) &&  $perfil["refiereconsulta"] == "4")
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta4" value="4" checked>
        @else
            <input class="form-check-input" type="radio" name="refiereconsulta" id="refiereconsulta4" value="4">
        @endif
        <label class="form-check-label" for="refiereconsulta4">
            Otro
        </label>
        <input class="form-control" type="text" id="refiereconsulta_otro" name="refiereconsulta_otro" value="{{$perfil["refiereconsulta_otro"]??null}}">
    </div>
</div>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="descripcion" class="form-label">9. Motivo principal de consulta<br><i>(Describa
            con sus propias palabras)</i></label>
    <textarea class="form-control" type="text" id="descripcion" name="descripcion" rows="3">{{$perfil["descripcion"]??null}}</textarea>
</div>


<h3 class="col-md-12">II. Antecedentes Médicos y Neurológicos</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>10. ¿Ha sido diagnosticado con alguna enfermedad neurológica o psiquiátrica?</p>
            <div class="form-check">
                @if(array_key_exists("enfermedadneurologica", $perfil) &&  $perfil["enfermedadneurologica"] == "1")
                    <input class="form-check-input" type="radio" name="enfermedadneurologica" id="enfermedadneurologica1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="enfermedadneurologica" id="enfermedadneurologica1" value="1">
                @endif
                <label class="form-check-label" for="enfermedadneurologica1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("enfermedadneurologica", $perfil) &&  $perfil["enfermedadneurologica"] == "2")
                    <input class="form-check-input" type="radio" name="enfermedadneurologica" id="enfermedadneurologica2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="enfermedadneurologica" id="enfermedadneurologica2" value="2">
                @endif
                <label class="form-check-label" for="enfermedadneurologica2">
                    Si
                </label>
                <input class="form-control" type="text" id="enfermedadneurologica_otro" name="enfermedadneurologica_otro" value="{{$perfil["enfermedadneurologica_otro"]??null}}">
                <label class="form-check-label" for="enfermedadneurologica_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>11. ¿Ha tenido alguna lesión en la cabeza o traumatismo craneoencefálico?</p>
            <div class="form-check">
                @if(array_key_exists("traumatismo", $perfil) &&  $perfil["traumatismo"] == "1")
                    <input class="form-check-input" type="radio" name="traumatismo" id="traumatismo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="traumatismo" id="traumatismo1" value="1">
                @endif
                <label class="form-check-label" for="traumatismo1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("traumatismo", $perfil) &&  $perfil["traumatismo"] == "2")
                    <input class="form-check-input" type="radio" name="traumatismo" id="traumatismo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="traumatismo" id="traumatismo2" value="2">
                @endif
                <label class="form-check-label" for="traumatismo2">
                    Si
                </label>
                <input class="form-control" type="text" id="traumatismo_otro" name="traumatismo_otro" value="{{$perfil["traumatismo_otro"]??null}}">
                <label class="form-check-label" for="traumatismo_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>12. ¿Ha presentado crisis convulsivas, pérdida de conciencia o desmayos?</p>
            <div class="form-check">
                @if(array_key_exists("desmayos", $perfil) &&  $perfil["desmayos"] == "1")
                    <input class="form-check-input" type="radio" name="desmayos" id="desmayos1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="desmayos" id="desmayos1" value="1">
                @endif
                <label class="form-check-label" for="desmayos1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("desmayos", $perfil) &&  $perfil["desmayos"] == "2")
                    <input class="form-check-input" type="radio" name="desmayos" id="desmayos2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="desmayos" id="desmayos2" value="2">
                @endif
                <label class="form-check-label" for="desmayos2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>13. ¿Ha tenido problemas de memoria o dificultades para recordar eventos recientes?</p>
            <div class="form-check">
                @if(array_key_exists("problemas_memoria", $perfil) &&  $perfil["problemas_memoria"] == "1")
                    <input class="form-check-input" type="radio" name="problemas_memoria" id="problemas_memoria1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="problemas_memoria" id="problemas_memoria1" value="1">
                @endif
                <label class="form-check-label" for="problemas_memoria1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("problemas_memoria", $perfil) &&  $perfil["problemas_memoria"] == "2")
                    <input class="form-check-input" type="radio" name="problemas_memoria" id="problemas_memoria2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="problemas_memoria" id="problemas_memoria2" value="2">
                @endif
                <label class="form-check-label" for="problemas_memoria2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">III. Funciones cognitivas y neuropsicológicas</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>14. ¿Ha notado dificultades en alguna de las siguientes áreas? <i>(Marque las que apliquen)</i></p>
            <div class="form-check">
                @if(array_key_exists("atencion", $perfil) && $perfil["atencion"])
                    <input class="form-check-input" type="checkbox" name="atencion" id="atencion"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="atencion" id="atencion"  value="1">
                @endif
                <label class="form-check-label" for="atencion">
                    Atención y concentración (Ejemplo: se distrae fácilmente, pierde el hilo de la conversación)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("memoria", $perfil) && $perfil["memoria"])
                    <input class="form-check-input" type="checkbox" name="memoria" id="memoria" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="memoria" id="memoria" value="1">
                @endif
                <label class="form-check-label" for="memoria">
                    Memoria (Ejemplo: olvida citas, conversaciones o dónde deja las cosas)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("organizacion", $perfil) && $perfil["organizacion"])
                    <input class="form-check-input" type="checkbox" name="organizacion" id="organizacion" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="organizacion" id="organizacion" value="1">
                @endif
                <label class="form-check-label" for="organizacion">
                    Organización y planificación (Ejemplo: dificultad para administrar tiempo y tareas)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("orientacion", $perfil) && $perfil["orientacion"])
                    <input class="form-check-input" type="checkbox" name="orientacion" id="orientacion" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="orientacion" id="orientacion" value="1">
                @endif
                <label class="form-check-label" for="orientacion">
                    Orientación (Ejemplo: se desubica en lugares conocidos o pierde el sentido del tiempo)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("ninguna", $perfil) && $perfil["ninguna"])
                    <input class="form-check-input" type="checkbox" name="ninguna" id="ninguna" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="ninguna" id="ninguna" value="1">
                @endif
                <label class="form-check-label" for="ninguna">
                    Ninguna
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>15. ¿Ha tenido dificultades en la lectura, escritura o comprensión de información?</p>
            <div class="form-check">
                @if(array_key_exists("comprension", $perfil) &&  $perfil["comprension"] == "1")
                    <input class="form-check-input" type="radio" name="comprension" id="comprension1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="comprension" id="comprension1" value="1">
                @endif
                <label class="form-check-label" for="comprension1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("comprension", $perfil) &&  $perfil["comprension"] == "2")
                    <input class="form-check-input" type="radio" name="comprension" id="comprension2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="comprension" id="comprension2" value="2">
                @endif
                <label class="form-check-label" for="comprension2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>16. ¿Ha notado cambios en la forma en que habla o en la pronunciación de las palabras?</p>
            <div class="form-check">
                @if(array_key_exists("pronunciacion", $perfil) &&  $perfil["pronunciacion"] == "1")
                    <input class="form-check-input" type="radio" name="pronunciacion" id="pronunciacion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="pronunciacion" id="pronunciacion1" value="1">
                @endif
                <label class="form-check-label" for="pronunciacion1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("pronunciacion", $perfil) &&  $perfil["pronunciacion"] == "2")
                    <input class="form-check-input" type="radio" name="pronunciacion" id="pronunciacion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="pronunciacion" id="pronunciacion2" value="2">
                @endif
                <label class="form-check-label" for="pronunciacion2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">IV. Salud mental y emocional</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>17. En los últimos meses, ¿ha experimentado alguno de estos síntomas? <i>(Marque las que apliquen)</i></p>
            <div class="form-check">
                @if(array_key_exists("ansiedad", $perfil) && $perfil["ansiedad"])
                    <input class="form-check-input" type="checkbox" name="ansiedad" id="ansiedad"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="ansiedad" id="ansiedad"  value="1">
                @endif
                <label class="form-check-label" for="ansiedad">
                    Ansiedad excesiva o preocupaciones constantes
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("tristeza", $perfil) && $perfil["tristeza"])
                    <input class="form-check-input" type="checkbox" name="tristeza" id="tristeza" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="tristeza" id="tristeza" value="1">
                @endif
                <label class="form-check-label" for="tristeza">
                    Tristeza persistente, desesperanza o pérdida de interés en actividades
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("cambiosanimo", $perfil) && $perfil["cambiosanimo"])
                    <input class="form-check-input" type="checkbox" name="cambiosanimo" id="cambiosanimo" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="cambiosanimo" id="cambiosanimo" value="1">
                @endif
                <label class="form-check-label" for="cambiosanimo">
                    Cambios drásticos en el estado de ánimo
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("irritabilidad", $perfil) && $perfil["irritabilidad"])
                    <input class="form-check-input" type="checkbox" name="irritabilidad" id="irritabilidad" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="irritabilidad" id="irritabilidad" value="1">
                @endif
                <label class="form-check-label" for="irritabilidad">
                    Irritabilidad o enojo frecuente
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("problemasdormir", $perfil) && $perfil["problemasdormir"])
                    <input class="form-check-input" type="checkbox" name="problemasdormir" id="problemasdormir" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="problemasdormir" id="problemasdormir" value="1">
                @endif
                <label class="form-check-label" for="problemasdormir">
                    Problemas para dormir (insomnio o sueño excesivo)
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("cansancio", $perfil) && $perfil["cansancio"])
                    <input class="form-check-input" type="checkbox" name="cansancio" id="cansancio" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="cansancio" id="cansancio" value="1">
                @endif
                <label class="form-check-label" for="cansancio">
                    Sensación de cansancio o fatiga sin razón aparente
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("autolesion", $perfil) && $perfil["autolesion"])
                    <input class="form-check-input" type="checkbox" name="autolesion" id="autolesion" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="autolesion" id="autolesion" value="1">
                @endif
                <label class="form-check-label" for="autolesion">
                    Pensamientos de autolesión o suicidio
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>18. ¿Ha experimentado ataques de pánico o episodios de miedo intenso sin razón aparente?</p>
            <div class="form-check">
                @if(array_key_exists("panico", $perfil) &&  $perfil["panico"] == "1")
                    <input class="form-check-input" type="radio" name="panico" id="panico1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="panico" id="panico1" value="1">
                @endif
                <label class="form-check-label" for="panico1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("panico", $perfil) &&  $perfil["panico"] == "2")
                    <input class="form-check-input" type="radio" name="panico" id="panico2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="panico" id="panico2" value="2">
                @endif
                <label class="form-check-label" for="panico2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>19. ¿Cómo describiría su nivel de estrés actual?</p>
            <div class="form-check">
                @if(array_key_exists("nivelestres", $perfil) &&  $perfil["nivelestres"] == "1")
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres1" value="1">
                @endif
                <label class="form-check-label" for="nivelestres1">
                    Bajo
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("nivelestres", $perfil) &&  $perfil["nivelestres"] == "2")
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres2" value="2">
                @endif
                <label class="form-check-label" for="nivelestres2">
                    Moderado
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("nivelestres", $perfil) &&  $perfil["nivelestres"] == "3")
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres3" value="3">
                @endif
                <label class="form-check-label" for="nivelestres3">
                    Alto
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("nivelestres", $perfil) &&  $perfil["nivelestres"] == "4")
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres4" value="4" checked>
                @else
                    <input class="form-check-input" type="radio" name="nivelestres" id="nivelestres4" value="4">
                @endif
                <label class="form-check-label" for="nivelestres4">
                    Extremo
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">V. Vida social y laboral</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>20. ¿Cómo describiría sus relaciones interpersonales?</p>
            <div class="form-check">
                @if(array_key_exists("relacionesinterpersonales", $perfil) &&  $perfil["relacionesinterpersonales"] == "1")
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales1" value="1">
                @endif
                <label class="form-check-label" for="relacionesinterpersonales1">
                    Buenas, sin dificultades
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("relacionesinterpersonales", $perfil) &&  $perfil["relacionesinterpersonales"] == "2")
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales2" value="2">
                @endif
                <label class="form-check-label" for="relacionesinterpersonales2">
                    Me cuesta confiar o relacionarme con los demás
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("relacionesinterpersonales", $perfil) &&  $perfil["relacionesinterpersonales"] == "3")
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="relacionesinterpersonales" id="relacionesinterpersonales3" value="3">
                @endif
                <label class="form-check-label" for="relacionesinterpersonales3">
                    Evito el contacto social la mayor parte del tiempo
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>21. ¿Ha tenido dificultades para mantener un empleo o desempeñarse en su trabajo por problemas emocionales o cognitivos?</p>
            <div class="form-check">
                @if(array_key_exists("dificultadesempleo", $perfil) &&  $perfil["dificultadesempleo"] == "1")
                    <input class="form-check-input" type="radio" name="dificultadesempleo" id="dificultadesempleo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="dificultadesempleo" id="dificultadesempleo1" value="1">
                @endif
                <label class="form-check-label" for="dificultadesempleo1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("dificultadesempleo", $perfil) &&  $perfil["dificultadesempleo"] == "2")
                    <input class="form-check-input" type="radio" name="dificultadesempleo" id="dificultadesempleo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="dificultadesempleo" id="dificultadesempleo2" value="2">
                @endif
                <label class="form-check-label" for="dificultadesempleo2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>22. ¿Ha notado que otras personas le comentan que ha cambiado su forma de ser o de actuar?</p>
            <div class="form-check">
                @if(array_key_exists("formaactuar", $perfil) &&  $perfil["formaactuar"] == "1")
                    <input class="form-check-input" type="radio" name="formaactuar" id="formaactuar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="formaactuar" id="formaactuar1" value="1">
                @endif
                <label class="form-check-label" for="formaactuar1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("formaactuar", $perfil) &&  $perfil["formaactuar"] == "2")
                    <input class="form-check-input" type="radio" name="formaactuar" id="formaactuar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="formaactuar" id="formaactuar2" value="2">
                @endif
                <label class="form-check-label" for="formaactuar2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VI. Comportamiento y hábitos</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>23. ¿Ha cambiado su apetito o hábitos alimenticios en los últimos meses?</p>
            <div class="form-check">
                @if(array_key_exists("apetitono", $perfil) && $perfil["apetitono"])
                    <input class="form-check-input" type="checkbox" name="apetitono" id="apetitono"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="apetitono" id="apetitono"  value="1">
                @endif
                <label class="form-check-label" for="apetitono">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("apetitosi", $perfil) && $perfil["apetitosi"])
                    <input class="form-check-input" type="checkbox" name="apetitosi" id="apetitosi" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="apetitosi" id="apetitosi" value="1">
                @endif
                <label class="form-check-label" for="apetitosi">
                    Si
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("comemenos", $perfil) && $perfil["comemenos"])
                    <input class="form-check-input" type="checkbox" name="comemenos" id="comemenos" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="comemenos" id="comemenos" value="1">
                @endif
                <label class="form-check-label" for="comemenos">
                    Come menos
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("comemas", $perfil) && $perfil["comemas"])
                    <input class="form-check-input" type="checkbox" name="comemas" id="comemas" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="comemas" id="comemas" value="1">
                @endif
                <label class="form-check-label" for="comemas">
                    Come más
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("atracon", $perfil) && $perfil["atracon"])
                    <input class="form-check-input" type="checkbox" name="atracon" id="atracon" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="atracon" id="atracon" value="1">
                @endif
                <label class="form-check-label" for="atracon">
                    Episodios de atracón
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>24. ¿Ha notado cambios en su peso sin razón aparente?</p>
            <div class="form-check">
                @if(array_key_exists("pesono", $perfil) && $perfil["pesono"])
                    <input class="form-check-input" type="checkbox" name="pesono" id="pesono"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="pesono" id="pesono"  value="1">
                @endif
                <label class="form-check-label" for="pesono">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("pesosi", $perfil) && $perfil["pesosi"])
                    <input class="form-check-input" type="checkbox" name="pesosi" id="pesosi" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="pesosi" id="pesosi" value="1">
                @endif
                <label class="form-check-label" for="pesosi">
                    Si
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("bajadodepeso", $perfil) && $perfil["bajadodepeso"])
                    <input class="form-check-input" type="checkbox" name="bajadodepeso" id="bajadodepeso" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="bajadodepeso" id="bajadodepeso" value="1">
                @endif
                <label class="form-check-label" for="bajadodepeso">
                    Ha bajado
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("subidopeso", $perfil) && $perfil["subidopeso"])
                    <input class="form-check-input" type="checkbox" name="subidopeso" id="subidopeso" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="subidopeso" id="subidopeso" value="1">
                @endif
                <label class="form-check-label" for="subidopeso">
                    Ha subido
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>25. ¿Cuántas horas duerme en promedio por noche?</p>
            <div class="form-check">
                @if(array_key_exists("horasduerme", $perfil) &&  $perfil["horasduerme"] == "1")
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme1" value="1">
                @endif
                <label class="form-check-label" for="horasduerme1">
                    Menos de 5 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horasduerme", $perfil) &&  $perfil["horasduerme"] == "2")
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme2" value="2">
                @endif
                <label class="form-check-label" for="horasduerme2">
                    Entre 5 y 7 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horasduerme", $perfil) &&  $perfil["horasduerme"] == "3")
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="horasduerme" id="horasduerme3" value="3">
                @endif
                <label class="form-check-label" for="horasduerme3">
                    Más de 7 horas
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>26. ¿Duerme bien o tiene despertares frecuentes?</p>
            <div class="form-check">
                @if(array_key_exists("calidadsueno", $perfil) &&  $perfil["calidadsueno"] == "1")
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno1" value="1">
                @endif
                <label class="form-check-label" for="calidadsueno1">
                    Duerme bien
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("calidadsueno", $perfil) &&  $perfil["calidadsueno"] == "2")
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno2" value="2">
                @endif
                <label class="form-check-label" for="calidadsueno2">
                    Tiene despertares frecuentes
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("calidadsueno", $perfil) &&  $perfil["calidadsueno"] == "3")
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="calidadsueno" id="calidadsueno3" value="3">
                @endif
                <label class="form-check-label" for="calidadsueno3">
                    Pesadillas constantes
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>27. ¿Cuántas horas al día usa pantallas (celular, computadora, TV)?</p>
            <div class="form-check">
                @if(array_key_exists("horaspantalla", $perfil) &&  $perfil["horaspantalla"] == "1")
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla1" value="1">
                @endif
                <label class="form-check-label" for="horaspantalla1">
                    Menos de 2 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horaspantalla", $perfil) &&  $perfil["horaspantalla"] == "2")
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla2" value="2">
                @endif
                <label class="form-check-label" for="horaspantalla2">
                    Entre 2 y 4 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horaspantalla", $perfil) &&  $perfil["horaspantalla"] == "3")
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="horaspantalla" id="horaspantalla3" value="3">
                @endif
                <label class="form-check-label" for="horaspantalla3">
                    Más de 4 horas
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>28. ¿Realiza actividad física regularmente?</p>
            <div class="form-check">
                @if(array_key_exists("actividadfisicano", $perfil) && $perfil["actividadfisicano"])
                    <input class="form-check-input" type="checkbox" name="actividadfisicano" id="actividadfisicano"  value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="actividadfisicano" id="actividadfisicano"  value="1">
                @endif
                <label class="form-check-label" for="actividadfisicano">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadfisicasi", $perfil) && $perfil["actividadfisicasi"])
                    <input class="form-check-input" type="checkbox" name="actividadfisicasi" id="actividadfisicasi" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="actividadfisicasi" id="actividadfisicasi" value="1">
                @endif
                <label class="form-check-label" for="actividadfisicasi">
                    Si
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadfisicabaja", $perfil) && $perfil["actividadfisicabaja"])
                    <input class="form-check-input" type="checkbox" name="actividadfisicabaja" id="actividadfisicabaja" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="actividadfisicabaja" id="actividadfisicabaja" value="1">
                @endif
                <label class="form-check-label" for="actividadfisicabaja">
                    Menos de 3 veces por semana
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadfisicaalta", $perfil) && $perfil["actividadfisicaalta"])
                    <input class="form-check-input" type="checkbox" name="actividadfisicaalta" id="actividadfisicaalta" value="1" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="actividadfisicaalta" id="actividadfisicaalta" value="1">
                @endif
                <label class="form-check-label" for="actividadfisicaalta">
                    3 veces o más por semana
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VII. Consumo de sustancias y conductas de riesgo</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>29. ¿Consume alcohol?</p>
            <div class="form-check">
                @if(array_key_exists("consumoalcohol", $perfil) &&  $perfil["consumoalcohol"] == "1")
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol1" value="1">
                @endif
                <label class="form-check-label" for="consumoalcohol1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("consumoalcohol", $perfil) &&  $perfil["consumoalcohol"] == "2")
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol2" value="2">
                @endif
                <label class="form-check-label" for="consumoalcohol2">
                    Ocasionalmente
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("consumoalcohol", $perfil) &&  $perfil["consumoalcohol"] == "3")
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumoalcohol" id="consumoalcohol3" value="3">
                @endif
                <label class="form-check-label" for="consumoalcohol3">
                    Frecuentemente
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>30. ¿Consume tabaco o vapeadores?</p>
            <div class="form-check">
                @if(array_key_exists("consumotabaco", $perfil) &&  $perfil["consumotabaco"] == "1")
                    <input class="form-check-input" type="radio" name="consumotabaco" id="consumotabaco1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumotabaco" id="consumotabaco1" value="1">
                @endif
                <label class="form-check-label" for="consumotabaco1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("consumotabaco", $perfil) &&  $perfil["consumotabaco"] == "2")
                    <input class="form-check-input" type="radio" name="consumotabaco" id="consumotabaco2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumotabaco" id="consumotabaco2" value="2">
                @endif
                <label class="form-check-label" for="consumotabaco2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>31. ¿Consume o ha consumido drogas recreativas?</p>
            <div class="form-check">
                @if(array_key_exists("consumodrogas", $perfil) &&  $perfil["consumodrogas"] == "1")
                    <input class="form-check-input" type="radio" name="consumodrogas" id="consumodrogas1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumodrogas" id="consumodrogas1" value="1">
                @endif
                <label class="form-check-label" for="consumodrogas1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("consumodrogas", $perfil) &&  $perfil["consumodrogas"] == "2")
                    <input class="form-check-input" type="radio" name="consumodrogas" id="consumodrogas2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="consumodrogas" id="consumodrogas2" value="2">
                @endif
                <label class="form-check-label" for="consumodrogas2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>32. ¿Ha participado en conductas de riesgo en los últimos meses? <i>(Ejemplo: conducción imprudente, relaciones sexuales sin protección, apuestas excesivas)</i></p>
            <div class="form-check">
                @if(array_key_exists("conductasriesgo", $perfil) &&  $perfil["conductasriesgo"] == "1")
                    <input class="form-check-input" type="radio" name="conductasriesgo" id="conductasriesgo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="conductasriesgo" id="conductasriesgo1" value="1">
                @endif
                <label class="form-check-label" for="conductasriesgo1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("conductasriesgo", $perfil) &&  $perfil["conductasriesgo"] == "2")
                    <input class="form-check-input" type="radio" name="conductasriesgo" id="conductasriesgo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="conductasriesgo" id="conductasriesgo2" value="2">
                @endif
                <label class="form-check-label" for="conductasriesgo2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">VIII. Observaciones adicionales</h3>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="extra" class="form-label">(Escriba cualquier otro dato que considere importante sobre su situación actual)</label>
    <textarea class="form-control" type="text" id="extra" name="extra" rows="3">{{$perfil["extra"]??null}}</textarea>
</div>
