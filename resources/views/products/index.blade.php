@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>PRODUCTOS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" name="create" href="{{ route('products.create') }}"> Crear un nuevo producto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Fecha de Modificacion</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->nombre }}</td>
            <td>{{ $product->precio }}</td>
            <td>{{ $product->descripcion }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->idProducto) }}" method="POST">
   
                    <a class="btn btn-info" name="show" href="{{ route('products.show',$product->idProducto) }}">Mostrar</a>
    
                    <a class="btn btn-primary" name="edit" href="{{ route('products.edit',$product->idProducto) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" name="id{{$product->idProducto}}" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
      
@endsection
