<!-- LISTAR PACIENTES-->

<div class="container">
    <h2 class="text-center"><strong>Gerenciar Paciente</strong></h2>
    <a id="btn_add_paciente" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Paciente</i></a>

    <table class="table table-striped table-bordered">
        <thead class="tableheader">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">Idade</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($getPacientes as $paciente) { ?>
            <tr>
                <th class="text-center" scope="row"><?php echo $paciente['paciente_nome'] ?></th>
                <th class="text-center" scope="row"><?php
                    if ($paciente['paciente_sexo'] == 'm')
                        echo "Masculino";
                    else
                        echo "Feminino";

                    ?></th>
                <th class="text-center" scope="row"><?php echo $paciente['paciente_idade'] ?></th>
                <th class="text-center" scope="row"><?php echo $paciente['paciente_email'] ?></th>

                <td class="text-center">
                    <div style="display: inline-block;">
                        <a class="btn_editar_medico btn btn-primary btn-xs"
                           href="<?php echo base_url(); ?>paciente/editar_paciente/<?php echo $paciente['paciente_id'] ?>"
                        >
                            Editar
                            <i class="fa fa-edit"></i></a>

                        <a href="<?php echo base_url(); ?>paciente/delete_paciente/<?php echo $paciente['paciente_id'] ?>"
                           onclick="return confirm('Deseja realmente excluir este registro?')"
                           class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</section>

<!--FORMULÁRIO PARA CADASTAR PACIENTE -->
<div id="modal_paciente" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form_paciente" action="<?php echo base_url("paciente/save_paciente"); ?>" method="post"
                      class="needs-validation" novalidate>

                    <input id="paciente_id" name="paciente_id" hidden>

                    <div class="form-group">
                        <label for="pacie_name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" name="paciente_nome" id="pacie_name" required>
                        <div class="valid-feedback">
                            Nome preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pacie_idade" class="col-form-label">Idade:</label>
                        <input type="numbers" class="form-control" name="paciente_idade" id="pacie_idade" required
                               pattern="[0-9]+$">
                        <div class="valid-feedback">
                            Idade preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pacie_email" class="col-form-label">E-mail:</label>
                        <input type="text" class="form-control" name="paciente_email" id="pacie_email" required
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <div class="valid-feedback">
                            E-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pacie_email_confirm" class="col-form-label">Confirmar E-mail:</label>
                        <input type="text" class="form-control" name="email_confirm" id="pacie_email_confirm" required
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <div class="valid-feedback">
                            Confirma e-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="agend_status">Sexo</label>
                        <select id="agend_status" name="paciente_sexo" class="custom-select" required>
                            <option value="m" selected>Masculino</option>
                            <option value="f">Feminino</option>
                        </select>
                        <div class="valid-feedback">
                            Sexo preenchido!
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="btn_save_agent" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
