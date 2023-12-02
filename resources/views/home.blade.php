@extends('layouts.app')

@section('content')
<div class="container">



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="margin-left: 80%;">
<i class="fa fa-plus" aria-hidden="true"></i>
Ajouter une tâche
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5  text-light" id="exampleModalLabel">Nouvelle tâche</h1>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-12" style=" padding:3%">
   <form method="POST">
      @csrf
    <div class="mb-3">
      <label class="from-label">Titre de la tâche</label>
    <input type="text" name="titre" class="form-control" placeholder="Entrez un titre" required>
    </div>
    <div class="mb-3">
    <label class="from-label">Description de la tâche</label>
      <textarea name="text" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="mb-3">
    <label class="from-label">Pourcentage de la tâche</label>
    <input type="range" max="100" min="0" value="0" name="barre"> 
    </div>
    <button type="submit" class="btn btn-success"> Valider</button>
   </form>
   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<h3 style="text-align:center;text-decoration:underline">Liste des tâches</h3>
   <div class="The_card mt-5">
   <div class="row">
      @foreach( $tache as $ta)
      <div class="col">

   <div class="card mb-3" style="width: 18rem;">
  <div class="card-body">
    <p class="bg-secondary text-light"># Tâche N° {{$ta->id}}</p>
    <h5 class="card-title">{{$ta->titre}}</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Titre de la tâche</h6>
    <p class="card-text">{{$ta->text}}</p>
   
    <div class="row">
        <div class="mb-3 card-text">
      </button>
      </div>
    
      

   <div class="col-3 me-5" style="margin-left: 10%;">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ta->id}}">
  Visusaliser

</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$ta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$ta->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card border shadow">
        <table class="table table-striped">
         <thead style="text-align: center;">
            <th>Titre</th>
            <th>Contenu</th>
            <th>Pourcentage</th>

         </thead>
         <tr>
            <td>{{$ta->titre}} :</td>
            <td>{{$ta->text}}</td>
           <form method="POST" action="/home/{{$ta->id}}">
            @method('PUT')
            @csrf
           <td> <input type="range" value="{{$ta->barre}}" name="barre" class="me-2"><b style="font-size: x-large;">{{$ta->barre}}%</b>
           <button type="submit" class="btn btn-success">Modifier</button>
          
          </td>
           </form> 
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
   <div class="col-3">
   <button class="btn btn-danger">Archiver
</button>
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
