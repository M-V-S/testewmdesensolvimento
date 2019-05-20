<div class="container">
    <h2 class="text-center"><strong>Gerenciar Pacientes</strong></h2>

    <p class="text-primary">&nbsp;&nbsp;Editar Informações</p>

    <div class="container">
        <form class="needs-validation" novalidate action="<?php echo base_url('/paciente/save_paciente'); ?>"
              method="post">

            <input value="<?php echo $editarPaciente['paciente_id'] ?>" id="paciente_editar_id" for="paciente_editar_id"
                   name="paciente_id" hidden>

            <div class="form-row">
                <div class="col-md-6 ">

                    <label for="paciente_editar_nome" class="col-form-label">Nome:</label>
                    <input value="<?php echo $editarPaciente['paciente_nome'] ?>" type="text" class="form-control"
                           name="paciente_nome" id="paciente_editar_nome" required>
                    <div class="valid-feedback">
                        Nome preenchido!

                    </div>
                </div>
                <div class="col-md-6">
                    <label for="paciente_editar_idade" class="col-form-label">Idade:</label>
                    <input value="<?php echo $editarPaciente['paciente_idade'] ?>" type="text" class="form-control"
                           name="paciente_idade" id="paciente_editar_idade"
                           required>
                    <div class="valid-feedback">
                        Idade preenchido!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 ">
                    <label for="paciente_editar_email" class="col-form-label">E-mail:</label>
                    <input value="<?php echo $editarPaciente['paciente_email'] ?>" type="text" class="form-control"
                           name="paciente_email" id="paciente_editar_email"
                           required>
                    <div class="valid-feedback">
                        E-mail preenchido!
                    </div>
                </div>

                <div class="col-md-6 ">
                    <label for="paciente_editar_email_comf" class="col-form-label">Confirmar E-mail:</label>
                    <input value="<?php echo $editarPaciente['paciente_email'] ?>" type="text" class="form-control"
                           name="email_confirm" id="paciente_editar_email_comf"
                           required>
                    <div class="valid-feedback">
                        Confirma e-mail preenchido!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="agend_status">Sexo</label>
                    <select id="paciente_editar_sexo" for="paciente_editar_sexo" name="paciente_sexo"
                            class="custom-select" required>
                        <option value="value="<?php echo $editarPaciente['paciente_sexo'] ?>" >
                        <?php
                        if ($editarPaciente['paciente_sexo'] == 'm')
                            echo "Masculino";
                        else
                            echo "Feminino";
                        ?>
                        </option>

                        <option value="value="<?php echo $editarPaciente['paciente_sexo'] ?>">
                        <?php
                        if ($editarPaciente['paciente_sexo'] != 'm')
                            echo "Masculino";
                        else
                            echo "Feminino";
                        ?>
                        </option>
                    </select>
                    <div class="valid-feedback">
                        Sexo preenchido!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>

    </div>
</div>
</section>

