@extends('site.app')
@section('title', 'Homepage')

@section('content')
    <h2 class="p-3">Produtos em destaque</h2>
    <section class="section-content bg">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    @foreach($featuredProducts as $product)
                        <div class="col-md-4">
                            <figure class="card card-product">
                                @if ($product->images->count() > 0)
                                    <div class="img-wrap padding-y"><img src="{{ $product->images->first()->full }}" alt=""></div>
                                @else
                                    <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                @endif
                                <figcaption class="info-wrap">
                                    <h4 class="title"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                </figcaption>
                                <div class="bottom-wrap">
                                    @if ($product->sale_price != 0)
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                            <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                        </div>
                                    @else
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                        </div>
                                    @endif
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    {{ $featuredProducts->links() }}
@stop

