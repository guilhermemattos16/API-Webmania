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
                            <form role="form" action="{{route('exibirConsulta')}}" method="post">
                                @csrf
                                <div class="card-body"> 
                                    <div class="form-group">
                                        <label for="uuid">UUID</label>
                                        <input class="form-control" name="uuid" type="text">
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