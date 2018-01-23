<div class="panel-body" id="formulario_cadastro_unidade_sistema">
    <form class="form-horizontal form-label-left" name="form1">
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
                    <input type="text" name="cep" maxlength="9" onKeyPress="MascaraCep(form1.cep);" class="form-control numeric required" id="buscaCep_input" >
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
                    <input type="text" class="form-control" name="logradouro" id="logradouro_input" >
                </div>
                <div class="col-md-4">
                    <label>Número:</label>
                    <input type="text" class="form-control" name="numero">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label>Complemento:</label>
                    <input type="text" class="form-control" id="input-placeholder" >
                </div>
                <div class="col-md-4">
                    <label>Bairro:</label>
                    <input type="text" class="form-control" name="bairro" id="bairro_input">
                </div>
            </div>
        </fieldset>

    </form>
</div>

<script type="text/javascript" src="/static/assets/js/scripts.js"></script>
<script type="text/javascript">

    function MascaraCep(cep){
        let event = this;
        if(mascaraInteiro(cep)==false){
            event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
    }

    //valida numero inteiro com mascara
    function mascaraInteiro(event){
        if (event.keyCode < 48 || event.keyCode > 57){
            event.returnValue = false;
            return false;
        }
        return true;
    }

    //formata de forma generica os campos
    function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                        || (Mascara.charAt(i) == "/")) 
                boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                        || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                if (boleanoMascara) { 
                    NovoValorCampo += Mascara.charAt(i); 
                    TamanhoMascara++;
                }
                else { 
                    NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                    posicaoCampo++; 
                }              
            }      
            campo.value = NovoValorCampo;
            return true; 
        }
        else { 
            return true; 
        }
    }

    loadScript("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js", function(){
        
        var $form = document.getElementById('formulario_cadastro_unidade_sistema');

        var $estados_select2 = $('.estados', $form);
        var $cidades_select2 = $('.cidades', $form);

        $cidades_select2.select2();

        $estados_select2.select2().change(function(){

            let estado_id = this.value;

            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>" + "index.php/Cadastro_unidades/get_cidades_by_estados/" + estado_id,
                dataType: 'json',
                success: function(cidades){
                    $cidades_select2.empty();
                    let selectData = new Option('::SELECIONE::', '', true, true);
                    $cidades_select2.append(selectData).trigger('change');

                    cidades.forEach(city => {
                        let newOption = new Option(city.text, city.id, true, true);
                        $cidades_select2.append(newOption).trigger('change');
                    });

                    $cidades_select2.val("").trigger('change');
                },
                error: function(err){
                    console.log("err",err);
                }
            });

        });

        var $buscaCep = $('#buscaCep_input');

        $buscaCep.focusout(function (){
            let cep = this.value.replace('-','');

            if(cep){
                
                $.ajax({
                    type: "POST",
                    url: "https://viacep.com.br/ws/"+cep+"/json",
                    dataType: 'json',
                    success: function(data){
                        $('#bairro_input').val(data.bairro);
                        $('#logradouro_input').val(data.logradouro);

                        if(data.uf){
                            $.ajax({
                                type: "GET",
                                url: "<?= base_url(); ?>" + "index.php/Cadastro_unidades/get_estado_id/" + data.uf,
                                dataType: 'json',
                                success: function(estado){
                                    $estados_select2.val(estado.id).trigger('change');
                                },
                                error: function(err){
                                    console.log("err",err);
                                }
                            });
                        }
                        if(data.localidade){
                            setTimeout(function() {
                                $.ajax({
                                    type: "GET",
                                    url: "<?= base_url(); ?>" + "index.php/Cadastro_unidades/get_cidade_id/" + data.localidade,
                                    dataType: 'json',
                                    success: function(cidade){
                                        $cidades_select2.val(cidade.id).trigger('change');
                                    },
                                    error: function(err){
                                        console.log("err",err);
                                    }
                                });
                            }, 500);
                        }
                    },
                    error: function(err){
                        console.log("err",err);
                    }
                });
            }

        });


    });

    
    
</script>