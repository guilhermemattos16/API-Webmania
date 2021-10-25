@extends('adminlte::page')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produtos</h1>
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
                    <th>NCM</th>
                    <th>Unidade</th>
                    <th>Origem</th>
                    <th>Valor</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td>{{$product->nome}}</td>
                    <td>{{$product->ncm}}</td>
                    <td>{{$product->unidade}}</td>
                    <td>{{$product->origem}}</td>
                    <td>{{$product->valor}}</td>
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