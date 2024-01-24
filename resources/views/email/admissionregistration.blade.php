<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <p class="text-danger"> Parent</p>
  Thank you for registering. Kindly click on the link below to verify your email

  <a target="_blank" href="http://localhost:8000/registration/verification/{{$data['token']}}/{{$data['email']}}">
    http://localhost:8000/registration/verification/{{$data['token']}}/{{$data['email']}}
  </a>
</body>
</html>