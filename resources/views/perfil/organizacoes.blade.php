    @extends('layouts.publicarLayout')
    @section('title', 'Organizações')
    @section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/lista-organizacoes.css') }}">
    @endsection
    @section('content')
  <?php
  $user = Auth::user()

  ?>
    <div class="conteudo">
            <div class="titulo">
                <div class="titulo-top">
                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="17.5" cy="17.5" r="17.5" fill="#C4C4C4"/>
                        <path d="M12.6125 11C12.6125 12.1036 11.7105 13 10.6 13C9.48953 13 8.5875 12.1036 8.5875 11C8.5875 9.89643 9.48953 9 10.6 9C11.7105 9 12.6125 9.89643 12.6125 11ZM8.3 16.6321C7.94062 17.0322 7.725 17.5643 7.725 18.1429C7.725 18.7214 7.94062 19.2535 8.3 19.6536V16.6321ZM13.4894 14.8714C12.422 15.8107 11.75 17.1857 11.75 18.7143C11.75 19.9393 12.1812 21.0643 12.9 21.9464V22.7143C12.9 23.3464 12.3861 23.8571 11.75 23.8571H9.45C8.8139 23.8571 8.3 23.3464 8.3 22.7143V21.7571C6.94156 21.1143 6 19.7393 6 18.1429C6 15.9321 7.80047 14.1429 10.025 14.1429H11.175C12.0375 14.1429 12.8353 14.4107 13.4894 14.8679V14.8714ZM22.1 22.7143V21.9464C22.8187 21.0643 23.25 19.9393 23.25 18.7143C23.25 17.1857 22.578 15.8107 21.5106 14.8679C22.1647 14.4107 22.9625 14.1429 23.825 14.1429H24.975C27.1995 14.1429 29 15.9321 29 18.1429C29 19.7393 28.0585 21.1143 26.7 21.7571V22.7143C26.7 23.3464 26.1861 23.8571 25.55 23.8571H23.25C22.6139 23.8571 22.1 23.3464 22.1 22.7143ZM26.4125 11C26.4125 12.1036 25.5105 13 24.4 13C23.2895 13 22.3875 12.1036 22.3875 11C22.3875 9.89643 23.2895 9 24.4 9C25.5105 9 26.4125 9.89643 26.4125 11ZM26.7 16.6321V19.6571C27.0594 19.2535 27.275 18.725 27.275 18.1464C27.275 17.5679 27.0594 17.0357 26.7 16.6357V16.6321ZM17.5 13.5714C16.2314 13.5714 15.2 12.5464 15.2 11.2857C15.2 10.025 16.2314 9 17.5 9C18.7686 9 19.8 10.025 19.8 11.2857C19.8 12.5464 18.7686 13.5714 17.5 13.5714ZM14.625 18.7143C14.625 19.2928 14.8406 19.8214 15.2 20.225V17.2036C14.8406 17.6072 14.625 18.1357 14.625 18.7143ZM19.8 17.2036V20.2286C20.1594 19.825 20.375 19.2964 20.375 18.7178C20.375 18.1393 20.1594 17.6072 19.8 17.2072V17.2036ZM22.1 18.7143C22.1 20.3107 21.1585 21.6857 19.8 22.3286V23.8571C19.8 24.4893 19.2861 25 18.65 25H16.35C15.7139 25 15.2 24.4893 15.2 23.8571V22.3286C13.8415 21.6857 12.9 20.3107 12.9 18.7143C12.9 16.5036 14.7005 14.7143 16.925 14.7143H18.075C20.2995 14.7143 22.1 16.5036 22.1 18.7143Z" fill="#213042"/>
                    </svg>
                    <h1>Organizações</h1>
                </div>
                <div class="titulo-bottom">
                    <div class="titulo-bottom-conteudo">
                        <div class="titulo-links">
                        <a href="{{route('perfil.organizacoes')}}" class="pagina-atual" >Todas as organizações</a>
                        <a href="{{route('perfil.organizacaos_form')}}" >Criar organização</a>
                        </div>
                    </div>

                    <div class="line-horizontal-conteudo"></div>
                </div>
            </div>
            <div class="lista-posts">
                <a href="{{route('perfil.organizacaos_form')}}" class="publicar-novo">  
                    <img src="assets/adicionar-icon.svg" alt="">
                    <div>Criar nova organização</div>
                </a>
                @if(isset($user))
                    @forelse($organizacoes as $organizacao)
                    <div class="btn-publicacao">
                        <svg width="33" height="25" viewBox="0 0 33 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.4875 3.64062C9.4875 5.27012 8.19328 6.59375 6.6 6.59375C5.00672 6.59375 3.7125 5.27012 3.7125 3.64062C3.7125 2.01113 5.00672 0.6875 6.6 0.6875C8.19328 0.6875 9.4875 2.01113 9.4875 3.64062ZM3.3 11.9568C2.78437 12.5475 2.475 13.3332 2.475 14.1875C2.475 15.0418 2.78437 15.8275 3.3 16.4182V11.9568ZM10.7456 9.35703C9.21422 10.7439 8.25 12.7742 8.25 15.0312C8.25 16.84 8.86875 18.5012 9.9 19.8037V20.9375C9.9 21.8709 9.16266 22.625 8.25 22.625H4.95C4.03734 22.625 3.3 21.8709 3.3 20.9375V19.5242C1.35094 18.575 0 16.5447 0 14.1875C0 10.9232 2.58328 8.28125 5.775 8.28125H7.425C8.6625 8.28125 9.80719 8.67676 10.7456 9.35176V9.35703ZM23.1 20.9375V19.8037C24.1312 18.5012 24.75 16.84 24.75 15.0312C24.75 12.7742 23.7858 10.7439 22.2544 9.35176C23.1928 8.67676 24.3375 8.28125 25.575 8.28125H27.225C30.4167 8.28125 33 10.9232 33 14.1875C33 16.5447 31.6491 18.575 29.7 19.5242V20.9375C29.7 21.8709 28.9627 22.625 28.05 22.625H24.75C23.8373 22.625 23.1 21.8709 23.1 20.9375ZM29.2875 3.64062C29.2875 5.27012 27.9933 6.59375 26.4 6.59375C24.8067 6.59375 23.5125 5.27012 23.5125 3.64062C23.5125 2.01113 24.8067 0.6875 26.4 0.6875C27.9933 0.6875 29.2875 2.01113 29.2875 3.64062ZM29.7 11.9568V16.4234C30.2156 15.8275 30.525 15.0471 30.525 14.1928C30.525 13.3385 30.2156 12.5527 29.7 11.9621V11.9568ZM16.5 7.4375C14.6798 7.4375 13.2 5.92402 13.2 4.0625C13.2 2.20098 14.6798 0.6875 16.5 0.6875C18.3202 0.6875 19.8 2.20098 19.8 4.0625C19.8 5.92402 18.3202 7.4375 16.5 7.4375ZM12.375 15.0312C12.375 15.8855 12.6844 16.666 13.2 17.2619V12.8006C12.6844 13.3965 12.375 14.177 12.375 15.0312ZM19.8 12.8006V17.2672C20.3156 16.6713 20.625 15.8908 20.625 15.0365C20.625 14.1822 20.3156 13.3965 19.8 12.8059V12.8006ZM23.1 15.0312C23.1 17.3885 21.7491 19.4188 19.8 20.368V22.625C19.8 23.5584 19.0627 24.3125 18.15 24.3125H14.85C13.9373 24.3125 13.2 23.5584 13.2 22.625V20.368C11.2509 19.4188 9.9 17.3885 9.9 15.0312C9.9 11.767 12.4833 9.125 15.675 9.125H17.325C20.5167 9.125 23.1 11.767 23.1 15.0312Z" fill="#5E6368"/>
                        </svg>
                        <a class="conteudo-btn-post">
                            <div class="titulo-post">
                                <div class="titulo-btn-publicacao">Nome</div>
                                <p>{{$organizacao->nome}}</p>
                            </div>
                         </a>
                            <div class="organizacao-post participante">
                                <div class="titulo-btn-publicacao">Situação</div>
                                @if($user->organizacao_id == $organizacao->id)
                                <p>Participante</p>
                                @endif
                                @if(($user->organizacao_id != $organizacao->id) && ($user->id != $organizacao->user_id))
                                <p>Leitor</p>
                                @endif
                                @if($user->id == $organizacao->user_id)
                                <p>Líder</p>
                                @endif
                            </div>
                        @if($user->id == $organizacao->user_id)
                        <div class="dropstart">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bookmark">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                                <li><button type="button" class="dropdown-item exclusao" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash-can"></i> excluir</button></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-pen-clip"></i> editar</a></li>     
                            </ul>
                        </div>
                        <div class="modal" tabindex="-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <h4>Tem certeza que deseja excluir a publicação?</h4>
            <p>Essa ação é irreversível</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn cancelar" data-bs-dismiss="modal" aria-label="Close">cancelar</button>
            <button type="button" class="btn excluir">Excluir</button>
        </div>
      </div>
    </div>
    </div>
                        @else
                        <div class="dropstart">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bookmark">
                                    <p>   </p>
                                </i>
                            </button>
                        </div>
                        @endif
                     </div>
                    @empty
                        <h6>Infelizmente não conseguimos encontrar essa informação para você neste momento ;(</h6>
                    @endforelse 
                @endif             
            </div>
        </div>
    </main>
    @endsection
