<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">


    <style type="text/css">
        td .btn{
            width: 50%;
        }
        td{
            text-align: center;
        }
        
        th{
            text-align: center;
        }
    </style>

    <title>Refrigerantes</title>
  </head>
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>

    

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session('salvo'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('salvo') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        @if(session('cadastrado'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('cadastrado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
            <div class="card">
                <div class="card-header">Refrigerantes</div>
                    <!-- Button trigger modal -->
                    <br>
                    <div class=text-right>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastrarModal">
                                Novo
                            </button>
                        </div>
                    
                    </div>

                    <!-- Inicio Modal Cadastrar -->
                    <div class="modal fade" id="cadastrarModal" tabindex="-1" role="dialog" aria-labelledby="exempleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exempleModalLabel">Cadastrar Refrigerante</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>

                                <form method="POST" action="{{ route('refrigerante.store') }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" required autocomplete="marca" placeholder="Marca">
                                            @error('marca')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="tipo">Tipo</label>
                                                    <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required autocomplete="tipo">
                                                        <option>Pet</option>
                                                        <option>Garrafa</option>
                                                        <option>Lata</option>
                                                    </select>
                                                    @error('tipo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="sabor">Sabor</label>
                                                    <select name="sabor" id="sabor" class="form-control @error('sabor') is-invalid @enderror" required autocomplete="sabor">
                                                        <option>Cola</option>
                                                        <option>Laranja</option>
                                                        <option>Limao</option>
                                                        <option>Uva</option>
                                                        <option>Guarana</option>
                                                    </select>
                                                    @error('sabor')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="litragem">Litragem</label>
                                                    <select name="litragem" id="litragem" class="form-control @error('litragem') is-invalid @enderror" required autocomplete="litragem">
                                                        <option selected>250mL</option>
                                                        <option>600mL</option>
                                                        <option>1L</option>
                                                    </select>
                                                    @error('litragem')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="valor">Valor</label>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend2">R$</span>
                                                        <input type="text" name="valor" onkeyup="maskDinheiro(this);" id="valor" class="form-control @error('valor') is-invalid @enderror" required autocomplete="valor" placeholder="0,00">
                                                        @error('valor')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="quantidade">Quantidade</label>
                                                    <input type="number" min="1" name="quantidade" id="quantidade" class="form-control @error('quantidade') is-invalid @enderror" required autocomplete="quantidade" placeholder="Quantidade">
                                                    @error('quantidade')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                            
                                        </div>
                                                    
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                                            
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Modal Cadastrar -->

                    <!-- Inicio Modal Editar -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exempleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exempleModalLabel">Editar Refrigerante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ (route('refrigerante.update', 'test')) }}" id="editForm">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="refrigerante_id" id="refrigeranteid">
                                        <label for="marca">Marca</label>
                                        <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" required autocomplete="marca" id="marca" placeholder="Marca">
                                        @error('marca')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="tipo">Tipo</label>
                                                <select id="tipo" name="tipo" class="form-control @error('tipo') is-invalid @enderror" required autocomplete="tipo">
                                                    <option>Pet</option>
                                                    <option>Garrafa</option>
                                                    <option>Lata</option>
                                                </select>
                                                @error('tipo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="sabor">Sabor</label>
                                                <select id="sabor" name="sabor" class="form-control @error('sabor') is-invalid @enderror" required autocomplete="sabor">
                                                    <option>Cola</option>
                                                    <option>Laranja</option>
                                                    <option>Limao</option>
                                                    <option>Uva</option>
                                                    <option>Guarana</option>
                                                </select>
                                                @error('sabor')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="litragem">Litragem</label>
                                                <select id="litragem" name="litragem" class="form-control @error('litragem') is-invalid @enderror" required autocomplete="litragem">
                                                    <option>250mL</option>
                                                    <option>600mL</option>
                                                    <option>1L</option>
                                                </select>
                                                @error('litragem')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="valor">Valor</label>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">R$</span>
                                                    <input type="text" name="valor" onkeyup="maskDinheiro(this);" class="form-control @error('valor') is-invalid @enderror" required autocomplete="valor" id="valor" placeholder="0,00">
                                                    @error('valor')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="quantidade">Quantidade</label>
                                                <input type="number" min="1" name="quantidade" class="form-control @error('quantidade') is-invalid @enderror" required autocomplete="quantidade" id="quantidade" placeholder="Quantidade">
                                                @error('quantidade')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                        
                                    </div>
                                    
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Modal Editar -->


                    <!-- Inicio Modal Deletar -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exempleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exempleModalLabel">Deletar Refrigerante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('refrigerante.destroy','test') }}" id="deleteForm">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <input type="hidden" name="refrigerante_id" id="refrigeranteid">
                                    <p>Tem certeza que deseja deletar?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Sim! Deletar</button>
                                </div>
                            </form>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Fim do Modal Deletar -->

                    <br>
                    <form action="{{ route('refrigerante.delete') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table id="datatable" class="table ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Sabor</th>
                                        <th scope="col">Litragem</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($refrigerante as $refrigerantes)
                                    <tr>
                                        <th><input type="checkbox" name="delmulti[]" value="{{ $refrigerantes->id }}"></th>
                                        <td>{{ $refrigerantes->marca }}</td>
                                        <td>{{ $refrigerantes->tipo }}</td>
                                        <td>{{ $refrigerantes->sabor }}</td>
                                        <td>{{ $refrigerantes->litragem }}</td>
                                        <td>{{ $refrigerantes->valor }}</td>
                                        <td>{{ $refrigerantes->quantidade }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success edit" data-id="{{ $refrigerantes->id }}"
                                                                                            data-marca="{{ $refrigerantes->marca }}"
                                                                                            data-tipo="{{ $refrigerantes->tipo }}"
                                                                                            data-sabor="{{ $refrigerantes->sabor }}"
                                                                                            data-litragem="{{ $refrigerantes->litragem }}"
                                                                                            data-valor="{{ $refrigerantes->valor }}"
                                                                                            data-quantidade="{{ $refrigerantes->quantidade }}" data-toggle="modal" data-target="#editModal">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger delete" data-id="{{ $refrigerantes->id }}" data-toggle="modal" data-target="#deleteModal">
                                                Deletar
                                            </button>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> 
                            
                        </div>
                        <br>
                        <div class="text-left">
                            <div class="clo-md-12">
                                <button type="submit" id="multdel" class="btn btn-danger">
                                    Deletar Multiplos
                                </button>
                            </div>
                        </div> 
                        <br>  
                    </form>               
                    

                    </div>
                        
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

                    <script type="text/javascript">

                        $(document).ready(function(){

                            var table = $('#datatable').DataTable();
                        });

                       

                        //Função Editar

                        $('#editModal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget);
                            var id = button.data('id');
                            var marca = button.data('marca');
                            var tipo = button.data('tipo');
                            var sabor = button.data('sabor');
                            var litragem = button.data('litragem');
                            var valor = button.data('valor');
                            var quantidade = button.data('quantidade');

                            var modal = $(this);
                            modal.find('.modal-body #refrigeranteid').val(id);
                            modal.find('.modal-body #marca').val(marca);
                            modal.find('.modal-body #tipo').val(tipo);
                            modal.find('.modal-body #sabor').val(sabor);
                            modal.find('.modal-body #litragem').val(litragem);
                            modal.find('.modal-body #valor').val(valor);
                            modal.find('.modal-body #quantidade').val(quantidade);
                        });

                        // Função Deletar

                        $('#deleteModal').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget);
                            var id = button.data('id');

                            var modal = $(this);
                            modal.find('.modal-body #refrigeranteid').val(id);
                        });

                        // Função para dinheiro

                        function maskDinheiro(i) {
                            var v = i.value.replace(/\D/g,'');
                            v = (v/100).toFixed(2) + '';
                            v = v.replace(".", ",");
                            v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
                            v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
                            i.value = v;
                        }

                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>                        
  </body>
</html>