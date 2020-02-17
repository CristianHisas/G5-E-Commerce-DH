

    @include('inc.head')
    @include('inc.headerAdm')


    <main class="container">
        <h1> Actualizacion de una Categoria</h1>
        <form action="{{url('cuenta/admin/modificarCategoria')}}" method="post">
        @csrf
            Categoria:
             <input type="hidden" name="id_categoria" value= {{$Categoria->id_categoria}}>
            <br>
            <input type="text" name="categoria" value= {{$Categoria->categoria}} class="form-control" required>
            <ul style= color:red>
              @foreach ($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
            <br>
            <input type="submit" value="Modificar Categoria" class="btn btn-secondary">
            <a href="{{url('cuenta/admin/abmCategoria')}}" class="btn btn-light">Volver a admin de categorias</a>

        </form>

    </main>

@include('inc.footer')
