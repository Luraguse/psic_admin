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
            Viudo/a
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
        @if(array_key_exists("escolaridad", $perfil) &&  $perfil["escolaridad"] == "6")
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad6" value="6" checked>
        @else
            <input class="form-check-input" type="radio" name="escolaridad" id="escolaridad6" value="6">
        @endif
        <label class="form-check-label" for="escolaridad6">
            Sin estudios
        </label>
    </div>
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
<div class="col-md-6 col-sm-12">
    <p>7. ¿Vive solo/a?</p>
    <div class="form-check">
        @if(array_key_exists("vivecon", $perfil) &&  $perfil["vivecon"] == "1")
            <input class="form-check-input" type="radio" name="vivecon" id="vivecon1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="vivecon" id="vivecon1" value="1">
        @endif
        <label class="form-check-label" for="vivecon1">
            Si
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("vivecon", $perfil) &&  $perfil["vivecon"] == "2")
            <input class="form-check-input" type="radio" name="vivecon" id="vivecon2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="vivecon" id="vivecon2" value="2">
        @endif
        <label class="form-check-label" for="vivecon2">
            No, vive con:
        </label>
        <input class="form-control" type="text" id="estadocivil_otro" name="estadocivil_otro" value="{{$perfil["estadocivil_otro"]??null}}">
    </div>
</div>
<div class="col-md-6 col-sm-12">
    <p>8. ¿Quién llena este formulario?</p>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "1")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario1" value="1" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario1" value="1">
        @endif
        <label class="form-check-label" for="llenaformulario1">
            La persona evaluada
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "2")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario2" value="2" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario2" value="2">
        @endif
        <label class="form-check-label" for="llenaformulario2">
            Un familiar
        </label>
    </div>
    <div class="form-check">
        @if(array_key_exists("llenaformulario", $perfil) &&  $perfil["llenaformulario"] == "3")
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario3" value="3" checked>
        @else
            <input class="form-check-input" type="radio" name="llenaformulario" id="llenaformulario3" value="3">
        @endif
        <label class="form-check-label" for="llenaformulario3">
            Un cuidador
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
<div class="mb-3 col-md-12 col-sm-12">
    <label for="descripcion" class="form-label">9. Motivo principal de consulta<br><i>(Describa
            con sus propias palabras)</i></label>
    <textarea class="form-control" type="text" id="descripcion" name="descripcion" rows="3">{{$perfil["descripcion"]??null}}</textarea>
