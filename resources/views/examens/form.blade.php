@csrf
     <div class="form-group">
    <label for="type_examen_id">Type Examen:</label> 
    <select name="type_examen_id" id="type_examen_id" class="form-control" >

        @foreach ($type_examens as $type_examen)
          <option value="{{$type_examen->id}}">{{$type_examen->nom}}</option> 
                 @endforeach
    </select>
    <div> {{ $errors->first('type_examen') }} </div>
</div> 


<div class="form-group">
    <label for="reference">Reference:</label>
    <input type="text" name="reference" id="reference" value="{{ old('reference') ?? $examen->reference }}" placeholder="references" class="form-control">
    <div> {{ $errors->first('reference') }} </div>
</div>

<div class="form-group">
    <label for="resultats">Resultats:</label>
    <input type="text" name="resultats" id="resultats" value="{{ old('resultats') ?? $examen->resultats }}" placeholder="Resultats" class="form-control">
    <div> {{ $errors->first('resultats') }} </div>
</div>

<div class="form-group">
    <label for="conclusion">conclusion:</label>
    <input type="text" name="conclusion" id="conclusion" value="{{ old('conclusion') ?? $examen->conclusion }}" placeholder="conclusion" class="form-control">
    <div> {{ $errors->first('conclusion') }} </div>

</div>
<br> 


<input type="hidden" name="patient_id" value="{{$examen->patient_id}}"> 




