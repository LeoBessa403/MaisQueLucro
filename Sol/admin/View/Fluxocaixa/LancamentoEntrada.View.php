<!-- Modal Bill pay -->
<div class="modal fade" id="lancEntrada" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content bg-color-green">
            <div class="modal-header d-block">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="bi bi-receipt-cutoff h5 avatar avatar-40 rounded"></i>
                    </div>
                    <div class="col">
                        <h6 class="fw-medium mb-0">Entrada</h6>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <h6 class="fw-medium mb-2">Pay Bill From:</h6>
                <div class="row mb-2">
                    <div class="col-12 col-md-6 mb-2">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-cash"></i></span>
                            <select class=" form-control simplechosen">
                                <option selected>Wallet</option>
                                <option>Bank</option>
                                <option>Crypto</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-bank"></i></span>
                            <select class="form-control simplechosen">
                                <option>CA Bank</option>
                                <option>Larson Bank</option>
                                <option>Truelance Bank</option>
                                <option selected>Cabilian Bank</option>
                            </select>
                        </div>
                    </div>
                </div>
                <p class="text-secondary small mb-4">Balance: 966800.00 USD</p>

                <h6 class="fw-medium mb-2">Bill Information Money to:</h6>
                <div class="row align-items-center mb-2">
                    <div class="col-12 col-md-6 mb-2">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-map"></i></span>
                            <select class="form-control simplechosen">
                                <option selected>United States</option>
                                <option>United Kingdom</option>
                                <option>Russia</option>
                                <option>Australia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-signpost"></i></span>
                            <select class=" form-control simplechosen">
                                <option selected>New York</option>
                                <option>New Jersey</option>
                                <option>Los Angeles</option>
                                <option>Chicago</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mb-2">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-bank"></i></span>
                            <input class="form-control" type="text" placeholder="Consumer ID">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <div class="input-group input-group-md rounded">
                            <span class="input-group-text text-theme"><i class="bi bi-phone"></i></span>
                            <input class="form-control" type="text" placeholder="Consumer name">
                        </div>
                    </div>
                </div>
                <p class="text-center text-secondary mb-2">Bill Amount</p>
                <input class="form-control amount-input text-center" type="text" placeholder="0.00" value="1500.00">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme w-100">Pay now</button>
            </div>
        </div>
    </div>
</div>