</div>
<h3 class="col-md-12">II. Antecedentes Médicos y Neurológicos</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>10. ¿Tiene algún diagnóstico médico importante?</p>
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
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>11. ¿Tiene antecedentes de enfermedades neurológicas?</p>
            <div class="form-check">
                @if(array_key_exists("antecedentesneuro", $perfil) &&  $perfil["antecedentesneuro"] == "1")
                    <input class="form-check-input" type="radio" name="antecedentesneuro" id="antecedentesneuro1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="antecedentesneuro" id="antecedentesneuro1" value="1">
                @endif
                <label class="form-check-label" for="antecedentesneuro1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("antecedentesneuro", $perfil) &&  $perfil["antecedentesneuro"] == "2")
                    <input class="form-check-input" type="radio" name="antecedentesneuro" id="antecedentesneuro2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="antecedentesneuro" id="antecedentesneuro2" value="2">
                @endif
                <label class="form-check-label" for="antecedentesneuro2">
                    Si (Ejemplo: Alzheimer, Parkinson, accidente cerebrovascular)
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>12. ¿Ha tenido traumatismos craneoencefálicos o golpes en la cabeza con pérdida de conciencia?</p>
            <div class="form-check">
                @if(array_key_exists("traumatismos", $perfil) &&  $perfil["traumatismos"] == "1")
                    <input class="form-check-input" type="radio" name="traumatismos" id="traumatismos1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="traumatismos" id="traumatismos1" value="1">
                @endif
                <label class="form-check-label" for="traumatismos1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("traumatismos", $perfil) &&  $perfil["traumatismos"] == "2")
                    <input class="form-check-input" type="radio" name="traumatismos" id="traumatismos2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="traumatismos" id="traumatismos2" value="2">
                @endif
                <label class="form-check-label" for="traumatismos2">
                    Si
                </label>
                <input class="form-control" type="text" id="traumatismos_otro" name="traumatismos_otro" value="{{$perfil["traumatismos_otro"]??null}}">
                <label class="form-check-label" for="traumatismos_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>13. ¿Toma actualmente algún medicamento de forma regular?</p>
            <div class="form-check">
                @if(array_key_exists("medicamentosregular", $perfil) &&  $perfil["medicamentosregular"] == "1")
                    <input class="form-check-input" type="radio" name="medicamentosregular" id="medicamentosregular1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="medicamentosregular" id="medicamentosregular1" value="1">
                @endif
                <label class="form-check-label" for="medicamentosregular1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("medicamentosregular", $perfil) &&  $perfil["medicamentosregular"] == "2")
                    <input class="form-check-input" type="radio" name="medicamentosregular" id="medicamentosregular2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="medicamentosregular" id="medicamentosregular2" value="2">
                @endif
                <label class="form-check-label" for="medicamentosregular2">
                    Si
                </label>
                <input class="form-control" type="text" id="medicamentosregular_otro" name="medicamentosregular_otro" value="{{$perfil["medicamentosregular_otro"]??null}}">
                <label class="form-check-label" for="medicamentosregular_otro">
                    Especifique
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>14. ¿Ha notado temblores, rigidez o dificultad para moverse?</p>
            <div class="form-check">
                @if(array_key_exists("temblores", $perfil) &&  $perfil["temblores"] == "1")
                    <input class="form-check-input" type="radio" name="temblores" id="temblores1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="temblores" id="temblores1" value="1">
                @endif
                <label class="form-check-label" for="temblores1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("temblores", $perfil) &&  $perfil["temblores"] == "2")
                    <input class="form-check-input" type="radio" name="temblores" id="temblores2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="temblores" id="temblores2" value="2">
                @endif
                <label class="form-check-label" for="temblores2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>15. ¿Ha presentado cambios en la visión o audición en el último año?</p>
            <div class="form-check">
                @if(array_key_exists("cambiosvision", $perfil) &&  $perfil["cambiosvision"] == "1")
                    <input class="form-check-input" type="radio" name="cambiosvision" id="cambiosvision1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="cambiosvision" id="cambiosvision1" value="1">
                @endif
                <label class="form-check-label" for="cambiosvision1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("cambiosvision", $perfil) &&  $perfil["cambiosvision"] == "2")
                    <input class="form-check-input" type="radio" name="cambiosvision" id="cambiosvision2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="cambiosvision" id="cambiosvision2" value="2">
                @endif
                <label class="form-check-label" for="cambiosvision2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">III. Memoria y funciones cognitivas</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>16. ¿Ha notado problemas de memoria recientes?</p>
            <div class="form-check">
                @if(array_key_exists("memoria", $perfil) &&  $perfil["memoria"] == "1")
                    <input class="form-check-input" type="radio" name="memoria" id="memoria1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="memoria" id="memoria1" value="1">
                @endif
                <label class="form-check-label" for="memoria1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("memoria", $perfil) &&  $perfil["memoria"] == "2")
                    <input class="form-check-input" type="radio" name="memoria" id="memoria2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="memoria" id="memoria2" value="2">
                @endif
                <label class="form-check-label" for="memoria2">
                    Si, olvida eventos recientes
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("memoria", $perfil) &&  $perfil["memoria"] == "3")
                    <input class="form-check-input" type="radio" name="memoria" id="memoria3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="memoria" id="memoria3" value="3">
                @endif
                <label class="form-check-label" for="memoria3">
                    Si, olvida eventos pasados
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>17. ¿Ha tenido dificultad para encontrar palabras o expresar sus ideas?</p>
            <div class="form-check">
                @if(array_key_exists("expresar", $perfil) &&  $perfil["expresar"] == "1")
                    <input class="form-check-input" type="radio" name="expresar" id="expresar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="expresar" id="expresar1" value="1">
                @endif
                <label class="form-check-label" for="expresar1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("expresar", $perfil) &&  $perfil["expresar"] == "2")
                    <input class="form-check-input" type="radio" name="expresar" id="expresar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="expresar" id="expresar2" value="2">
                @endif
                <label class="form-check-label" for="expresar2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>18. ¿Ha notado que repite la misma pregunta varias veces sin recordar la respuesta?</p>
            <div class="form-check">
                @if(array_key_exists("repeticion", $perfil) &&  $perfil["repeticion"] == "1")
                    <input class="form-check-input" type="radio" name="repeticion" id="repeticion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="repeticion" id="repeticion1" value="1">
                @endif
                <label class="form-check-label" for="repeticion1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("repeticion", $perfil) &&  $perfil["repeticion"] == "2")
                    <input class="form-check-input" type="radio" name="repeticion" id="repeticion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="repeticion" id="repeticion2" value="2">
                @endif
                <label class="form-check-label" for="repeticion2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>19. ¿Ha notado que se desorienta en lugares conocidos?</p>
            <div class="form-check">
                @if(array_key_exists("desorientacion", $perfil) &&  $perfil["desorientacion"] == "1")
                    <input class="form-check-input" type="radio" name="desorientacion" id="desorientacion1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="desorientacion" id="desorientacion1" value="1">
                @endif
                <label class="form-check-label" for="desorientacion1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("desorientacion", $perfil) &&  $perfil["desorientacion"] == "2")
                    <input class="form-check-input" type="radio" name="desorientacion" id="desorientacion2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="desorientacion" id="desorientacion2" value="2">
                @endif
                <label class="form-check-label" for="desorientacion2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>20. ¿Ha tenido problemas para manejar dinero, pagar cuentas o hacer compras solo/a?</p>
            <div class="form-check">
                @if(array_key_exists("manejodinero", $perfil) &&  $perfil["manejodinero"] == "1")
                    <input class="form-check-input" type="radio" name="manejodinero" id="manejodinero1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="manejodinero" id="manejodinero1" value="1">
                @endif
                <label class="form-check-label" for="manejodinero1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("manejodinero", $perfil) &&  $perfil["manejodinero"] == "2")
                    <input class="form-check-input" type="radio" name="manejodinero" id="manejodinero2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="manejodinero" id="manejodinero2" value="2">
                @endif
                <label class="form-check-label" for="manejodinero2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>21. ¿Tiene problemas para recordar citas o compromisos?</p>
            <div class="form-check">
                @if(array_key_exists("compromisos", $perfil) &&  $perfil["compromisos"] == "1")
                    <input class="form-check-input" type="radio" name="compromisos" id="compromisos1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="compromisos" id="compromisos1" value="1">
                @endif
                <label class="form-check-label" for="compromisos1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("compromisos", $perfil) &&  $perfil["compromisos"] == "2")
                    <input class="form-check-input" type="radio" name="compromisos" id="compromisos2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="compromisos" id="compromisos2" value="2">
                @endif
                <label class="form-check-label" for="compromisos2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>

