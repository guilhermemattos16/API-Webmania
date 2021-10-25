@extends('adminlte::page')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pedidos</h1>
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
                    <th>Presenca</th>
                    <th>Modalidade Frete</th>
                    <th>Frete</th>
                    <th>Desconto</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pedidos as $pedido)
                  <tr>
                    <td>{{$pedido->presenca}}</td>
                    <td>{{$pedido->modalidade_frete}}</td>
                    <td>{{$pedido->frete}}</td>
                    <td>{{$pedido->desconto}}</td>
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