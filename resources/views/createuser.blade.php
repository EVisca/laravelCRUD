@extends('includes.master')

@section('content')

    @include('includes.validation')


   


{{--Formulário rudimentar sem style algum para a criação de um usuário tendo em vista os campos criados
    para o mesmo dentre aqueles presentes no table em phpMyAdmin. --}}

    <form method = "post" action = "{{route('createuser')}}">

        @csrf {{--Serve como um failsafe em caso de uso de má fé em caso de reenvio do dados --}}

        <input type = "text"  name = "fname" placeholder="First Name" value="{{old('fname')}}" > <br />

        <input type = "text"  name = "lname" placeholder="Last Name" value="{{old('lname')}}"> <br />

        <input type = "email"  name = "email" placeholder="Email" value="{{old('email')}}"> <br />

        <input type = "password"  name = "password" placeholder="Password"  value="{{old('password')}}" > <br />

        <textarea name = "notes" placeholder="Notes" {{old('notes') }}></textarea> <br />

        <button type="submit"> Create User </button>

    </form>

@endsection




@section('scripts')

<script>

</script>

@endsection

