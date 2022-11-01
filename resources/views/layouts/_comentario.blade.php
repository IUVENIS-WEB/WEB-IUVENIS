<div class="comentario">
    <div class="imagem-perfil-comentario"><img src="assets/tabate.png" alt="foto de perfil"></div>
    <div class="comentario-direita">
        <div class="comentario-direita-nome">
            <p>{{$comentario->autor->NomeCompleto}}</p>
            <p>22 de abril 2020</p>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,Lorem ipsum dolor sit
            amet, consectetur adipiscing elit. Quisque condimentum nisl nisl,</p>
        <form action="" id="form-reply">
            <textarea name="" id="textarea-reply" class='autoExpand' placeholder="responder..." rows='1'
                data-min-rows='1' maxlength="1000"></textarea>
            <div class="comentario-form-btns">
                <input type="reset" id="cancelar-reply" value="Cancelar">
                <input type="submit" id="submit-reply" value="responder" disabled>
            </div>
        </form>
        <div class="actions-comentario">
            <button class="btn btn-primary ver-respostas" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Ver respostas
            </button>
            <button class="btn btn-primary ver-respostas responder" id="reply-responder">Responder</button>
            <div class="collapse" id="collapseExample">
                <div class="comentarios replies">
                </div>
            </div>
        </div>
    </div>
</div>
