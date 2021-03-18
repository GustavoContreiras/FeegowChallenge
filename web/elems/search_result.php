<div class="col-auto mt-3 d-none" professional-id="<?php echo $professional_id ?>" specialty-id="<?php echo $specialty_id ?>">
    <div class="bg-light py-2 px-0" style="width: 300px;box-shadow: 1px 1px 20px 0px;border-radius: 15px;border-width: 0px;border-style: solid;">
        <div class="row g-0 align-items-center">
            <div class="col-3 px-2"><img class="border rounded-pill border-dark" src="assets/img/blank-avatar.png" width="64px" height="64px" alt="Foto"></div>
            <div class="col-9 px-2">
                <div class="row g-0">
                    <div class="col-auto" style="overflow:hidden; text-overflow:ellipsis;">
                        <span><strong><?php echo $nome ?></strong></span>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-auto" style="overflow:hidden; text-overflow:ellipsis;">
                        <span class="text-secondary">CRM <?php echo $crm ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0 justify-content-center mt-2">
            <div class="col-auto"><button class="btn btn-success text-uppercase" type="button" style="border-radius: 16px;" onclick="return showModal(event);">Agendar</button></div>
        </div>
    </div>
</div>