<h3 class="col-md-12">IV. Lenguaje y comunicación</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>22. ¿Ha notado cambios en su forma de hablar o en su pronunciación?</p>
            <div class="form-check">
                @if(array_key_exists("habla", $perfil) &&  $perfil["habla"] == "1")
                    <input class="form-check-input" type="radio" name="habla" id="habla1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="habla" id="habla1" value="1">
                @endif
                <label class="form-check-label" for="habla1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("habla", $perfil) &&  $perfil["habla"] == "2")
                    <input class="form-check-input" type="radio" name="habla" id="habla2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="habla" id="habla2" value="2">
                @endif
                <label class="form-check-label" for="habla2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>23. ¿Tiene dificultades para comprender conversaciones o instrucciones?</p>
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
            <p>24. ¿Se le dificulta seguir programas de televisión, leer o entender textos?</p>
            <div class="form-check">
                @if(array_key_exists("seguimiento", $perfil) &&  $perfil["seguimiento"] == "1")
                    <input class="form-check-input" type="radio" name="seguimiento" id="seguimiento1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="seguimiento" id="seguimiento1" value="1">
                @endif
                <label class="form-check-label" for="seguimiento1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("seguimiento", $perfil) &&  $perfil["seguimiento"] == "2")
                    <input class="form-check-input" type="radio" name="seguimiento" id="seguimiento2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="seguimiento" id="seguimiento2" value="2">
                @endif
                <label class="form-check-label" for="seguimiento2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>25. ¿Suele olvidar nombres de personas cercanas o de objetos cotidianos?</p>
            <div class="form-check">
                @if(array_key_exists("olvidonombres", $perfil) &&  $perfil["olvidonombres"] == "1")
                    <input class="form-check-input" type="radio" name="olvidonombres" id="olvidonombres1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="olvidonombres" id="olvidonombres1" value="1">
                @endif
                <label class="form-check-label" for="olvidonombres1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("olvidonombres", $perfil) &&  $perfil["olvidonombres"] == "2")
                    <input class="form-check-input" type="radio" name="olvidonombres" id="olvidonombres2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="olvidonombres" id="olvidonombres2" value="2">
                @endif
                <label class="form-check-label" for="olvidonombres2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>

