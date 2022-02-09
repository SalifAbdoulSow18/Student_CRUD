@extends('layouts.master')

@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau etudiant</h3>
    
    <div class="mt-4">
        
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
            
        
        <form method="post" action="{{route('etudiant.ajouter')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Classe</label>
                <select class="form-control">
                    <option value="">Affecter lui une classe</option>
                    @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}"> {{ $classe->libelle }} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('etudiant')}}" class="btn btn-danger">Annuler</a>

        </form>   
    </div>

  </div>

@endSection