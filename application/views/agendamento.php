<div class="container">
    <h2 class="text-center"><strong>Gerenciar Agendamento</strong></h2>
    <a id="btn_add_agendamento" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Agendamento</i></a>

    <table class="table table-striped table-bordered">
        <thead class="tableheader">
        <tr>
            <th class="text-center" scope="col">Nome Paciente</th>
            <th class="text-center" scope="col">Nome Médico</th>
            <th class="text-center" scope="col">Status</th>
            <th class="text-center" scope="col">Data Atendimento</th>
            <th class="text-center" scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($getAgendamentos as $agendamento) { ?>
            <tr>
                <th class="text-center" scope="row"><?php echo $agendamento['paciente_nome'] ?></th>
                <th class="text-center" scope="row"><?php echo $agendamento['medico_nome'] ?></th>
                <th class="text-center" scope="row"><?php echo $agendamento['agendamento_status'] ?></th>
                <th class="text-center" scope="row"><?php echo $agendamento['data_atendimento'] ?></th>

                <td class="text-center">
                    <div style="display: inline-block;">
                        <a class="btn_editar_medico btn btn-primary btn-xs"
                           href="<?php echo base_url(); ?>agendamento/editar_agendamento/<?php echo $agendamento['agendamento_id'] ?>">
                            Editar
                            <i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url(); ?>agendamento/delete_agendamento/<?php echo $agendamento['agendamento_id'] ?>"
                           onclick="return confirm('Deseja realmente excluir este registro?')"
                           class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                        <a href="#" class="btn btn-success btn-xs"><i class="fa "></i> Enviar E-mail</a>

                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</section>

<!--FORMULÁRIO PARA CADASTAR AGENDAMENTO -->
<div id="modal_agendamento" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Agendamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="needs-validation" novalidate id="form_paciente" id="form_agendamento"
                      action="<?php echo base_url("agendamento/save_agendamento"); ?>" method="post">

                    <div class="form-group">
                        <label for="agend_name_med">Nome Médico:</label>
                        <select class="custom-select" id="agendamento_name_medico" name="agendamento_medico_id"
                                required>
                            <option>Selecione um médico</option>
                            <?php foreach ($getMedicos as $medico) { ?>
                                <option value="<?php echo $medico['medico_id']; ?>"><?php echo $medico['medico_nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agend_name_pacie">Nome Paciente:</label>
                        <select class="custom-select" id="agend_name_pacie" name="agendamento_paciente_id" required>
                            <option>Selecione um paciente</option>
                            <?php foreach ($getPacientes as $paciente) { ?>
                                <option value="<?php echo $paciente['paciente_id']; ?>"><?php echo $paciente['paciente_nome']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="agendamento_status">Status</label>
                        <select id="agend_status" name="agendamento_status" class="custom-select" required>
                            <option value="aguardando" selected>Aguardando</option>
                            <option value="realizado">Realizado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="agend_data_atendimento" class="col-form-label">Data:</label>
                        <input type="date" class="form-control col-3" name="data_atendimento"
                               min="<?php echo $dateAtual; ?>" required><br>
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

<!--editar agendamento-->
<div id="modal_editar_agendamento" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Editar Indormações do Agendamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="needs-validation" novalidate id="form_paciente" id="form_agendamento"
                      action="<?php echo base_url("restrict/save_agendamento"); ?>" method="post">
                    <div class="form-group">
                        <label for="paciente_agen__editar_nome" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="paciente_agen__editar_nome"
                               name="paciente_agen__editar_nome"
                               required>
                        <div class="valid-feedback">
                            Nome preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agend_name_med">Nome Médico:</label>
                        <select class="custom-select" name="agendamento_medico_id" required>
                            <option></option>
                            <?php foreach ($getMedicos as $medico) { ?>
                                <option value="<?php echo $medico['medico_id']; ?>"><?php echo $medico['medico_nome']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="valid-feedback">
                            Nome do médico selecionado!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agend_name_pacie">Nome Paciente:</label>
                        <select class="custom-select" id="agend_name_pacie" name="agendamento_paciente_id" required>
                            <option></option>
                            <?php foreach ($getPacientes as $paciente) { ?>
                                <option value="<?php echo $paciente['paciente_id']; ?>"><?php echo $paciente['paciente_nome']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="valid-feedback">
                            Nome do paciente selecionado!
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="agendamento_status">Status</label>
                        <select id="agend_status" name="agendamento_status" class="custom-select" required>
                            <option value="aguardando" selected>Aguardando</option>
                            <option value="realizado">Realizado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                        <div class="valid-feedback">
                            Status selecionado!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="agend_data_atendimento" class="col-form-label">Data:</label>
                        <input type="date" class="form-control col-3" name="data_atendimento"
                               min="<?php echo $ultimaData[0]["data_atendimento"] ?>" required
                               pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2014-02-18"><br>
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
