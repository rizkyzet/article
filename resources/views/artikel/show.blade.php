@extends('layouts.master')

@section('title',$artikel->judul)

@section('content')
<div class="row">
    <div class="col">
        <div class="card ">

            <div class="card-body text-center">
                <h5 class="card-title">{{$artikel->judul}}</h5>
                <p> <small class="text-muted">Last updated {{$artikel->updated_at}}</small> &middot; <small
                        class="text-muted">{{$artikel->created_at->diffForHumans()}}</small></p>
                <p class="card-text">{!! nl2br($artikel->isi)!!}</p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$artikel->slug}}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="{{$artikel->slug}}" tabindex="-1" aria-labelledby="{{$artikel->slug}}Label"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content ">
                            <div class="modal-header d-flex justify-content-center">
                                <h5 class="modal-title" id="{{$artikel->slug}}Label">
                                    Yakin ingin hapus ?
                                </h5>
                            </div>
                            <div class="modal-body text-center">
                                <form class="d-inline" action="{{route('artikel.delete',['artikel'=>$artikel])}}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>



                <a class="btn btn-success w-20 " href="">Update</a>
            </div>
            <div class="card-footer text-muted">
                <a href="{{route('artikel.index')}}" class="btn btn-primary">&larr; Go back</a>

            </div>
        </div>
    </div>
</div>
@endsection