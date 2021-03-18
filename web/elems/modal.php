<div class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0 align-items-start">
                <div>
                    <h4 class="modal-title">Preencha seus dados</h4>
                    <span> </span>
                </div>
                <div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <form type="POST" onsubmit="return onSubmitForm(event);">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <label class="form-label">Nome completo</label>
                            <input class="form-control" name="name" minlength=3 maxlength=100 type="text" data-bs-toggle="tooltip" data-bs-placement="bottom" title="O nome deve ter de 3 a 100 caracteres" required></div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Nascimento</label>
                            <input class="form-control" name="birth" type="date" required></div>
                        <div class="col-6 mb-2">
                            <label class="form-label">CPF</label>
                            <input class="form-control" name="cpf" minlength=11 maxlength=11 type="text" pattern= "\d{11}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="O CPF deve ter apenas 11 dígitos" required ></div>
                        <div class="col-6 mb-2">
                            <label class="form-label">Como conheceu?</label>
                            <select class="form-select" name="source">
                                <option value="" selected></option>

                                <?php foreach (get_patients_mock() as $patient) { 
                                    echo '<option value="'.$patient['patient_id'].'">'.$patient['nome'].'</option>';
                                } ?>

                            </select></div>
                        <div class="col text-center align-self-end mb-2">
                            <button class="btn btn-success text-uppercase" type="submit" style="border-radius: 16px;">Solicitar horários</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>