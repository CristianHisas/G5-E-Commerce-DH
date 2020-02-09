
    @include('inc.head')
    @include('inc.headerAdm')


    <main class="container">
        <h1>Alta de una categoria</h1>

        <form action="agregarCategoria" method="post">
        @csrf
            Categoria:
            <br>
            <input type="text" name="categoria" class="form-control" value="{{old("categoria")}}" required>
            <ul style= color:red>
              @foreach ($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
            <br>
            <input type="submit" value="Agregar Categoria" class="btn btn-secondary">
            <a href="abmCategoria" class="btn btn-light">Volver a admin de categorias</a>

        </form>

    </main>

@include('inc.footer')
