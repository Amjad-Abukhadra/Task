<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-active">
            <th scope="row">{{ auth()->user()->name ?? 'Guest' }}</th>
            <td> {{auth()->user()->email ?? 'Guest'}}</td>
          </tr>
        </tbody>
      </table>

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Pass mark</th>
            <th scope="col">Obtain mark</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-active">
            <th scope="row">calculas</th>
            <td> 40</td>
            <td> 80</td>
          </tr>
        </tbody>
      </table>
</body>
</html>