<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NotaFiscalController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notas/consultar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pedidos = Pedido::all();
        return view('notas/emitir', compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notaFiscal = NotaFiscal::create([
            'operacao' => $request->operacao,
            'natureza_operacao' => $request->natureza_operacao ,
            'modelo' => $request->modelo ,
            'finalidade' => $request->finalidade ,
            'ambiente' => $request->ambiente ,
            'pedido_id' => $request->pedido_id,
        ]);
        
        //$url_notificacao = route('emitir');

        $pedido = Pedido::find($notaFiscal->pedido_id);
        
        $pedidoProduto = PedidoProduto::find($pedido->id);
        
        //$produto = $pedido->produtos;
        //dd($produto);
        $produtos = Produto::find($pedidoProduto->id);
        
        $cliente = Cliente::find($pedido->cliente_id);
        
        $array = array(
            "ID"=> $notaFiscal->id,
            "operacao"=> $notaFiscal->operacao,
            "natureza_operacao"=> $notaFiscal->natureza_operacao,
            "modelo"=> $notaFiscal->modelo,
            "finalidade"=> $notaFiscal->finalidade,
            "ambiente"=> $notaFiscal->ambiente,
            "cliente"=> [
                "cpf"=> $cliente->cpf,
                "nome_completo"=> $cliente->nome_completo,
                "endereco"=> $cliente->endereco,
                "numero"=> $cliente->numero,
                "bairro"=> $cliente->bairro,
                "cidade"=> $cliente->cidade,
                "uf"=> $cliente->uf,
                "cep"=> "29933-590",
                "telefone"=> $cliente->telefone,
                "email"=> $cliente->email
            ],
            "produtos"=> [
            [
                "nome"=> $produtos->nome,
                "ncm"=> $produtos->ncm,
                "unidade"=> $produtos->unidade,
                "quantidade"=> "1",
                "origem"=> $produtos->origem,
                "subtotal"=> $produtos->valor,
                "total"=> "subtotal",
                "impostos"=> [
                    "icms"=> [
                       "codigo_cfop"=> "5.102",
                       "situacao_tributaria"=> "102"
                    ],
                    "ipi"=> [
                       "situacao_tributaria"=> "99",
                       "codigo_enquadramento"=> 999,
                       "aliquota"=> "0.00"
                    ],
                    "pis"=> [
                       "situacao_tributaria"=> "99",
                       "aliquota"=> "0.00"
                    ],
                    "cofins"=> [
                       "situacao_tributaria"=> "99",
                       "aliquota"=> "0.00"
                    ]
                ],
                "tributos_federais"=> "13.25",
                "tributos_estaduais"=> "8.00"
            ]
            ],
            "pedido"=> [
                "pagamento"=> $pedido->pagamento,
                "presenca"=> $pedido->presenca,
                "modalidade_frete"=> $pedido->modalidade_frete,
                "frete"=> $pedido->frete,
                "desconto"=> $pedido->desconto
            ]
        );
        //dd($array);
        $json = json_encode($array, JSON_PRETTY_PRINT);

        //dd($json);
        //$json = json_encode(array_merge((array) json_decode($notaFiscalJson), (array) json_decode($pedidoJson), (array) json_decode($clienteJson)), JSON_PRETTY_PRINT);
        //dd($json);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://webmaniabr.com/api/1/nfe/emissao/");
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPGET, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Consumer-Key: M4hDAfNkQijWdn8166O1qSd34QFlbrnO',
            'X-Consumer-Secret: bAIg88WKWx8o6pesWHS6HTXGCFtxELsmmsgEHtWhIJYGwBma',
            'X-Access-Token: 2011-aL6I0LvKVKrdsuqYXfyfy4QoDSpbCjkYBbH8YZUUUqp7Mk8D',
            'X-Access-Token-Secret: isDDxhlLfDqBaKhxqD2TFVRiq2pjT517bUZZVMmsJEyZuYjZ',
            'Content-Type: application/json')
        );

        $output = curl_exec($ch);
        curl_close($ch);
        $this -> response['response'] = json_decode($output);
        
        $saida = json_decode($output);
        return view('notas\exibirConsulta', compact('saida'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotaFiscal  $notaFiscal
     * @return \Illuminate\Http\Response
     */
    public function show(NotaFiscal $notaFiscal)
    {
        $json = json_encode( array ("uuid" => "8406a9e1-316b-4ae3-9621-7a2fab2256db") );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://webmaniabr.com/api/1/nfe/consulta/");
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_HTTPGET, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'X-Consumer-Key: M4hDAfNkQijWdn8166O1qSd34QFlbrnO',
            'X-Consumer-Secret: bAIg88WKWx8o6pesWHS6HTXGCFtxELsmmsgEHtWhIJYGwBma',
            'X-Access-Token: 2011-aL6I0LvKVKrdsuqYXfyfy4QoDSpbCjkYBbH8YZUUUqp7Mk8D',
            'X-Access-Token-Secret: isDDxhlLfDqBaKhxqD2TFVRiq2pjT517bUZZVMmsJEyZuYjZ',
            'Content-Type: application/json')
        );

        $output = curl_exec($ch);
        curl_close($ch);
        $this -> response['response'] = json_decode($output);
        $saida = json_decode($output);
        //dd($saida);
        return view('notas\exibirConsulta', compact('saida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaFiscal  $notaFiscal
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaFiscal $notaFiscal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaFiscal  $notaFiscal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaFiscal $notaFiscal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaFiscal  $notaFiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaFiscal $notaFiscal)
    {
        //
    }
}
