<div class="container">
    <div class="modal" id="modal_modify" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white font-weight-light">Fiókhoz tartozó adatok módosítása</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="ml-1" for="confirm">Felhasználónév:</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" disabled />
                        <small class="text-muted ml-2">Nem módosítható.</small>
                    </div>

                    <div class="form-group">
                        <label class="ml-1" for="email">Email cím:</label>
                        <input type="email" id="email" class="form-control" />
                        <small class="text-muted ml-2">Email formátum kötelező.</small>
                        <div class="invalid-feedback email-error ml-2">A mező kitöltése kötelező.</div>
                    </div>

                    <div class="form-group">
                        <label class="ml-1" for="password">Új jelszó:</label>
                        <input type="password" id="password" class="form-control" />
                        <small class="text-muted ml-2">Minimum 6 karakter.</small>
                        <div class="invalid-feedback password-error ml-2">A mező kitöltése kötelező.</div>
                    </div>

                    <div class="form-group mb-0">
                        <label class="ml-1" for="confirm">Régi jelszó megerősítése:</label>
                        <input type="password" id="confirm" class="form-control" />
                        <div class="invalid-feedback confirm-error ml-2">A mező kitöltése kötelező.</div>
                    </div>
                    
                </div>
                <div class="text-center" id="modify-footer">
                    <div class="alert alert-success alert-lg text-center border ml-4 mr-4" hidden id="successedModify" role="alert">
                        Sikeres Módosítás.
                    </div>

                    <div class="alert alert-danger alert-lg text-center border ml-4 mr-4" hidden id="failedModify" role="alert">
                        Sikertelen Módosítás.
                    </div>

                    <a class="btn text-white mb-3" type="button" id="modify-btn">Módosítás</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../regex.js"></script>
    <script src="change_data/modify.js"></script>
</div>