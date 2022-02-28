@extends('layouts.argon')
@section('content')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="t-comment">Comentarios</h3>
            </div>
            <div class="card-body" id="Comment" >
                @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
            @foreach($comentarios as $comment)
                <div class="c-comentarios" >
                <span>{{$comment->nombre.' | '. \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                <p>{{$comment->descripcion}}</p>
                <a  id="btn-eliminar-comment" href="{{route('delete.comment',['id' => $comment->id ])}}" onclick="return confirm('¿esta seguro de eliminar este registro?')">Eliminar</a>
                </div>

            @endforeach
          </div>
        </div>
      </div>
      </div>
      </div>
      <!-- Footer -->
    </div>
    <div class="clearfix">
            {{$comentarios->links()}}
    </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @endsection
  @push('script')
  <script>
    $('#btn-eliminar').submit(function(e){
        e.preventDefault();
    })


    //         Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //         if (result.isConfirmed) {
    //             Swal.fire(
    //             'Deleted!',
    //             'Your file has been deleted.',
    //             'success'
    //             )
    //         }
    //         })
    //   })
  </script>

<script>
    var ruta =document.querySelector("[name=route]").value;
    var apiComentario = ruta + '/comentariosApi';

  </script>
  @endpush
  <input type="hidden" name="route" value="{{url('/')}}">


