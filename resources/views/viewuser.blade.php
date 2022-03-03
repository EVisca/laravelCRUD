@extends('includes.master')

@section('content')




    <h1> {{$user->fname}} {{$user->lname}} </h1>

    {{--Maior problema é desvendar esse route--}}
    {{-- <form method = "post" action = "{{route('updateuser')}}">--}}  
    <form method = "post" action = {{route('updateuser', ['id' => $user->id])}}>

            @csrf {{--Serve como um failsafe em caso de uso de má fé em caso de reenvio do dados --}}

            <input type = "text"  name = "fname" placeholder="First Name" value="{{$user->fname}}"><br />

            <input type = "text"  name = "lname" placeholder="Last Name" value="{{$user->lname}}"><br />

            <input type = "email"  name = "email" placeholder="Email" value="{{$user->email}}"><br />

            <input type = "password"  name = "password" placeholder="Password"  value="{{$user->password}}"><br />

            <textarea name = "notes" placeholder="Notes" > {{$user->notes}}</textarea><br />

            <button type="submit"> Save Changes </button>

        </form>

        <br /> <br /> <br /> <br />


        <form action="{{route('deleteuser', $user->id)}}" method="post">

        @csrf

            <input type="text" name="userid" placeholder="Enter User ID">

            <button type = "submit">Delete User</button>

            

        </form>








  
@endsection




@section('scripts')

<script>

</script>

@endsection

