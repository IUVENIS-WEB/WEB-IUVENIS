<style>
    .container.date{
        display: flex;
        width: 100%;
        margin-bottom: 10px;
        border-style: solid;
        border-color: var(--bege-escuro);
        border-width: 3px;
        border-radius: 15px
    }
</style>

<div class="container date">
    <span>
        <label for="dia">Dia:
        </label>
        <select name="dia" id="dia"></select>
    </span>
    
    <span>
        <label for="mes">Mês:
        </label>
        <select name="mes" id="mes"></select>
    </span>
    
    <span>
        <label for="ano">Ano:
        </label>
        <select name="ano" id="ano"></select>
    </span>
</div>
<script src="{{asset('js/data.js')}}"></script>