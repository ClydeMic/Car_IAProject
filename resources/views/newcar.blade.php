<html>
    <head>
        <title></title>
    </head>
    <body>
    @if(Session::has('form_submit'))
          {{session('form_submit')}}
    @endif

    @if(count($errors))
    @foreach ($errors->all as $error)
        <li>{{$error}}</li>
    @endforeach
    @endif


    <form method="POST" action="/car" enctype="multipart/form-data">
        {{ csrf_field() }}
      Make:  <input type="text" required name="make"/><br>
        
      Model: <input type="text" required name="model"/><br>

      Date Produced: <input type="date" required name="produced_on"><br>
      
      <input type="file" name="image"><br>

      <input type="submit" value="Save"/>
    </form>
    </body>
</html>
