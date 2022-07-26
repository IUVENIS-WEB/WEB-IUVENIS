@inject('tagRepository', 'App\Contratcs\ITagRepository')
<div class="sidebar">
            <div class="conteudo-sidebar">
                <div class="topicos-recomendados">
                    <h4>Tópicos recomendados</h4>
                    <div class="tags-sidebar-recomendado">
                        @forelse ($tagRepository->getMostViewedTags as $tag)
                            <a href=""><div class="tag">{{$tag->name}}</div></a>
                        @empty
                            
                        @endforelse
                    </div>
                </div>
                <div class="escritores-recomendados">
                    <h4>Conheça os escritores</h4>
                    <div class="escritores">
                       <a href="#">
                        <div class="escritor-perfil-sidebar">
                            <div class="imagem-perfil-sidebar"><img src="assets/tabate.png" alt="foto de perfil"></div>
                            <div class="nome-descricao-escritor">
                                <h4>Nome sobrenome</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur simoismda is...</p>
                            </div>
                        </div>
                       </a> 
                       <a href="#">
                        <div class="escritor-perfil-sidebar">
                            <div class="imagem-perfil-sidebar"><img src="assets/tabate.png" alt="foto de perfil"></div>
                            <div class="nome-descricao-escritor">
                                <h4>Nome sobrenome</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur simoismda is...</p>
                            </div>
                        </div>
                       </a> 
                       <a href="#">
                        <div class="escritor-perfil-sidebar">
                            <div class="imagem-perfil-sidebar"><img src="assets/tabate.png" alt="foto de perfil"></div>
                            <div class="nome-descricao-escritor">
                                <h4>Nome sobrenome</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur simoismda is...</p>
                            </div>
                        </div>
                       </a> 
                       <a href="#">
                        <div class="escritor-perfil-sidebar">
                            <div class="imagem-perfil-sidebar"><img src="assets/tabate.png" alt="foto de perfil"></div>
                            <div class="nome-descricao-escritor">
                                <h4>Nome sobrenome</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur simoismda is...</p>
                            </div>
                        </div>
                       </a> 
                  
                    </div>
                    <a href="" class="ver-todos">Ver todos</a>
                </div>
                <div class="salvos-recentemente">
                    <h4>Recentemente salvos</h4>
                    <div class="salvos">
                       <a href="#">
                            <div class="conteudo-salvo">
                                <div class="autoria">
                                    <div class="imagem-perfil"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                    <p>Nome e sobrenome</p>
                                </div>
                                <h4>Gravidez na adolescencia e metodos contraceptivos</h4>
                                <div class="autoria">
                                    <p class="data">Abril 18</p>
                                    <div class="circulo"></div>
                                    <p class="data">Artigo</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="conteudo-salvo">
                                <div class="autoria">
                                    <div class="imagem-perfil"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                    <p>Nome e sobrenome</p>
                                </div>
                                <h4>Gravidez na adolescencia e metodos contraceptivos</h4>
                                <div class="autoria">
                                    <p class="data">Abril 18</p>
                                    <div class="circulo"></div>
                                    <p class="data">Artigo</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="conteudo-salvo">
                                <div class="autoria">
                                    <div class="imagem-perfil"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                    <p>Nome e sobrenome</p>
                                </div>
                                <h4>Gravidez na adolescencia e metodos contraceptivos</h4>
                                <div class="autoria">
                                    <p class="data">Abril 18</p>
                                    <div class="circulo"></div>
                                    <p class="data">Artigo</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="conteudo-salvo">
                                <div class="autoria">
                                    <div class="imagem-perfil"><img src="assets/tabate.png" alt="foto de perfil"></div>
                                    <p>Nome e sobrenome</p>
                                </div>
                                <h4>Gravidez na adolescencia e metodos contraceptivos</h4>
                                <div class="autoria">
                                    <p class="data">Abril 18</p>
                                    <div class="circulo"></div>
                                    <p class="data">Artigo</p>
                                </div>
                            </div>
                        </a>
                     </div>

                     <a href="" class="ver-todos">Ver todos</a>
                </div>
                <div class="rodape-sidebar">
                    <a href="">Explorar</a>
                    <a href="">Texto</a>
                    <a href="">Artigos</a>
                    <a href="">Editoriais</a>
                    <a href="">Videos</a>
                    <a href="">Webseries</a>
                    <a href="">Eventos</a>
                    <a href="">Login</a>
                    <a href="">Sobre</a>
                    <a href="">Contato</a>

                </div>  
            </div>
        </div>
