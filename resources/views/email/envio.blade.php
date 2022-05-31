<html>
    <body>
        <form action="{{ url('/Mail') }}" method="post">
            <input type="hidden"  name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input input type="text" name="nome" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sua Mensagem</label>
                            <textarea rows="5" class="form-control" name="mensagem" style="height:100px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>                    
       </div>
    </body>
</html>