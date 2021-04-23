<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        /* Center tables for demo */
        table {
            margin: 0 ;
        }

        /* Default Table Style */
        table {
            color: #333;
            background: white;
            border: 1px solid grey;
            font-size: 16pt;
            border-collapse: collapse;
        }
        table thead th,
        table tfoot th {
            color: #777;
            background: rgba(0,0,0,.1);
        }
        table caption {
            padding:.5em;
        }
        table th,
        table td {
            padding: .5em;
            border: 1px solid lightgrey;
        }
    </style>
</head>
<body>
<div class="p-2 m-2">

</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">number of tweets</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tweets_count}}</td>
        </tr>
    @endforeach
    </tbody>


</table>
<div class="border-2 p-2 m-2">
    <h3> Tweets avg : <span>{{$tweetsAvg}}</span> Per user</h3>
</div>
</body>
</html>
