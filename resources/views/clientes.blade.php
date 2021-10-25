@extends('adminlte::page')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
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
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>UF</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($clientes as $cliente)
                  <tr>
                    <td>{{$cliente->nome_completo}}</td>
                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->cidade}}</td>
                    <td>{{$cliente->bairro}}</td>
                    <td>{{$cliente->uf}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection