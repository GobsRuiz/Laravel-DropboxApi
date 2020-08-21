<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    img{
        width: 80%;
        height: 300px;

        display: block;

        margin: 0 auto;
    }
</style>
<body>
    <div>
        <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="arquivo">
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <br>
    <br>
    <div>
        <ul>
            @foreach ($allFiles as $file)
                <li>
                    <img src="{{ $file }}" alt="">
                </li>
                <br>
            @endforeach
        </ul>
        <br>
    </div>
</body>
</html>