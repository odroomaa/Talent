@extends('layouts.master')

@section('content')
    <h3>MAKE A POST</h3>
    <a style="margin-left: 500px " href="/logout" onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();"><u> Logout</u></a>
    <form id="logout-form" action="/logout" method="POST">
        @csrf
    </form>
    </div>
    <br><br>
    {{$errors}}
    <form action="posts" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Example: Fine Art"><br><br>
    <input type="file" name="post" placeholder="upload your image or video"><br><br>
    <input class="rectangle" type="text" name="description" placeholder="Example: In this art I used three pencils..."><br><br>
    <button class="btn btn btn-success" type="submit">Save</button>

    </form>  
@endsection


