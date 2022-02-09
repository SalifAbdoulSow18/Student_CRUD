@extends('layouts.master')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Editer un etudiant</h3>
    
    <div class="mt-4">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>    
            
        @endif
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
            
        
        <form method="post" action="{{route('etudiant.update',['etudiant'=>$etudiant->id])}}">
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{$etudiant->nom}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="{{$etudiant->prenom}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Classe</label>
                <select class="form-control" name="classe_id" required>
                    <option value="">Affecter lui une classe</option>
                    @foreach ($classes as $classe)
                    @if ($classe->id == $etudiant->classe_id)
                        <option value="{{ $classe->id }}" selected>{{ $classe->libelle }} </option>
                    @else
                        <option value="{{ $classe->id }}"> {{ $classe->libelle }} </option>
                    @endif 
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('etudiant')}}" class="btn btn-danger">Annuler</a>

        </form>   
    </div>

  </div>

@endSection