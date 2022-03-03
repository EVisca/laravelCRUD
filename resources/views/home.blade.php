@extends('includes.master')

@section('content')

{{--Test--}}

 {{--III--}}

{{--{{$hello}} --}}


{{-- IV.2 --}}

{{--Como é um array, é preciso iterar pelo loop --}}
{{-- retirar os comentários e completar foreach e endforeach com arroba
    foreach($users as $user)

       {{$user->fname}} {{$user->lname}} {{$user->notes}}
       {{--Get feito com sucesso do nome e sobre nome de usuário no database
        . No caso, como só havia 1 o único usuário teve seu nome acessado 
        Notes também acessado com sucesso--}}

   {{-- endforeach  
    --}}


{{-- IV.3 --}}

    {{-- {{$user}} : Buscou toda a row para o 1º usuário encontrado com o dado e mostrou a row com seus dados todos--}}

     {{-- {{$user->fname}} {{$user->lname}}: Buscou o 1º usuário com o email dado de parametro
                                        e retornou APENAS o seu nome e sobrenome para dito usuário
                                        Reaproveitar esse comando para o IV.4 junto da sua descrição
                                        em UserController.php--}}




 {{$user->fname}} {{$user->lname}}


@endsection




@section('scripts')

<script>

</script>

@endsection

