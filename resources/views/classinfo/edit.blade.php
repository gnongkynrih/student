<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h3>Insert Class Info</h3>
  <form method="POST" action="{{route('classinfo.update',$classInfo->id)}}">
    @csrf
    @method('PUT')
    <div>
      <label for="">Class Name</label>
      <input type="text" value="{{ $classInfo->name}}" name="name" placeholder="Class Name">
    </div>
    <input type="submit" value="Submit">
  </form>
</body>
</html>