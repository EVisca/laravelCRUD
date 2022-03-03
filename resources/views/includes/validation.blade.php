@if(session()->has('sucess'))

        {{session()->get('sucess')}}

    @endif




    @if(session()->has('danger'))

{{session()->get('danger')}}

@endif






@if($errors->any())
        
     <ul>
         @foreach($errors->all() as $error)

          <li>{{$error}}</li>

         @endforeach
         </ul>
@endif
