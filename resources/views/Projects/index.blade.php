<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project systeem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Projecten</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Project</th>
            <th>Titel</th>
            <th>Beschrijving</th>
            <th>Afbeelding</th>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td><img src="{{ $project->image }}" alt="Project Image" width=100px><td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html> 