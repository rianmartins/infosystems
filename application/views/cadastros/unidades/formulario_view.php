<div class="panel-body">
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
                    <select class="form-control select2" tabindex="-1" style=" width: 100%">
                        <option value="">::SELECIONE::</option>
                        <?php 
                            foreach ($estados as $estado) { ?>
                                <option value="<?= $estado->sigla ?>"><?= $estado->nome ?></option>
                            <?php }
                        ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Cidade:</label>
                    <select class="form-control select2" tabindex="-1" style=" width: 100%">
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