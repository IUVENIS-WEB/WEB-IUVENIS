<div class="featured">
    <h2 id="titulo-featured">{{ $featured_post->titulo }}</h2>
    <div class="featured-bottom">
        <a href="{{ $featured_post->link_evento }}" target="_blank">
            <div class="saiba-mais">Saiba Mais</div>
        </a>
        <div class="detalhes-botao-featured">
            @include('layouts._icon', ['icon' => 'evento_icon.svg', 'height' => '15.48px', 'width' => '13px'])
            <div class="data-featured-botao">{{ date('d/m/Y', strtotime($featured_post->data_evento)) }}
            </div>
        </div>
    </div>
</div>