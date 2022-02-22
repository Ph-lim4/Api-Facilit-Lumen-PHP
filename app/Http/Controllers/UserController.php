<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Instância de um objeto da classe Request
     * 
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Cria uma nova instância do controller.
     *
     * @param \Illuminate\Http\Request $req
     * @return void
     */
    public function __construct(Request $req, JWTAuth $jwt)
    {
        $this->request = $req;
        // $this->middleware('auth:api');
       
        // echo "<script>console.log('Debug Objects: " .  Auth::guard('api')->check() . "' );</script>";
        
    }

    /**
     * Retorna dados de um usuário em específico.
     * 
     * @param int $id
     * @return mixed
     */

    public function showAllUsers()
    {
        return response()->json(User::all()); //retorna usuarios do banco
    }
    public function createUser(Request $request)
    {
        //validacao
        $this->validate($request, [
            'name' => 'required|min:5|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',


        ]);
        //Inserindo um Usuario
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->cpf = $request->cpf;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->photo_profile = $request->photo_profile;


        //precisa salvar o registro no banco
        $user->save();

        //Gera token do registro
        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user['token'] = $this->respondWithToken($token);

        //Retorna os dados
        return response()->json($user);
    }

    public function readUser($id)
    {
        return response()->json(User::find($id));
    }

    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->cpf = $request->cpf;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        

        $imagem = $this->request->file('photo_profile');
        if (!empty($imagem)) {
            $nome_imagem = 'image-u' . $id . '-' . time() . '.' . $imagem->getClientOriginalExtension();
            // Ver: https://wallacemaxters.com.br/blog/2021/02/21/como-corrigir-o-erro-flysystem-adapter-local-no-lumen
            $imagem->storeAs('public/profile', $nome_imagem);
            $user->photo_profile = $nome_imagem;

        }

        //utilizar função de save novamente
        $user->save();
        return response()->json($user);

        
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->delete();
        return response()->json('Deletado com Sucesso', 200); 
        
    }

    public function loginUser(Request $request)
    {
        // validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function showAuthenticatedUser()
    {
        $user = Auth::user();

        return response()->json($user);
    }

    public function logoutUser()
    {
        Auth::logout();

        return response()->json("Usuario deslogou com sucesso");
    }
}
