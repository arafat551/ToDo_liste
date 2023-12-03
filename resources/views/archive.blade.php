@extends('layouts.app')

@section('content')
<div class="container">

<h3 style="text-align:center;text-decoration:underline;font-family:'Times New Roman', Times, serif">Liste des tâches Archivées</h3>
   <div class="The_card mt-5">
   <div class="row">
      @foreach( $tache as $ta)
      <div class="col">

   <div class="card mb-3" style="width: 18rem;">
  <div class="card-body">
    <p class="bg-danger text-light"># Tâche</p>
    @if($ta ->updated_at > $ta->date_fin)
        <p><i class="fa fa-circle text-success" aria-hidden="true"></i></p>
        @else
        <p><i class="fa fa-circle text-danger" aria-hidden="true"></i></p>
          @endif
    <h5 class="card-title">{{$ta->titre}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Titre de la tâche</h6>
    <p class="card-text">{{$ta->text}}</p>
   
    <div class="row">
        <div class="mb-3 card-text">
      </button>
      </div>
    
      

   <div class="col-3 me-5" style="margin-left: 10%;">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ta->id}}">
  Visusaliser

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$ta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$ta->id}}" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Visualisation</h1>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card border shadow">
        <table class="table table-striped">
         <thead style="text-align: center;">
            <th>Titre</th>
            <th>Contenu</th>
            <th>Pourcentage</th>
            <th>Statut</th>
            <th>Date de début</th>
            <th>Date de fin</th>

         </thead>
         <tr>
            <td>{{$ta->titre}} :</td>
            <td>{{$ta->text}}</td>
           <form method="POST" action="/home/{{$ta->id}}">
            @method('PUT')
            @csrf
           <td> <input type="hidden" value="{{$ta->barre}}" name="barre" class="me-2"><b style="font-size: x-large;">{{$ta->barre}}%</b>
           </form> 
          </td>
          <td>
            @if($ta->status == 0)
            <p class="badge bg-secondary" style="font-weight: lighter;">Pas commencé</p>
            @else
            <p class="badge bg-success" style="font-weight: lighter;">Termier</p>

            @endif
            </form>
          </td>
          </div>
          <td>{{ \Carbon\Carbon::parse($ta->date_debut)->format('d-m-Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($ta->date_fin)->format('d-m-Y') }}</td>
         </tr>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   </div>
   <div class="col">
   <div class="col-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal3{{$ta->id}}">
  Modification
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal3{{$ta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel3{{$ta->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/home/{{$ta->id}}">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label class="form-label">Titre de la tâche</label>
            <input type="text" name="titre" class="form-control" placeholder="Entrez un titre" value="{{$ta->titre}}" required>
            </div>
            <div class="mb-3">
            <label class="form-label">Description de la tâche</label>
              <textarea name="text" cols="30" rows="5" class="form-control" value="{{$ta->text}}">{{$ta->text}}</textarea>
            </div>
            <div class="row mb-3">
              <div class="col">
              <label class="form-selecte">Modifier la barre de progression</label>
            <input type="range" value="{{$ta->barre}}" name="barre" class="me-2"><b style="font-size: x-large;">{{$ta->barre}}%</b>
              </div>

              <div class="col">
              <div class="mb-3">
            <label class="form-label">Modifier le statut de la tâche</label>
            <select name="status" class="form-control">
            @if($ta->status == 0)
            <option value="0" selected><p class="badge bg-secondary">Pas commencé</p></option>
            <option value="1"><p class="badge bg-success">Terminer</p></option>
            @else
            <option value="1" selected><p class="badge bg-success">Terminer</p></option>
            <option value="0"><p class="badge bg-secondary">Pas commencé</p></option>
            @endif
           </select>
              </div>

            </div>
           
  
            </div>
            <div class="mb-3">
            <div class="row mb-3">
            <div class="col">
              <label class="form-label">Date de début</label>
             <input type="date" name="date_debut" class="form-control" value="{{$ta->date_debut}}">
             </div>

            <div class="col">
            <label  class="form-label">Date de fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{$ta->date_fin}}">
            </div>
            </div>
            <div class="mb-3">
            <button type="submit" class="btn btn-success">Modifier</button>
            </div> 
           </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   </div>
   </div>
   </div>
         </div>
  </div>
  </div>
</div>
@endforeach
   </div>

</div>
<style>
    .card-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    td{
      text-align: center;
    }
</style>
@endsection
