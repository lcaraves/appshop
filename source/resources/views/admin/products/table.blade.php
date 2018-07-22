<table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="col-md-2 text-center">Nombre</th>
            <th class="col-md-4 text-center">Descripción</th>
            <th>Categoría</th>
            <th class="text-right">Precios</th>
            <th class="text-right">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="text-center">{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->category ? $product->category->name : 'General'}}</td>
            <td class="text-right">&euro; {{$product->price}}</td>
            <td class="td-actions text-right">
                </button>
                <form action=" {{ url('/admin/products/'.$product->id) }} " method="post">
                    <!-- Info -->
                    <a href="" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                        <i class="fa fa-info"></i>
                    </a>
                    <!-- Edit -->
                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <!-- Image -->
                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del Producto" class="btn btn-warning btn-simple btn-xs">
                        <i class="fa fa-image"></i>
                    </a>
                    <!-- Delete -->    
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                        <i class="fa fa-times"></i>
                    </button>
                </form>
               
            </td>
        </tr>
        @endforeach
    </tbody>
</table>