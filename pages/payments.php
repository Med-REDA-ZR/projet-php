<main class="main-content">
    <div class="app-loader"><i class="icofont-spinner-alt-4 rotate"></i></div>
    <div class="main-content-wrap">
        <header class="page-header">
            <h1 class="page-title">Payments</h1>
        </header>
        <div class="page-content">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover data-table dataTable no-footer" data-searching="true" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">Bill NO</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Doctor</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Charge</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cnx->query('SELECT pay.* , pat.name_pat , dr.name_dr FROM payments as pay INNER JOIN patients as pat ON (pay.id_pat=pat.id_pat) INNER JOIN doctors as dr ON (pay.id_dr=dr.id_dr);') as $f) { ?>
                                    <tr>
                                    <?php
                                        $disc_choices = array(54, 75, 85, 100, 65, 90, 120);
                                        $disc = $disc_choices[array_rand($disc_choices)];

                                        $total = $f['total'];

                                        $Chrg = ($total + $disc) / (11 / 10);
                                        $Chrg = number_format($Chrg, 2);
                                        ?>
                                            
                                        <td>
                                            <div class="text-muted"><?= $f['id_pay'] ?></div>
                                        </td>
                                        <td><strong><?= $f['name_pat'] ?></strong></td>
                                        <td><strong class="text-nowrap"><?= $f['name_dr'] ?></strong></td>
                                        <td>
                                            <div class="text-nowrap text-muted"><?= $f['date_pay'] ?></div>
                                        </td>
                                        <td><?= $Chrg ?></td>
                                        <td>10%</td>
                                        <td><?= $disc ?></td>
                                        <td><?= $f['total'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="add-action-box"><button class="btn btn-primary btn-lg btn-square rounded-pill" data-bs-toggle="modal" data-bs-target="#add-payment"><span ><i class="fa-solid fa-file-invoice-dollar"></i></span></button></div>
        </div>
    </div>
</main>
<div class="modal fade" id="add-payment" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="../assets/include/script.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add new payment</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="selectpicker namePat" data-live-search="true" placeholder="Name Patient" name="id_app">
                            <?php foreach ($cnx->query('SELECT app.id_app, pat.name_pat FROM `appoiments`as app INNER JOIN patients as pat on (app.id_pat=pat.id_pat)') as $app) { ?>
                                <option value="<?= $app['id_app'] ?>"> #<?= $app['id_app'] ?> - <?= $app['name_pat'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" placeholder="Date" name="date_pay">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="" placeholder="Charges" name="charg_pay" id="charg_pay">
                    </div>
                    <div class="row">
                        <div class="col sm-8">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Tax %" value="10" name="tax_pay" id="tax_pay" readonly>
                            </div>
                        </div>
                        <div class="col sm-4 mt-2">
                            <span>%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Discount" name="disc_pay" id="disc_pay">
                    </div>
                    <div class="form-group mb-0">
                        <input class="form-control" type="text" placeholder="Total" name="total_pay" id="total_pay" readonly>
                    </div>

                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary btn_ajouter" name="add_pay">Add payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Calculate the total amount based on charges, tax, and discount
    function calculateTotal() {
        var charges = parseFloat($('#charg_pay').val());
        var tax = parseFloat($('#tax_pay').val());
        var discount = parseFloat($('#disc_pay').val());

        var taxAmount = charges * (tax / 100);
        var total = (charges - discount) + taxAmount;

        $('#total_pay').val(total.toFixed(2));
    }

    // Update total when input values change
    $('#charg_pay, #tax_pay, #disc_pay').on('input', calculateTotal);
</script>