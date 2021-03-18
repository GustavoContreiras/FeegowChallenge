<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 text-center text-md-end mb-2 mb-md-0 align-self-center">
            <span>Buscar por</span>
        </div>
        <div class="col-12 col-md-4 ">

            <select class="form-select" onchange="return onSelectSpecialty(this.value);">
                <option value="" selected>Selecione a especialidade</option>
                
                <?php foreach (get_specialties() as $specialty) { 
                    echo '<option value="'.$specialty['especialidade_id'].'">'.$specialty['nome'].'</option>';
                } ?>

            </select>
        </div>
        <div class="col-12 col-md-4 ">
            <!--<button class="btn btn-success text-uppercase" type="button" style="border-radius: 16px;">Buscar</button>-->
        </div>
    </div>
</div>