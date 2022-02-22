<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
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
    public function __construct(Request $req)
    {
        $this->request = $req;
    }

    /**
     * Retorna dados de um usuário em específico.
     * 
     * @param int $id
     * @return mixed
     */

    //MOSTRAR TODOS--------------------------
    public function showAllShops()
    {
        return response()->json(Shop::all()); //retorna donos do banco
    }
//CADASTRAR------------------------------    
    public function createShop(Request $request)
    {
        //validacao
        $this->validate($request, [
            
            'boss' => 'required',
            'cpf' => 'required|unique:shops,cpf',
            'cnpj' => 'required',
            'name' => 'required|min:5|max:40',
            'shopName' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:shops,email',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'cep' => 'required',
            'state' => 'required',
            'openingTimeOne' => 'required',
            'closingTimeOne' => 'required',
            'photo_profile' => 'required',

        ]);
        //Inserindo um Usuario
        $shop = new Shop;
        $shop->boss = $request->boss;
        $shop->cpf = $request->cpf;
        $shop->cnpj = $request->cnpj;
        $shop->shopName = $request->shopName;
        $shop->name = $request->name;
        $shop->gender = $request->gender;
        $shop->phone = $request->phone;
        $shop->password = Hash::make($request->password);
        $shop->email = $request->email;
        $shop->street = $request->street;
        $shop->number = $request->number;
        $shop->district = $request->district;
        $shop->city = $request->city;
        $shop->cep = $request->cep;
        $shop->state = $request->state;
        $shop->openingTimeOne = $request->openingTimeOne;
        $shop->closingTimeOne = $request->closingTimeOne;
        $shop->openingTimeTwo = $request->openingTimeTwo;
        $shop->closingTimeTwo = $request->closingTimeTwo;
        $shop->photo_profile = $request->photo_profile;
        

        //precisa salvar o registro no banco
        $shop->save();   
        return response()->json($shop);
    }
//MOSTRAR UM -------------------------
    public function readShop($id)
    {
        return response()->json(Shop::find($id));
    }
//ATUALIZAR ----------------------------
    public function updateShop($id, Request $request)
    {
        $shop = Shop::find($id);

        $shop->boss = $request->boss;
        $shop->cpf = $request->cpf;
        $shop->cnpj = $request->cnpj;
        $shop->name = $request->name;
        $shop->gender = $request->gender;
        $shop->phone = $request->phone;
        $shop->password = Hash::make($request->password);
        $shop->email = $request->email;
        $shop->street = $request->street;
        $shop->number = $request->number;
        $shop->district = $request->district;
        $shop->city = $request->city;
        $shop->cep = $request->cep;
        $shop->state = $request->state;
        $shop->openingTimeOne = $request->openingTimeOne;
        $shop->closingTimeOne = $request->closingTimeOne;
        $shop->openingTimeTwo = $request->openingTimeTwo;
        $shop->closingTimeTwo = $request->closingTimeTwo;
        $shop->photo_profile = $request->photo_profile;
        

        //utilizar função de save novamente
        $shop->save();
        return response()->json($shop);
    }
