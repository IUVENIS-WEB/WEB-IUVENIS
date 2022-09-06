<nav>
    <div class="conteudo-navbar">
    <a href="{{ url('/') }}">
        <img src="{{URL::asset('images/logo.png')}}" id="aprendizado" width="44" height="35">
    </a>
        

        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
        </form>
        <div class="dropstart">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="imagem-perfil-navbar"><img src="{{asset('images/users/' . Auth::user()->foto)}}" alt="foto de perfil"></div>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
                <li><a class="dropdown-item" href="#"><svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.48918 11.2581C0.230995 9.45081 1.63338 7.83385 3.45903 7.83385H17.5387C19.3644 7.83385 20.7668 9.45081 20.5086 11.2581L19.0326 21.5897C18.8215 23.0676 17.5557 24.1654 16.0628 24.1654H4.93497C3.44202 24.1654 2.17626 23.0676 1.96512 21.5897L0.48918 11.2581Z" fill="#213042"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33203 5.50077C2.33203 4.85651 2.85431 4.33423 3.49857 4.33423H17.4971C18.1413 4.33423 18.6636 4.85651 18.6636 5.50077C18.6636 6.14503 18.1413 6.66731 17.4971 6.66731H3.49857C2.85431 6.66731 2.33203 6.14503 2.33203 5.50077Z" fill="#213042"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.66602 2.00114C4.66602 1.35687 5.03907 0.834595 5.49926 0.834595H15.4982C15.9584 0.834595 16.3314 1.35687 16.3314 2.00114C16.3314 2.6454 15.9584 3.16768 15.4982 3.16768H5.49926C5.03907 3.16768 4.66602 2.6454 4.66602 2.00114Z" fill="#213042"/>
                    </svg> Novo artigo</a></li>
                <li><a class="dropdown-item" href="#"><svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.48918 11.2581C0.230995 9.45081 1.63338 7.83385 3.45903 7.83385H17.5387C19.3644 7.83385 20.7668 9.45081 20.5086 11.2581L19.0326 21.5897C18.8215 23.0676 17.5557 24.1654 16.0628 24.1654H4.93497C3.44202 24.1654 2.17626 23.0676 1.96512 21.5897L0.48918 11.2581Z" fill="#213042"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33203 5.50077C2.33203 4.85651 2.85431 4.33423 3.49857 4.33423H17.4971C18.1413 4.33423 18.6636 4.85651 18.6636 5.50077C18.6636 6.14503 18.1413 6.66731 17.4971 6.66731H3.49857C2.85431 6.66731 2.33203 6.14503 2.33203 5.50077Z" fill="#213042"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.66602 2.00114C4.66602 1.35687 5.03907 0.834595 5.49926 0.834595H15.4982C15.9584 0.834595 16.3314 1.35687 16.3314 2.00114C16.3314 2.6454 15.9584 3.16768 15.4982 3.16768H5.49926C5.03907 3.16768 4.66602 2.6454 4.66602 2.00114Z" fill="#213042"/>
                    </svg> Novo editorial</a></li>
                <li><a class="dropdown-item" href="#"><svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11.4839V3.90397C0 1.22255 2.94911 -0.448987 5.30839 0.885921L11.938 4.6701L18.6737 8.51231C20.9976 9.83561 20.9976 13.1323 18.6737 14.4439L11.938 18.2862L5.22582 22.1168C2.91372 23.4401 0 21.7917 0 19.1451V11.4839Z" fill="#213042"/>
                    </svg>
                    Novo vídeo</a></li>
                <li><a class="dropdown-item" href="#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 0.0573425C4.38867 0.0989685 4.29883 0.15451 4.22852 0.223969C4.16016 0.293427 4.11133 0.355927 4.08398 0.411469C4.05469 0.46701 4.03516 0.524933 4.02148 0.585114C4.00781 0.645294 4.00781 0.728607 4.02148 0.835114C4.03516 0.941559 4.06641 1.03879 4.11719 1.12674C4.16992 1.21475 4.48438 1.54807 5.0625 2.12674L5.92969 2.99484H3.91016C2.5625 2.99484 1.83984 3.00174 1.74219 3.01566C1.64648 3.02951 1.52148 3.06192 1.36719 3.11288C1.21484 3.16379 1.0625 3.2402 0.910156 3.34207C0.757812 3.44388 0.650391 3.52493 0.589844 3.58511C0.529297 3.64529 0.464844 3.72165 0.396484 3.8143C0.326172 3.90683 0.257812 4.02957 0.1875 4.18228C0.117188 4.33511 0.0703125 4.48557 0.0410156 4.6337C0.0136719 4.78183 0 6.38834 0 9.45316C0 12.518 0.0136719 14.1314 0.0410156 14.2935C0.0703125 14.4555 0.121094 14.6221 0.195312 14.7934C0.267578 14.9648 0.337891 15.0944 0.402344 15.1823C0.466797 15.2703 0.529297 15.3444 0.589844 15.4045C0.650391 15.4647 0.742188 15.5388 0.867188 15.6268C0.992188 15.7147 1.11719 15.7842 1.24219 15.8351C1.36719 15.886 1.50781 15.9254 1.66016 15.9532C1.8125 15.9809 3.92578 15.9948 8 15.9948C12.0742 15.9948 14.1875 15.9809 14.3398 15.9532C14.4922 15.9254 14.6543 15.8721 14.8262 15.7935C14.998 15.7147 15.1523 15.6152 15.291 15.4948C15.4297 15.3745 15.541 15.2564 15.625 15.1407C15.709 15.0249 15.7773 14.9023 15.834 14.7726C15.8887 14.643 15.9297 14.5041 15.959 14.356C15.9863 14.2078 16 12.592 16 9.50873C16 6.42538 15.9863 4.80728 15.959 4.65457C15.9297 4.50174 15.877 4.33969 15.7988 4.16843C15.7598 4.082 15.7227 4.00742 15.6875 3.94455C15.6523 3.88284 15.6191 3.83243 15.5898 3.79343C15.5293 3.71469 15.4375 3.62216 15.3125 3.51566C15.1875 3.40915 15.0664 3.32584 14.9512 3.26566C14.8359 3.20547 14.7012 3.15451 14.5488 3.11288C14.3965 3.0712 14.2773 3.04575 14.1953 3.03647C14.1504 3.03165 13.9336 3.02676 13.5449 3.02188L12.0703 3.0087L10.0703 2.99484L10.9375 2.12674C11.5156 1.54807 11.8301 1.21475 11.8828 1.12674C11.9336 1.03879 11.9648 0.964752 11.9785 0.90451C11.9863 0.867767 11.9902 0.822357 11.9883 0.76828C11.9883 0.733856 11.9844 0.695953 11.9785 0.65451C11.9648 0.548065 11.9336 0.450836 11.8828 0.362885C11.8301 0.274933 11.7539 0.198517 11.6523 0.133698C11.584 0.0903015 11.5273 0.0583191 11.4805 0.0377502C11.457 0.0276184 11.4355 0.0202332 11.416 0.0156555C11.3613 0.0017395 11.291 -0.00289917 11.209 0.0017395C11.125 0.00637817 11.0527 0.0202942 10.9922 0.0434265C10.9336 0.0665588 10.875 0.0966492 10.8203 0.133698C10.7637 0.170746 10.2773 0.645294 9.36133 1.55734L7.98633 2.92538L6.625 1.55734C5.7168 0.645294 5.23633 0.170746 5.17969 0.133698C5.125 0.0966492 5.06641 0.0665588 5.00781 0.0434265C4.97266 0.0298157 4.93164 0.0193787 4.88867 0.0121765L4.79102 0.0017395C4.70898 -0.00289917 4.61133 0.0156555 4.5 0.0573425Z" fill="#213042"/>
                    </svg> Nova websérie</a></li>
                <li><a class="dropdown-item" href="#"><svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7387 20.2474C20.3611 22.184 18.9167 24.1654 16.8826 24.1654L4.11574 24.1654C2.08162 24.1654 0.637196 22.1839 1.25966 20.2474L4.58052 9.91582C4.97931 8.67516 6.13344 7.83385 7.43661 7.83385L13.5617 7.83385C14.8649 7.83385 16.019 8.67516 16.4178 9.91582L19.7387 20.2474Z" fill="#213042"/>
                    <path d="M1.25937 8.25226C0.636906 6.31571 2.08133 4.33423 4.11545 4.33423L16.8823 4.33423C18.9164 4.33423 20.3609 6.31571 19.7384 8.25226L16.4175 18.5838C16.0187 19.8245 14.8646 20.6658 13.5614 20.6658L7.43632 20.6658C6.13315 20.6658 4.97902 19.8245 4.58024 18.5838L1.25937 8.25226Z" fill="#213042"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33203 2.00114C2.33203 1.35687 2.85431 0.834595 3.49857 0.834595H17.4971C18.1413 0.834595 18.6636 1.35687 18.6636 2.00114C18.6636 2.6454 18.1413 3.16768 17.4971 3.16768H3.49857C2.85431 3.16768 2.33203 2.6454 2.33203 2.00114Z" fill="#213042"/>
                    </svg>
                    Novo evento</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.5197 1.50937C12.926 -0.503125 10.074 -0.503125 9.48031 1.50937L9.33656 1.99812C9.24786 2.29942 9.09284 2.57703 8.88288 2.81062C8.67291 3.0442 8.41333 3.22783 8.12316 3.34803C7.83299 3.46823 7.5196 3.52196 7.20597 3.50528C6.89233 3.4886 6.5864 3.40193 6.31062 3.25163L5.865 3.00725C4.02069 2.00387 2.00387 4.02069 3.00869 5.86356L3.25163 6.31062C3.89275 7.48937 3.28469 8.95706 1.99812 9.33656L1.50937 9.48031C-0.503125 10.074 -0.503125 12.926 1.50937 13.5197L1.99812 13.6634C2.29942 13.7521 2.57703 13.9072 2.81062 14.1171C3.0442 14.3271 3.22783 14.5867 3.34803 14.8768C3.46823 15.167 3.52196 15.4804 3.50528 15.794C3.4886 16.1077 3.40193 16.4136 3.25163 16.6894L3.00725 17.135C2.00387 18.9793 4.02069 20.9961 5.86356 19.9913L6.31062 19.7484C6.5864 19.5981 6.89233 19.5114 7.20597 19.4947C7.5196 19.478 7.83299 19.5318 8.12316 19.652C8.41333 19.7722 8.67291 19.9558 8.88288 20.1894C9.09284 20.423 9.24786 20.7006 9.33656 21.0019L9.48031 21.4906C10.074 23.5031 12.926 23.5031 13.5197 21.4906L13.6634 21.0019C13.7521 20.7006 13.9072 20.423 14.1171 20.1894C14.3271 19.9558 14.5867 19.7722 14.8768 19.652C15.167 19.5318 15.4804 19.478 15.794 19.4947C16.1077 19.5114 16.4136 19.5981 16.6894 19.7484L17.135 19.9927C18.9793 20.9961 20.9961 18.9793 19.9913 17.1364L19.7484 16.6894C19.5981 16.4136 19.5114 16.1077 19.4947 15.794C19.478 15.4804 19.5318 15.167 19.652 14.8768C19.7722 14.5867 19.9558 14.3271 20.1894 14.1171C20.423 13.9072 20.7006 13.7521 21.0019 13.6634L21.4906 13.5197C23.5031 12.926 23.5031 10.074 21.4906 9.48031L21.0019 9.33656C20.7006 9.24786 20.423 9.09284 20.1894 8.88288C19.9558 8.67291 19.7722 8.41333 19.652 8.12316C19.5318 7.83299 19.478 7.5196 19.4947 7.20597C19.5114 6.89233 19.5981 6.5864 19.7484 6.31062L19.9927 5.865C20.9961 4.02069 18.9793 2.00387 17.1364 3.00869L16.6894 3.25163C16.4136 3.40193 16.1077 3.4886 15.794 3.50528C15.4804 3.52196 15.167 3.46823 14.8768 3.34803C14.5867 3.22783 14.3271 3.0442 14.1171 2.81062C13.9072 2.57703 13.7521 2.29942 13.6634 1.99812L13.5197 1.50937V1.50937ZM11.5 15.7119C10.3829 15.7119 9.31163 15.2681 8.52175 14.4782C7.73188 13.6884 7.28813 12.6171 7.28813 11.5C7.28813 10.3829 7.73188 9.31163 8.52175 8.52175C9.31163 7.73188 10.3829 7.28813 11.5 7.28813C12.6167 7.28813 13.6876 7.73172 14.4772 8.52133C15.2668 9.31094 15.7104 10.3819 15.7104 11.4986C15.7104 12.6152 15.2668 13.6862 14.4772 14.4758C13.6876 15.2654 12.6167 15.709 11.5 15.709V15.7119Z" fill="#213042"/>
                </svg> Conta</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-right-to-bracket"></i> Sair</a></li>
            </ul>
        </div>
    </div>
</nav>