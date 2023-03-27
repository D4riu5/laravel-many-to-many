<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New project published</title>

    <style>
        h1{
            color: blue;
        }
        img{
            height: 300px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div>
        <h1>
            New project published!
        </h1>
    
        <ul>
            <li>
                Title: {{ $project->title }}
            </li>
            <li>
                Description:  {!! nl2br($project->description) !!}
            </li>
        </ul>
        
        @if ($project->img)
            <li><img src="{{ asset('storage/' . $project->img) }}" alt="Project image"></li>
        @endif

    </div>
</body>
</html>