<h3 class="col-md-12">V. Salud emocional y conductual</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>26. En los últimos meses, ¿ha sentido tristeza, desánimo o pérdida de interés en actividades?</p>
            <div class="form-check">
                @if(array_key_exists("tristeza", $perfil) &&  $perfil["tristeza"] == "1")
                    <input class="form-check-input" type="radio" name="tristeza" id="tristeza1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="tristeza" id="tristeza1" value="1">
                @endif
                <label class="form-check-label" for="tristeza1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("tristeza", $perfil) &&  $perfil["tristeza"] == "2")
                    <input class="form-check-input" type="radio" name="tristeza" id="tristeza2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="tristeza" id="tristeza2" value="2">
                @endif
                <label class="form-check-label" for="tristeza2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>27. ¿Ha experimentado ansiedad, preocupación excesiva o miedo constante?</p>
            <div class="form-check">
                @if(array_key_exists("ansiedad", $perfil) &&  $perfil["ansiedad"] == "1")
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="ansiedad" id="ansiedad1" value="1">
                @endif
                <label class="form-check-label" for="ansiedad1">
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
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>28. ¿Ha notado cambios en su estado de ánimo, como irritabilidad o enojo frecuente?</p>
            <div class="form-check">
                @if(array_key_exists("animo", $perfil) &&  $perfil["animo"] == "1")
                    <input class="form-check-input" type="radio" name="animo" id="animo1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="animo" id="animo1" value="1">
                @endif
                <label class="form-check-label" for="animo1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("animo", $perfil) &&  $perfil["animo"] == "2")
                    <input class="form-check-input" type="radio" name="animo" id="animo2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="animo" id="animo2" value="2">
                @endif
                <label class="form-check-label" for="animo2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>29. ¿Ha tenido pensamientos de que su vida no tiene sentido o deseos de morir?</p>
            <div class="form-check">
                @if(array_key_exists("deseosmorir", $perfil) &&  $perfil["deseosmorir"] == "1")
                    <input class="form-check-input" type="radio" name="deseosmorir" id="deseosmorir1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="deseosmorir" id="deseosmorir1" value="1">
                @endif
                <label class="form-check-label" for="deseosmorir1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("deseosmorir", $perfil) &&  $perfil["deseosmorir"] == "2")
                    <input class="form-check-input" type="radio" name="deseosmorir" id="deseosmorir2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="deseosmorir" id="deseosmorir2" value="2">
                @endif
                <label class="form-check-label" for="deseosmorir2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>30. ¿Ha notado que otras personas le comentan que ha cambiado su forma de ser o de actuar?</p>
            <div class="form-check">
                @if(array_key_exists("actuar", $perfil) &&  $perfil["actuar"] == "1")
                    <input class="form-check-input" type="radio" name="actuar" id="actuar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="actuar" id="actuar1" value="1">
                @endif
                <label class="form-check-label" for="actuar1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actuar", $perfil) &&  $perfil["actuar"] == "2")
                    <input class="form-check-input" type="radio" name="actuar" id="actuar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="actuar" id="actuar2" value="2">
                @endif
                <label class="form-check-label" for="actuar2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>

