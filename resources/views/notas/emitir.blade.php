@extends('adminlte::page')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Emitir Nota Fiscal</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- form start -->
                            <form role="form" action="{{route('emitir-nota')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="operacao">Operação</label>
                                        <select class="form-control" name="operacao" required>
                                            <option value="0">0 - Entrada</option>
                                            <option value="1">1 - Saída</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="natureza_operacao">Natureza da Operação</label>
                                        <input class="form-control" name="natureza_operacao" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="modelo">Modelo</label>
                                        <select class="form-control" name="modelo" required>
                                            <option value="1">1 - NF-e</option>
                                            <option value="2">2 - NFC-e</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="finalidade">Finalidade</label>
                                        <select class="form-control" name="finalidade" required>
                                            <option value="1">1 - NF-e Normal</option>
                                            <option value="4">4 - Devolução</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ambiente">Ambiente</label>
                                        <select class="form-control" name="ambiente" required>
                                            <option value="1">1 - Produção</option>
                                            <option value="2">2 - Homologação</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pedido">Pedido</label>
                                        <select class="form-control" name="pedido_id" required>
                                            @foreach($pedidos as $pedido)
                                                <option value="{{$pedido->id}}">{{$pedido->id}} - {{App\Models\Cliente::find($pedido->cliente_id)->nome_completo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection