@extends('layouts.app')

@section('content')

<h1> Upload File </h1>


<form action= "upload" method="POST" enctype="multipart/form-data" >
 
    <input type= "file" name = "file"> <br> <br>
    <button type = "submit"> Upload File </button>
    
</form>

@endsection