<h3 class="col-md-12">VI. Vida social y autonomía</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>31. ¿Con qué frecuencia participa en actividades sociales?</p>
            <div class="form-check">
                @if(array_key_exists("socializar", $perfil) &&  $perfil["socializar"] == "1")
                    <input class="form-check-input" type="radio" name="socializar" id="socializar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="socializar" id="socializar1" value="1">
                @endif
                <label class="form-check-label" for="socializar1">
                    Diariamente
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("socializar", $perfil) &&  $perfil["socializar"] == "2")
                    <input class="form-check-input" type="radio" name="socializar" id="socializar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="socializar" id="socializar2" value="2">
                @endif
                <label class="form-check-label" for="socializar2">
                    Varias veces a la semana
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("socializar", $perfil) &&  $perfil["socializar"] == "3")
                    <input class="form-check-input" type="radio" name="socializar" id="socializar3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="socializar" id="socializar3" value="3">
                @endif
                <label class="form-check-label" for="socializar3">
                    Rara vez
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("socializar", $perfil) &&  $perfil["socializar"] == "4")
                    <input class="form-check-input" type="radio" name="socializar" id="socializar4" value="4" checked>
                @else
                    <input class="form-check-input" type="radio" name="socializar" id="socializar4" value="4">
                @endif
                <label class="form-check-label" for="socializar4">
                    Nunca
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>32. ¿Tiene contacto frecuente con familiares o amigos?</p>
            <div class="form-check">
                @if(array_key_exists("amistades", $perfil) &&  $perfil["amistades"] == "1")
                    <input class="form-check-input" type="radio" name="amistades" id="amistades1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="amistades" id="amistades1" value="1">
                @endif
                <label class="form-check-label" for="amistades1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("amistades", $perfil) &&  $perfil["amistades"] == "2")
                    <input class="form-check-input" type="radio" name="amistades" id="amistades2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="amistades" id="amistades2" value="2">
                @endif
                <label class="form-check-label" for="amistades2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>33. ¿Ha perdido interés en interactuar con otras personas?</p>
            <div class="form-check">
                @if(array_key_exists("interactuar", $perfil) &&  $perfil["interactuar"] == "1")
                    <input class="form-check-input" type="radio" name="interactuar" id="interactuar1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="interactuar" id="interactuar1" value="1">
                @endif
                <label class="form-check-label" for="interactuar1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("interactuar", $perfil) &&  $perfil["interactuar"] == "2")
                    <input class="form-check-input" type="radio" name="interactuar" id="interactuar2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="interactuar" id="interactuar2" value="2">
                @endif
                <label class="form-check-label" for="interactuar2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>34. ¿Se siente solo/a la mayor parte del tiempo?</p>
            <div class="form-check">
                @if(array_key_exists("soledad", $perfil) &&  $perfil["soledad"] == "1")
                    <input class="form-check-input" type="radio" name="soledad" id="soledad1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="soledad" id="soledad1" value="1">
                @endif
                <label class="form-check-label" for="soledad1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("soledad", $perfil) &&  $perfil["soledad"] == "2")
                    <input class="form-check-input" type="radio" name="soledad" id="soledad2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="soledad" id="soledad2" value="2">
                @endif
                <label class="form-check-label" for="soledad2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>35. ¿Tiene dificultades para realizar actividades diarias como vestirse, bañarse o cocinar?</p>
            <div class="form-check">
                @if(array_key_exists("actividadesdiarias", $perfil) &&  $perfil["actividadesdiarias"] == "1")
                    <input class="form-check-input" type="radio" name="actividadesdiarias" id="actividadesdiarias1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadesdiarias" id="actividadesdiarias1" value="1">
                @endif
                <label class="form-check-label" for="actividadesdiarias1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("actividadesdiarias", $perfil) &&  $perfil["actividadesdiarias"] == "2")
                    <input class="form-check-input" type="radio" name="actividadesdiarias" id="actividadesdiarias2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="actividadesdiarias" id="actividadesdiarias2" value="2">
                @endif
                <label class="form-check-label" for="actividadesdiarias2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>

