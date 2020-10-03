@extends('layouts.master')

@section('title','Ubah Artikel')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">Edit Artikel</h5>
            <div class="card-body">
                <form method="POST" action="{{route('artikel.update',$artikel)}}">
                    @csrf

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" value="{{old('judul',$artikel->judul)}}">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea class="form-control  @error('isi') is-invalid @enderror" name="isi" id="isi" cols="30"
                            rows="10">{{old('isi',$artikel->isi)}}</textarea>
                        @error('isi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection