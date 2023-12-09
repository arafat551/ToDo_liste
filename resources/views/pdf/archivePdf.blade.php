<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;text-decoration:underline">{{ $titre }}</h1>
    <h4> <span style="font-family: 'Courier New', Courier, monospace;"></span> {{ $nom }},</h4>

    <table>
        <thead>
            <th>Titre</th>
            <th>Statut</th>
            <th>Pourcentage</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Date de mise à jour</th>
        </thead>
        <tbody>
            @foreach($tache as $t)
                <tr>
                    <td>{{ $t->titre }}</td>
                    @if($t->status == 1)
                    <td style="background-color: green;">Succès
                @else
                <td style="background-color: red;">En retard
                </td>
                @endif

                    <td>{{ $t->barre }} %</td>
                    <td>{{ $t->date_debut }}</td>
                    <td>{{ $t->date_fin }}</td>
                    <td>{{ $t->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
     table{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
     }
    table, th, td{
        border: 1px solid black;
     }
     th{
        background-color: #f2f2f2;
     }

    </style>
</body>
</html>
