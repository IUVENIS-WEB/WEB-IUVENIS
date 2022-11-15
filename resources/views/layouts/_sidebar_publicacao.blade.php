@php
    $user = Auth::user();
    //Todos os itens da sidebar estão dispostos aqui para melhor organização
    $items = [
        [
            'tipo' => 'artigo',
            'route' => route('iuvenis.publicacoes_texto'),
            'icon' => asset('assets/artigo_icon.svg'),
            'text' => 'Textos',
            'condition' => ['organizacao_id', '!=', null],
        ],
        [
            'tipo' => 'Video',
            'route' => route('iuvenis.publicacoes_video'),
            'icon' => asset('assets/video_icon.svg'),
            'text' => 'Vídeos',
            'condition' => ['organizacao_id', '!=', null],
        ],
        [
            'tipo' => 'Evento',
            'route' => route('iuvenis.publicacoes_evento'),
            'icon' => asset('assets/evento_icon.svg'),
            'text' => 'Eventos',
            'condition' => ['organizacao_id', '!=', null],
        ],
        [
            'tipo' => 'tags',
            'route' => route('adm.tags'),
            'icon' => asset('assets/tag.svg'),
            'text' => 'Tags',
            'condition' => ['adm_power', '=', true],
        ],
        [
            'tipo' => 'conta',
            'route' => route('conta.index'),
            'icon' => asset('assets/config_icon.svg'),
            'text' => 'Conta',
            'condition' => ['organizacao_id', '!=', null],
        ],
        [
            'tipo' => 'denuncia',
            'route' => route('adm.denuncias'),
            'icon' => asset('assets/denuncia-icon.svg'),
            'text' => 'Denúncias',
            'condition' => ['adm_power', '=', true],
        ],
    ];
    $matchTipo = false;
@endphp
<div class="sidebar">
    <div class="conteudo-sidebar">
        <div class="perfil">
            <div class="imagem-perfil"><img src=" {{ Storage::url(Auth::user()->foto) }}" alt="foto de perfil">
            </div>
            <h3>{{ Auth::user()->nome }}</h3>
        </div>
        <div class="botoes">
            @foreach ($items as $item)
                @php
                    $matchTipo = $item['tipo'] == $tipo;
                    $hasCondition = isset($item['condition']);
                    $condition = true;
                    if ($hasCondition) {
                        $conditionRules = $item['condition'];
                        switch ($conditionRules[1]) {
                            case '=':
                                $condition = $user[$conditionRules[0]] == $conditionRules[2];
                                break;
                            case '!=':
                                $condition = $user[$conditionRules[0]] != $conditionRules[2];
                                break;
                        }
                    }
                @endphp
                @if ($condition)
                    <a href="{{ $item['route'] }}">
                        <div class="botao {{ $matchTipo ? 'btn-pagina-atual' : '' }}">
                            <img src="{{ $item['icon'] }}" width="25" alt="">
                            <h4>{{ $item['text'] }}</h4>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
