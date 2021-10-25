@extends('adminlte::page')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Consultar Nota Fiscal</h1>
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
                            <form role="form" action="" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="uuid">UUID</label>
                                        <input class="form-control" value="{{$saida->uuid}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">Status</label>
                                        <input class="form-control" value="{{$saida->status}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">Motivo</label>
                                        <input class="form-control" value="{{$saida->motivo}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">NF-e</label>
                                        <input class="form-control" value="{{$saida->nfe}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">Serie</label>
                                        <input class="form-control" value="{{$saida->serie}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">Chave de Acesso</label>
                                        <input class="form-control" value="{{$saida->chave}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">Modelo</label>
                                        <input class="form-control" value="{{$saida->modelo}}" name="uuid" type="text" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="uuid">XML</label>
                                        <input class="form-control" value="{{$saida->xml}}" name="uuid" type="text" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection