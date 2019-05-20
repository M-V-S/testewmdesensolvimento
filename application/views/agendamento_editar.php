<div class="container">
    <h2 class="text-center"><strong>Gerenciar Agendamentos</strong></h2>

    <p class="text-primary">&nbsp;&nbsp;Editar Informações</p>

    <div class="container">
        <form class="needs-validation" novalidate action="<?php echo base_url("agendamento/save_agendamento"); ?>"
              method="post">
            <div class="form-row">

                <div class="col-md-6 ">
                    <label for="agend_name_pacie">Nome Paciente:</label>
                    <select class="custom-select" id="agend_name_pacie" name="agendamento_paciente_id" required>

                        <option selected="selected"
                                value="<?php echo $editarAgendamento['paciente_id']; ?>"><?php echo $editarAgendamento['paciente_nome']; ?></option>
                        <?php foreach ($listaPacientes as $paciente) { ?>
                            <?php if (!$editarAgendamento['paciente_nome'] == $paciente['paciente_nome']) ?>
                                <option value="<?php echo $paciente['paciente_id']; ?>"><?php echo $paciente['paciente_nome']; ?></option>
                        <?php } ?>

                    </select>
                    <div class="valid-feedback">
                        Nome do paciente selecionado!
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="agend_name_med">Nome Médico:</label>
                    <select class="custom-select" name="agendamento_medico_id" required>

                        <option selected="selected"
                                value="<?php echo $editarAgendamento['medico_id']; ?>"><?php echo $editarAgendamento['medico_nome']; ?></option>
                        <?php foreach ($listaMedicos as $medico) { ?>
                            <?php if (!$editarAgendamento['medico_nome'] == $medico['medico_nome']) ?>
                                <option value="<?php echo $medico['medico_id']; ?>"><?php echo $medico['medico_nome']; ?></option>
                        <?php } ?>

                    </select>
                    <div class="valid-feedback">
                        Nome do médico selecionado!
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-mb-6">
                    <label for="agendamento_status">Status</label>
                    <select id="agend_status" name="agendamento_status" class="custom-select" required>

                        <?php
                        if ($editarAgendamento['agendamento_status'] === 'aguardando') {
                            ?>
                            <option selected="selected"
                                    value="<?php echo $editarAgendamento['agendamento_status']; ?>"><?php echo $editarAgendamento['agendamento_status']; ?></option>
                            <option value="realizado">realizado</option>
                            <option value="cancelado">cancelado</option>
                        <?php } else if ($editarAgendamento['agendamento_status'] === 'realizado') { ?>
                            <option selected="selected"
                                    value="<?php echo $editarAgendamento['agendamento_status']; ?>"><?php echo $editarAgendamento['agendamento_status']; ?></option>
                            <option value="aguardando">aguardando</option>
                            <option value="cancelado">cancelado</option>
                        <?php } else { ?>
                            <option selected="selected"
                                    value="<?php echo $editarAgendamento['agendamento_status']; ?>"><?php echo $editarAgendamento['agendamento_status']; ?></option>
                            <option value="aguardando">aguardando</option>
                            <option value="realizado">realizado</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-7">
                    <label for="agendamento_status">Data</label>

                    <input type="date" class="form-control col-3" min="<?php echo $dateAtual; ?>"
                           value="<?php echo $editarAgendamento["data_atendimento"]; ?>" name="data_atendimento"
                           required><br>
                    <div class="valid-feedback">
                        Status selecionado!
                    </div>
                </div>

            </div>


            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>

    </div>
</div>
</section>