//DELETAR --------------------------
    public function deleteShop($id)
    {
        $shop = Shop::find($id);

        $shop->delete();
        return response()->json('Deletado com Sucesso', 200);
    }
    //
}
    //-----------------------------------
    /*public function getDados(int $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(array("code" => 404, "error" => "Usuário não encontrado!"), 404);
        }

        return response()->json($usuario);

    }

    /**
     * Retorna dados do usuário atualmente autenticado.
     * 
     * @return mixed
     
    public function getDadosUsuarioAtual()
    {
        $usuario = Usuario::find($this->request->authenticated_user->id_usuario);
        if (!$usuario) {
            return response()->json(array("code" => 404, "error" => "Usuário não encontrado!"), 404);
        }

        return response()->json($this->prepararUsuarioResposta($usuario), 200);

    }

    /**
     * Cria um usuário com base nos dados enviados no corpo da requsição
     * 
     * @return mixed
     
    public function criarUsuario()
    {
        $this->validate($this->request, array(
            'nome' => 'required|max:200', 
            'email' => 'required|email|max:255|unique:usuario,email',
            'senha' => 'required',
            'sigla_pais' => 'required',
            'aceita_termos_vigente' => 'required',
            'cpf_cnpj' => 'sometimes|numeric'
        ));
        
        if (!$this->request->input('aceita_termos_vigente')) {
            return response()->json(array(
                'code' => 400,
                'error' => "Usuário não aceitou termos de uso da plataforma."
            ), 400);
        }
        
        $cpf_cnpj = $this->request->input('cpf_cnpj');
        if (!empty($cpf_cnpj) && strlen($cpf_cnpj) > 11 && !$this->validarCnpj($cpf_cnpj)) {
            return response()->json(array(
                'code' => 400,
                'error' => "CNPJ inválido."
            ), 400);
        }
    
        // TODO: Proceder com o envio de e-mail após o cadastro
        $usuario = new Usuario;
        
        $usuario->nome = $this->request->input('nome');
        $usuario->cpf_cnpj = $cpf_cnpj;
        $usuario->email = strtolower($this->request->input('email'));
        $usuario->senha = Hash::make($this->request->input('senha'));
        $usuario->telefone = $this->request->input('telefone');

        $pais = Pais::where('sigla', strtoupper($this->request->input('sigla_pais')))->orderByDesc('id_pais')->first();
        $usuario->fk_pais = $pais->id_pais;
        
        $termosUso = Termos::orderByDesc('id_termos')->first();
        $usuario->fk_termos = $termosUso->id_termos;
        
        $usuario->save();
        $usuario->refresh();
    
        $usuario_resp = $this->prepararUsuarioResposta($usuario);
        $usuario_resp['token'] = JWT::encode(array(
            'iss' => "Akaxa from Moovi Estúdios", # emissor do token
            'sub' => $usuario->id_usuario, # sujeito do token
            'iat' => time(), # hora de emissão
            'exp' => time() + ((60 * 60) * 24) # expira em 1 dia
        ), env('JWT_SECRET'));
        return response()->json($usuario_resp, 201);
    }

    /**
     * Atualiza algumas informações do usuário
     * 
     * @return mixed
     
    public function atualizarUsuario()
    {
        // TODO: Ao atualizar e-mail, enviar e-mail de confirmação e criar
        //       nova rota para proceder com a alteração definitiva.
        
        $this->validate($this->request, array(
            'nome' => 'sometimes|min:2', 
            'email' => 'sometimes|email|unique:usuario,email|max:255',
            'sigla_pais' => 'sometimes|size:2',
            'foto' => 'sometimes|file|image|mimes:jpg,jpeg,png|max:4048',
            'mensagem' => 'sometimes|min:3',
            'cpf_cnpj' => 'sometimes|min:11|max:14'
        ));

        $campos = array();
        $id_usuario = $this->request->authenticated_user->id_usuario;
        
        $nome = $this->request->input('nome');
        if (!empty($nome)) {
            $campos['nome'] = $nome;
        }

        $email = $this->request->input('email');
        if (!empty($email)) {
            $campos['email'] = strtolower($email);
        }

        $sigla_pais = $this->request->input('sigla_pais');
        if (!empty($sigla_pais)) {
            $pais = Pais::where('sigla', strtoupper($sigla_pais))->orderByDesc('id_pais')->first();
            $campos['fk_pais'] = $pais->id_pais;
        }

        $cpf_cnpj = $this->request->input('cpf_cnpj');
        if (!empty($ssn)) {
            $campos['cpf_cnpj'] = $ssn;
        }

        $telefone = $this->request->input('telefone');
        if (!empty($telefone)) {
            $campos['telefone'] = $telefone;
        }

        $imagem = $this->request->file('foto');
        if (!empty($imagem)) {
            $nome_imagem = 'image-u' . $id_usuario . '-' . time() . '.' . $imagem->getClientOriginalExtension();
            // Ver: https://wallacemaxters.com.br/blog/2021/02/21/como-corrigir-o-erro-flysystem-adapter-local-no-lumen
            $imagem->storeAs('public/profile', $nome_imagem);
            $campos['foto'] = $nome_imagem;
        }

        if (!empty($campos)) {
            Usuario::find($id_usuario)->update($campos);
        }
        return response()->json($this->prepararUsuarioResposta(Usuario::find($id_usuario)), 200);
    }

    /**
     * Responsável por criar uma solicitação para o usuário informado
     * no ID.
     * 
     * @param int $id Id do usuário
     * @return mixed
     
    public function solicitarUsuario($id)
    {
        $id_usuario_solicitante = $this->request->authenticated_user->id_usuario;
        if ($id == $id_usuario_solicitante) {
            return response()->json(array(
                'code' => 400,
                'error' => 'Usuário solicitado é o usuário autenticado.'
            ), 400);
        }

        $usuario = Usuario::find($id_usuario_solicitante);
        $usuario_solicitado = Usuario::find($id);

        if (!$usuario_solicitado) {
            return response()->json(array(
                'code' => 404,
                'error' => 'Usuário informado não encontrado'
            ), 404);
        }


        if ($usuario->rede()->where('fk_usuario2', $id)->exists()) {
            return response(null, 204); 
        }
        $usuario->rede()->attach([$usuario_solicitado->id_usuario]);

        // TODO: Enviar notificação ao usuário solicitado...
    
        return response(null, 201);
    }

    /**
     * Atualiza uma solicitação para o estado de confirmado.
     * 
     * @param int $id Id do usuário
     * @return mixed
     
    public function aceitarSolicitacaoUsuario($id)
    {
        $usuario = Usuario::find($id);
        $id_usuario_autenticado = $this->request->authenticated_user->id_usuario;

        if ($usuario->rede()->where('fk_usuario2', $id_usuario_autenticado)->exists()) {
            $usuario->rede()->updateExistingPivot($id_usuario_autenticado, [
                'enviado' => false,
                'confirmado' => true
            ]);
        
            // TODO: Enviar notificação ao usuário solicitante...

            return response(null, 204);
        }
    
        return response(null, 404);
    }

    /**
     * Atualiza uma solicitação para o estado não aceito ou
     * caso o usuário autenticado seja o criador da solicitação,
     * exclui a solicitação enviada por ele.
     * 
     * @param int $id Id do usuário
     * @return mixed
     
    public function desfazerSolicitacaoUsuario($id)
    {
        $usuario = Usuario::find($id);
        $usuario_autenticado = Usuario::find($this->request->authenticated_user->id_usuario);

        // Usuário está negando uma solicitação recebida
        if ($usuario->rede()->where('fk_usuario2', $usuario_autenticado->id_usuario)->exists()) {
            $usuario->rede()->updateExistingPivot($usuario_autenticado->id_usuario, [
                'enviado' => false,
                'confirmado' => true
            ]);
        
            // TODO: Enviar notificação ao usuário solicitante...

            return response(null, 204);
        
        // Usuário está desfazendo uma solicitação enviada por ele
        } else if ($usuario_autenticado->rede()->where('fk_usuario2', $usuario->id_usuario)->exists()) {
            $usuario_autenticado->rede()->detach([$usuario->id_usuario]);

            return response(null, 204);
        }
    
        return response(null, 404);
    }

    /**
     * Retorna uma lista com a rede do usuário autenticado.
     * 
     * @return mixed
     
    public function getRedeUsuario()
    {
        $usuarios_rede = array();
        //$sql = "SELECT u.id_usuario, u.nome, u.email, u.telefone, u.foto, r.confirmado, r.enviado, r.fk_usuario1 as id_usuario_solicitante, r.fk_usuario2 as id_usuario_solicitado from rede r left join usuario u on (u.id_usuario = r.fk_usuario1 OR u.id_usuario = r.fk_usuario2) AND u.id_usuario != 5 ORDER BY r.confirmado ASC, r.fk_usuario2 DESC, r.fk_usuario1 DESC";
        //$resultset = DB::raw($sql, [$this->request->authenticated_user->id_usuario])->get();
        $resultset = DB::table('rede')
                            ->select('id_usuario', 'nome', 'email', 'telefone', 'foto', 'rede.confirmado', 'enviado', 'fk_usuario1 as id_usuario_solicitante', 'fk_usuario2 as id_usuario_solicitado')
                            ->leftJoin('usuario', function($join) {
                                //on 5
                                $join->on('id_usuario', '=', 'fk_usuario1')
                                    ->orOn('id_usuario', '=', 'fk_usuario2')
                                    ->where('id_usuario', '!=', $this->request->authenticated_user->id_usuario);
                            })
                            ->orderBy('confirmado')
                            ->orderBy('fk_usuario2', 'DESC')
                            ->orderBy('fk_usuario1', 'DESC')
                            ->get();
        foreach($resultset as $inst_usuario) {
            $usuarios_rede[] = (object) [
                'id' => $inst_usuario->id_usuario,
                'nome' => $inst_usuario->nome,
                'email' => $inst_usuario->email,
                'telefone' => $inst_usuario->telefone,
                "foto" => $inst_usuario->getURLFoto(),
            ];
        }
        return response()->json($usuarios_rede, 200);
    }

    /**
     * Retorna uma lista de usuários pesquisados por parte do nome ou e-mail
     * 
     * @return mixed
     
    public function getUsuarios()
    {
        $this->validate($this->request, array(
            'nome' => 'sometimes|min:2', 
            'email' => 'sometimes|min:5',
        ));

        $usuarios = Usuario::where([
            ['administrador', '!=', 1],
            ['ativo', '=', 1],
        ]);

        $nome = $this->request->input('nome');
        if (!empty($nome)) {
            $usuarios = $usuarios->where('nome', 'like', '%' . strtoupper($nome) . '%');
        }

        $email = $this->request->input('email');
        if (!empty($email)) {
            $usuarios = $usuarios->where('email', 'like', '%' . strtolower($email) . '%');
        }

        if (!$usuarios->exists()) {
            return response()->json(array(
                'code' => 404,
                'error' => 'Nenhum usuário encontrado com os filtros especificados.'
            ), 404);
        }

        $dados_usuarios = [];
        foreach($usuarios->get() as $usuario) {

            $dados_usuarios[] = array(
                "id" => $usuario->id_usuario,
                "nome" => $usuario->nome,
                "email" => $usuario->email,
                "telefone" => $usuario->telefone,
                "ativo" => $usuario->ativo == 1,
                "confirmado" => $usuario->confirmado == 1,
                "foto" => $usuario->getURLFoto()
            );
        }

        return response()->json($dados_usuarios, 200);
    }

    /**
     * Prepara um objeto de usuário para respostas
     * 
     * @param \App\Models\Usuario $usuario
     * @return array
     
    private function prepararUsuarioResposta($usuario)
    {

        $pais = Pais::find($usuario->fk_pais);
        $termosUso = Termos::find($usuario->fk_termos);

        return array(
            "id" => $usuario->id_usuario,
            "nome" => $usuario->nome,
            "email" => $usuario->email,
            "telefone" => $usuario->telefone,
            "ativo" => $usuario->ativo == 1,
            "confirmado" => $usuario->confirmado == 1,
            "termos_uso_aceito" => array(
                "versao" => $termosUso->versao
            ),
            "pais" => array(
                "sigla" => $pais->sigla,
                "nome" => $pais->nome
            ),
            "ultimo_login" => $usuario->ultimo_login,
            "foto" => $usuario->getURLFoto()
        );
    }

    /**
     * Valida o numero CNPJ
     * @param string|int $cnpj
     * @return bool
     * 
     * @author Guilherme Sehn (https://github.com/guisehn)
     
    function validarCnpj($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;

        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;	

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    } */
