<div class="container">
    <h2 class="text-center"><strong>Gerenciar Médicos</strong></h2>

    <p class="text-primary">&nbsp;&nbsp;Editar Informações</p>

    <div class="container">
        <form class="needs-validation" novalidate action="<?php echo base_url('/restrict/save_medico'); ?>"
              method="post">

            <input value="<?php echo $editarMedico['medico_id'] ?>" name="medico_id" type="text" hidden>
            <div class="form-row">
                <div class="col-md-6 ">
                    <label for="">Nome</label>
                    <input value="<?php echo $editarMedico['medico_nome'] ?>" type="text" class="form-control"
                           id="medico_id" placeholder="Nome" name="medico_nome"
                           required>
                    <div class="valid-feedback">
                        Nome preenchido!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Crm</label>
                    <input value="<?php echo $editarMedico['medico_crm'] ?>" type="text" class="form-control"
                           id="medico_crm" placeholder="Crm" name="medico_crm"
                           required pattern="[0-9]+$">
                    <div class="valid-feedback">
                        Crm preenchido!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 ">
                    <label for="">E-mail</label>
                    <input value="<?php echo $editarMedico['medico_email'] ?>" type="text" class="form-control"
                           id="medico_email" placeholder="Email" name="medico_email"
                           required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <div class="valid-feedback">
                        E-mail preenchido!
                    </div>
                </div>

                <div class="col-md-6 ">
                    <label for="">Confirma e-mail</label>
                    <input value="<?php echo $editarMedico['medico_email'] ?>" type="text" class="form-control"
                           id="email_confirm" placeholder="Email" name="email_confirm"
                           required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <div class="valid-feedback">
                        Confirma e-mail preenchido!
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <label for="">Especialidade</label>
                    <input value="<?php echo $editarMedico['medico_especialidade'] ?>" type="text" class="form-control"
                           id="medico_especialidade" placeholder="Especialidade"
                           name="medico_especialidade" required>
                    <div class="valid-feedback">
                        Especialidade preenchido!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
        </form>
    </div>
</div>
</section>

