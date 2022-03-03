<?php

namespace App\Http\Controllers;



use App\Models\User; //once again had to specify the actual path instead from the one given to
use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
//listagem de use pra cima daqui deram certo a atualização de dados
//use App\Controllers\UpdateUser; 
//use App\Http\Requests\UpdateUser;

//grab the Users out of their model at the phpMyAdmin database
//use App\User;


class UserController extends Controller
{
    //IV.5 - Usando showUsers($id)

    public function showUser($id)
    {

        $user = User::findOrFail($id);

        return view('home', compact('user'));
    }

   public function showUsers() {
       // dd('hello');
       // return view('home');

    // III 
    /*
       $hello = 'hello, how are you?';
       return view('home', compact('hello'));
    */
/*
    //IV - Buscar os dados de usuários cadastrados na database
    //para ter algum dado em 1º lugar, foi inserido no phpMyAdmin um usuário com
    //nome, sobrenome, email e notes
    $users = User::get();
    dd($users);
    return view('home', compact('users'));
    */
        /*
    //IV.2 - Buscar os dados de usuários cadastrados na database
    $users = User::get();
   // dd($users); //compactando e mandando direto no home.blade.php
    return view('home', compact('users'));
    */
        /*
    //IV.3 - Buscar os dados de um usuário em particular usando algum parametro
   $user = User::where('email','naoarthur@naoemail.com')->first();
   //irá usar o Model de User e então procurar pelo primeiro (first) usuário encontrado
   //  com o email listado. No caso, o conteudo exato inserido para o "campo" em questão do Model

    return view('home', compact('user'));
    */
    /*
    //IV.4 - Mesmo que o anterior, mas usando o seu id único 
    // $user = User::find(1);
   $user = User::findorFail(1); //esperava-se que retornasse vazio o view, e assim o foi. O usuário
                         // cadastrado foi inserido com id = NULL
   // dd($user); //com esse dd agora tem-se o usuário listado

    //Comentando o dd acima e voltando novamente no home.blade.php para exibir o fname lname do
    //usuário encontrado. => Perfeito, output esperado conforme descrito
   
    //usando o find() acima para procurar por algum usuário que não existe, resulta em erro 
    // - usando find(10) por exemplo. Para evitar esse erro, substitui-se o find por
    //findOrFail() => página responde em tela de 404 ao invés de um erro propriamento dito, 
    //pois para usuário 10 - que não existe - não há o que ser encontrado, 
    //enquanto que para id 1 o nome é buscado e exibido com sucesso
    

    return view('home', compact('user'));   
    */
    
    
        //IV.5- Buscar dados de usuários que atendam a algum parametro inserido, se existir
    //No caso, só há 1 nome inserido logo para o dito nome apenas ele irá aparecer, mas em caso
    //de multipla ocorrencia, todos seriam exibidos
   $user = User::where('fname','Arthur')->get();
   //resposta foi a de uma coleção na qual continha o usuário com o nome inserido

   //Novo usuário com mesmo fname inserido para averiguar
   //Perfeito, agora os 2 Arthur aparecerão na coleção pois há 2 Arthur a table

   dd($user);
    
   //@foreach no home.blade.php compactando -> sumir com o dd($user);

    return view('home', compact('user'));     
    

   
} 

    public function createUser()
    {
       // dd('test'); Checando se o caminho da route está OK -> OK
       return view('createuser');
    }

    //public function saveUser(Request $request)
    public function saveUser(CreateUser $request) //$request pra máquina saber que é o mesmo request do formulário
    {

       // dd('test'); //apareceerá caso a criação de novo usuário e o save de seus dados tenham tido exito => OK

      // dd($request->all()); //mostra os dados inseridos para o create para cada respectivo campo

      //criação de fato de um novo usuário:

      //II: como pode ocorrer de serem inseridos dados incompletos, pois apenas Notes foi setado como nullable,
      //é preciso validar corretamente cada possível cadastro para evitar ocorrência de erros
    /*movido para CreateUser.php
    $request->validate([

        'fname' => 'required',
        'lname' => 'required',
        'email'=> 'required|email',
        'password' => 'required'

    ]);*/


      $user = new User;
      $user->fname = $request->fname; //cada campo deve coincidir com o mesmo nome usado no <form> no blade.php
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->notes = $request->notes; 

      $user->save();
      //visualmente nada apareceu na pág. após criar um novo usuário, mas atualizando a database o mesmo
      //encontra-se inserido lá com os dados dispostos no formulário 

      return redirect()->back()->with('sucess','User has been added sucessfully.'); 
      //após a criação de um novo usuário, retorna "pra mesma página" com os campos vazios,
      // além de mensagem de sucesso em caso de 'sucess' p/ tal

      //somente após o laço do if no createuser.blade.user que houve a mensagem de sucesso
      //na criação de novo usuário 

      //mudar essa validação para um file próprio



    }


    public function displayUsers() //display every single user in the database
    {

        $users = User::paginate(5);
        return view('users', compact('users'));


    }

    public function viewUser($id)
    {

        $user = User::findOrFail($id);

        return view('viewuser', compact('user'));

    }


    //public function updateUser(UpdateUser $request, $id)
    public function updateUser(UpdateUser $request, $id)
    {

        $user = User::findOrFail($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->notes = $request->notes;

        $user->save();


        return redirect()->back()->with('sucess', 'User has been updated sucessfully.');

    }


    public function deleteUser(Request $request, $id)
    {

        $request->validate([

                
                'userid' => 'required',


        ]);

            if($id == $request->userid)
            {
                $user = User::findOrFail($id);
                $user->delete();
                return redirect('/users');

            }

            return redirect()->back()->with('danger','User cannot be deleted: ID is not the same.');
    }


}
