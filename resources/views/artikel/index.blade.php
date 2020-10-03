@extends('layouts.master')

@section('title','All Artikel')

@section('content')
@if (Session::has('status'))
<div class="alert alert-success" role="alert">
    {!!Session::get('status')!!}
</div>
@endif
<div class="row">
    <div class="col">
        <div class="row">
            <?php $count = 1;
    $skipped = ($artikel->currentPage() * $artikel->perPage()) - $artikel->perPage(); ?>
            @foreach ($artikel as $a)
            <div class="col-md-4 py-3">
                <div class="card h-100">

                    <div class="card-body">
                        <h5 class="card-title">{{$loop->iteration +$skipped}}. {{$a->judul}}</h5>
                        <p class="card-text">{{substr($a->isi,0,100)}} .....</p>

                    </div>
                    <div class="card-footer">

                        <small class="text-secondary">
                            {{$a->created_at->diffForHumans()}}
                            @if (Auth::check())
                            @if (Auth::user()->id == $a->user_id)
                            &middot;
                            Your Post
                            @endif

                            @endif

                        </small>
                        <a href="{{route('artikel.show',['artikel'=>$a])}}" class="btn btn-primary float-right">Lihat
                            &raquo;</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$artikel->links()}}
    </div>
</div>
@endsection