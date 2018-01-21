<div class="panel-body" id="formulario_cadastro_unidade_sistema">
    <form class="form-horizontal form-label-left">
        <fieldset>
            <div class="form-group">
                <div class="col-sm-6">
                    <label>Nome da Unidade:</label>
                    <input type="text" class="form-control" id="input-Default">
                </div>
                <div class="col-sm-6">
                    <label>CNPJ:</label>
                    <input type="text" class="form-control" id="input-help-block">
                </div>
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <div class="form-group">
                <h4>Endereço</h4>
                <div class="col-md-4">
                    <label>CEP:</label>
                    <input type="text" class="form-control" id="input-placeholder" >
                </div>
                <div class="col-md-4">
                    <label>Estado:</label>
                    <select class="form-control select2 estados" name="estado">
                        <option value="">::SELECIONE::</option>
                        <?php 
                            foreach ($estados as $estado) { ?>
                                <option value="<?= $estado->id ?>"><?= $estado->nome ?></option>
                            <?php }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Cidade:</label>
                    <select class="form-control select2 cidades" name="cidade">
                        <option value="">::SELECIONE::</option>
                    </select>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-md-8">
                    <label>Logradouro:</label>
                    <input type="text" class="form-control" id="input-placeholder" >
                </div>
                <div class="col-md-4">
                    <label>Número:</label>
                    <input type="text" class="form-control" id="input-rounded">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label>Complemento:</label>
                    <input type="text" class="form-control" id="input-placeholder" >
                </div>
                <div class="col-md-4">
                    <label>Bairro:</label>
                    <input type="text" class="form-control" id="input-rounded">
                </div>
            </div>
        </fieldset>

    </form>
</div>

<script type="text/javascript" src="/static/assets/js/scripts.js"></script>
<script type="text/javascript">

    loadScript("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js", function(){
        
        var $form = document.getElementById('formulario_cadastro_unidade_sistema');

        $('.estados', $form).select2().change(function(){

            let estado_id = this.value;

            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>" + "index.php/Cadastro_unidades/get_cidades_by_estados/" + estado_id,
                dataType: 'json',
                success: function(cidades){
                    console.log("data",cidades);

                    $('.cidades', $form).select2({
                        data: cidades
                    });
                },
                error: function(err){
                    console.log("err",err);
                }
            });

        });


    });

    
    
</script>