<h3 class="col-md-12">VII. Sueño, hábitos y salud física</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>36. ¿Cuántas horas duerme en promedio por noche?</p>
            <div class="form-check">
                @if(array_key_exists("horassueno", $perfil) &&  $perfil["horassueno"] == "1")
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno1" value="1">
                @endif
                <label class="form-check-label" for="horassueno1">
                    Menos de 5 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horassueno", $perfil) &&  $perfil["horassueno"] == "2")
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno2" value="2">
                @endif
                <label class="form-check-label" for="horassueno2">
                    Entre 5 y 7 horas
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("horassueno", $perfil) &&  $perfil["horassueno"] == "3")
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="horassueno" id="horassueno3" value="3">
                @endif
                <label class="form-check-label" for="horassueno3">
                    Más de 7 horas
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>37. ¿Duerme bien o tiene despertares frecuentes?</p>
            <div class="form-check">
                @if(array_key_exists("despertares", $perfil) &&  $perfil["despertares"] == "1")
                    <input class="form-check-input" type="radio" name="despertares" id="despertares1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="despertares" id="despertares1" value="1">
                @endif
                <label class="form-check-label" for="despertares1">
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
                    Tiene despertares frecuentes
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("despertares", $perfil) &&  $perfil["despertares"] == "3")
                    <input class="form-check-input" type="radio" name="despertares" id="despertares3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="despertares" id="despertares3" value="3">
                @endif
                <label class="form-check-label" for="despertares3">
                    Pesadillas constantes
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>38. ¿Se siente cansado/a o sin energía durante el día?</p>
            <div class="form-check">
                @if(array_key_exists("cansansio", $perfil) &&  $perfil["cansansio"] == "1")
                    <input class="form-check-input" type="radio" name="cansansio" id="cansansio1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="cansansio" id="cansansio1" value="1">
                @endif
                <label class="form-check-label" for="cansansio1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("cansansio", $perfil) &&  $perfil["cansansio"] == "2")
                    <input class="form-check-input" type="radio" name="cansansio" id="cansansio2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="cansansio" id="cansansio2" value="2">
                @endif
                <label class="form-check-label" for="cansansio2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>39. ¿Ha perdido peso sin razón aparente en los últimos meseso?</p>
            <div class="form-check">
                @if(array_key_exists("perdidapeso", $perfil) &&  $perfil["perdidapeso"] == "1")
                    <input class="form-check-input" type="radio" name="perdidapeso" id="perdidapeso1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="perdidapeso" id="perdidapeso1" value="1">
                @endif
                <label class="form-check-label" for="perdidapeso1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("perdidapeso", $perfil) &&  $perfil["perdidapeso"] == "2")
                    <input class="form-check-input" type="radio" name="perdidapeso" id="perdidapeso2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="perdidapeso" id="perdidapeso2" value="2">
                @endif
                <label class="form-check-label" for="perdidapeso2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>40. ¿Realiza actividad física regularmente?</p>
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
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>41. ¿Cuántas horas al día usa pantallas (TV, celular, computadora)?</p>
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
</ul>
<h3 class="col-md-12">VIII. Consumo de sustancias y conductas de riesgo</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>42. ¿Consume alcohol?</p>
            <div class="form-check">
                @if(array_key_exists("alcohol", $perfil) &&  $perfil["alcohol"] == "1")
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol1" value="1">
                @endif
                <label class="form-check-label" for="alcohol1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("alcohol", $perfil) &&  $perfil["alcohol"] == "2")
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol2" value="2">
                @endif
                <label class="form-check-label" for="alcohol2">
                    Ocasionalmente
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("alcohol", $perfil) &&  $perfil["alcohol"] == "3")
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol3" value="3" checked>
                @else
                    <input class="form-check-input" type="radio" name="alcohol" id="alcohol3" value="3">
                @endif
                <label class="form-check-label" for="alcohol3">
                    Frecuentemente
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>43. ¿Fuma o ha fumado en los últimos meses?</p>
            <div class="form-check">
                @if(array_key_exists("fuma", $perfil) &&  $perfil["fuma"] == "1")
                    <input class="form-check-input" type="radio" name="fuma" id="fuma1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="fuma" id="fuma1" value="1">
                @endif
                <label class="form-check-label" for="fuma1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("fuma", $perfil) &&  $perfil["fuma"] == "2")
                    <input class="form-check-input" type="radio" name="fuma" id="fuma2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="fuma" id="fuma2" value="2">
                @endif
                <label class="form-check-label" for="fuma2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>44. ¿Ha sufrido caídas frecuentes en el último año?</p>
            <div class="form-check">
                @if(array_key_exists("caidas", $perfil) &&  $perfil["caidas"] == "1")
                    <input class="form-check-input" type="radio" name="caidas" id="caidas1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="caidas" id="caidas1" value="1">
                @endif
                <label class="form-check-label" for="caidas1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("caidas", $perfil) &&  $perfil["caidas"] == "2")
                    <input class="form-check-input" type="radio" name="caidas" id="caidas2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="caidas" id="caidas2" value="2">
                @endif
                <label class="form-check-label" for="caidas2">
                    Si
                </label>
            </div>
        </div>
    </li>
    <li class="list-group-item">
        <div class="col-md-6 col-sm-12">
            <p>45. ¿Ha tenido dificultades para caminar o mantener el equilibrio?</p>
            <div class="form-check">
                @if(array_key_exists("equilibrio", $perfil) &&  $perfil["equilibrio"] == "1")
                    <input class="form-check-input" type="radio" name="equilibrio" id="equilibrio1" value="1" checked>
                @else
                    <input class="form-check-input" type="radio" name="equilibrio" id="equilibrio1" value="1">
                @endif
                <label class="form-check-label" for="equilibrio1">
                    No
                </label>
            </div>
            <div class="form-check">
                @if(array_key_exists("equilibrio", $perfil) &&  $perfil["equilibrio"] == "2")
                    <input class="form-check-input" type="radio" name="equilibrio" id="equilibrio2" value="2" checked>
                @else
                    <input class="form-check-input" type="radio" name="equilibrio" id="equilibrio2" value="2">
                @endif
                <label class="form-check-label" for="equilibrio2">
                    Si
                </label>
            </div>
        </div>
    </li>
</ul>
<h3 class="col-md-12">IX. Observaciones adicionales</h3>
<div class="mb-3 col-md-12 col-sm-12">
    <label for="extra" class="form-label">(Escriba cualquier otro dato que considere importante sobre su situación actual)</label>
    <textarea class="form-control" type="text" id="extra" name="extra" rows="3">{{$perfil["extra"]??null}}</textarea>
</div>
