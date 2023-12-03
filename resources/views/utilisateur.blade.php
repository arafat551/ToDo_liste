@extends('layouts.app')
@section('content')
<div class="container">

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 80%;">
    Ajouter un prestataire
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau prestataire</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Entrez un nom pour le prestataire</label>
              <input type="text" name="name" class="form-control" placeholder="Entrez un nom" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Entrez un E-mail pour le prestataire</label>
              <input type="email" name="email" class="form-control" placeholder="Entrez un E-mail" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Entrez un mot de passe pour le prestataire</label>
              <input type="password" name="password" class="form-control" placeholder="Entrez un mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <table class="table table-striped border shadow">
    <thead>
      <th>Nom</th>
      <th>E-mail</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($utilisateur as $u)
      <tr>
        <td>{{$u->name}}</td>
        <td>{{$u->email}}</td>
        <td>
          <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$u->id}}" style="margin-left: 80%;">
            Modification
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal1{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel1{{$u->id}}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel1{{$u->id}}">Modifier un prestataire</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/utilisateur/{{$u->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label class="form-label">Modifier le nom du prestataire</label>
                      <input type="text" name="name" value="{{$u->name}}" class="form-control" placeholder="Entrez un nom" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Modifier l'E-mail pour le prestataire</label>
                      <input type="email" name="email" value="{{$u->email}}" class="form-control" placeholder="Entrez un E-mail" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Modifier le mot de passe pour le prestataire</label>
                      <input type="password" value="{{$u->password}}" name="password" class="form-control" placeholder="Entrez un Mot de passe" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
          <form method="POST" action="/utilisateur/{{$u->id}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection
