<div class="tab-content" id="nav-tabContent">
    <!--listagem médicos-->
    <div id="nav-medico" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container">
            <h2 class="text-center"><strong>Gerenciar Médico</strong></h2>
            <a id="btn_add_medico" class="btn btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;Adicionar Médico</i></a>

            <table class="table table-striped table-bordered">
                <thead class="tableheader">
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">Crm</th>
                    <th class="text-center" scope="col">E-mail</th>
                    <th class="text-center" scope="col">Especialidade</th>
                    <th class="text-center" scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($getMedicos as $medico) { ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $medico['medico_nome'] ?></th>
                        <th class="text-center" scope="row"><?php echo $medico['medico_crm'] ?></th>
                        <th class="text-center" scope="row"><?php echo $medico['medico_email'] ?></th>
                        <th class="text-center" scope="row"><?php echo $medico['medico_especialidade'] ?></th>

                        <td class="text-center">
                            <div style="display: inline-block;">

                                <a class="btn_editar_medico btn btn-primary btn-xs"
                                   href="<?php echo base_url(); ?>restrict/editar_medico/<?php echo $medico['medico_id'] ?>">
                                    Editar
                                    <i class="fa fa-edit"></i></a>

                                <a href="<?php echo base_url(); ?>restrict/delete_medico/<?php echo $medico['medico_id']; ?>"
                                   onclick="return confirm('Deseja realmente excluir este registro?')"
                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>

<!-- FORMULÁRIO PARA CADASTAR MÉDICO -->
<div id="modal_medico" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Médico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="needs-validation" novalidate id="form_medico"
                      action="<?php echo base_url("restrict/save_medico"); ?>" method="post">

                    <input id="medico_id" name="medico_id" hidden>

                    <div class="form-group">
                        <label for="med_name" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" id="med_name" name="medico_nome"
                               required>
                        <div class="valid-feedback">
                            Nome preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="med_crm" class="col-form-label">Crm:</label>
                        <input required type="text" class="form-control" name="medico_crm" id="med_crm"
                               pattern="[0-9]+$" required>
                        <div class="valid-feedback">
                            Crm preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="med_email" class="col-form-label">E-mail:</label>
                        <input required type="text" class="form-control" name="medico_email" id="med_email"
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        <div class="valid-feedback">
                            E-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="med_email_confirm" class="col-form-label">Confirmar E-mail:</label>
                        <input required type="text" class="form-control" name="email_confirm" id="med_email_confirm"
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        <div class="valid-feedback">
                            Confirma e-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="med_espicia" class="col-form-label">Espicialidade:</label>
                        <input required type="text" class="form-control" name="medico_especialidade" id="med_espicia"
                               required>
                        <div class="valid-feedback">
                            Especialidade preenchido!
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="btn_save_member" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--editar medico-->
<div id="modal_editar_medico" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Indormações do Médico</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form_editar_medico" action="<?php echo base_url("restrict/save_medico"); ?>" method="post"
                      class="needs-validation" novalidate>

                    <input id="medico_editar_id" name="medico_id" for="medico_editar_id" hidden>

                    <div class="form-group">
                        <label for="medico_editar_nome" class="col-form-label">Nome:</label>
                        <input type="text" class="form-control" name="medico_nome" id="medico_editar_nome" required
                               pattern="[a-z\s]+$">
                        <div class="valid-feedback">
                            Nome preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="medico_editar_crm" class="col-form-label">Crm:</label>
                        <input type="text" class="form-control" name="medico_crm" id="medico_editar_crm" required
                               pattern="[0-9]+$">
                        <div class="valid-feedback">
                            Crm preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="medico_editar_email" class="col-form-label">E-mail:</label>
                        <input type="text" class="form-control" name="medico_email" id="medico_editar_email" required
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <div class="valid-feedback">
                            E-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="medico_editar_email_comfim" class="col-form-label">Confirmar E-mail:</label>
                        <input type="text" class="form-control" name="email_confirm" id="medico_editar_email_comfim"
                               required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                        <div class="valid-feedback">
                            Confirma e-mail preenchido!
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="medico_editar_especialidade" class="col-form-label">Espicialidade:</label>
                        <input type="text" class="form-control" name="medico_especialidade"
                               id="medico_editar_especialidade" required pattern="[a-z\s]+$">
                        <div class="valid-feedback">
                            Especialidade preenchido!
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" id="btn_save_member" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;Salvar
                        </button>
                        <span class="help-block"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



