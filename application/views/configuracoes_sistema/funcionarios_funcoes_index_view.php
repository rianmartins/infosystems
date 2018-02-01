<div class="panel-body" id="index_funcionarios_funcoes">
    <div class="panel-heading clearfix">
        <button type="button" class="btn btn-success">Adicionar Novo</button>
    </div>
    <div class="panel-body">
       <div class="table-responsive">
            <table id="funcionarios_funcoes_table" class="display table" style="width: 100%; cellspacing: 0;">
                <thead>
                    <tr>
                        <th class="col-md-2">Cod. Função</th>
                        <th class="col-md-6">Função</th>
                        <th class="col-md-4">Salário Base</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="/static/assets/js/scripts.js"></script>
<script type="text/javascript">

    loadScript("<?php echo base_url('static/assets/plugins/datatables/js/jquery.datatables.min.js'); ?>", function(){
        
        var $section = document.getElementById('index_funcionarios_funcoes');

        $('#funcionarios_funcoes_table', $section).dataTable( {
            "language": {
                "url": "<?php echo base_url('static/assets/plugins/datatables/languages/Portuguese-Brasil.lang'); ?>"
            }
        });
    });

    
    
</script>