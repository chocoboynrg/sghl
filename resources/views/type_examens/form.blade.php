@csrf
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') ?? $type_examen->nom }}" placeholder="saisissez le nom" class="form-control" >
        <div> {{ $errors->first('nom') }} </div>
    </div>
    <div class="form-group">
        <label for="prix">prix:</label>
        <input type="text" name="prix" id="prix" value="{{ old('prix') ?? $type_examen->prix }}" placeholder="saisissez le prix" class="form-control">
        <div> {{ $errors->first('prix') }} </div>
    </div>
    <div class="form-group">
        <label for="norme">Norme:</label>
        <input type="text" name="norme" id="norme" value="{{ old('norme') ?? $type_examen->norme }}" placeholder="saisissez la norme" class="form-control">
        <div> {{ $errors->first('norme') }} </div>
    </div>
