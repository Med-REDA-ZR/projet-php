<main class="main-content">
    <div class="app-loader">
        <i class="icofont-spinner-alt-4 rotate"></i>
    </div>
    <div class="main-content-wrap">
        <header class="page-header">
            <h1 class="page-title">Departments</h1>
        </header>
        <form action="./assets/include/script.php" method="POST">
            <div class="page-content">
                <div class="row">
                    <?php foreach( $cnx->query('select dr.profile_dr, dep.name_dep, dep.id_dep, dep.desc_dep , dep.photo_dep  from department as dep 
                                            INNER JOIN doctors as dr on (dep.id_dr = dr.id_dr);') as $m) { ?>
                        <div class="col-12 col-md-4">
                            <div class="card department bg-light bg-gradient">
                                <img src="../assets/img/profils/<?=$m['photo_dep']?>" class="card-img-top" width="400" height="350" alt="<?=$m['photo_dep']?>">
                                <div class="card-body">
                                    <h3 class="h4 mt-0"><?=$m['name_dep']?></h3>
                                    <div class="team d-flex align-items-center mb-4">
                                        <strong class="me-3">Team:</strong>
                                        <img src="../assets/img/profils/<?=$m['profile_dr']?>" width="40" height="40" alt=""
                                            class="team-img rounded-500">
                                        <img src="../assets/img/profils/<?=$m['profile_dr']?>" width="40" height="40" alt=""
                                            class="team-img rounded-500">
                                        <img src="../assets/img/profils/<?=$m['profile_dr']?>" width="40" height="40" alt=""
                                            class="team-img rounded-500">
                                        <button class="btn btn-primary btn-square rounded-pill" type="button">
                                            <span class="fa fa-plus"></span></button>
                                    </div>

                                    <p><?=$m['desc_dep']?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                        
            </div>

        </form>


    </div>
    <div class="add-action-box">
        <button class="btn btn-primary btn-lg btn-square rounded-pill" data-bs-toggle="modal"
            data-bs-target="#add-department">
            <span class="btn-icon"></span>
            <i class="fa-regular fa-building"></i>
        </button>
    </div>
    </div>
</main>



<!-- Add department modals -->
<div class="modal fade" id="add-department" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new Department</h5>
            </div>
            <form action="../assets/include/script.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group avatar-box d-flex">
                                <img src="../assets/img/profils/" width="40" height="40" alt=""
                                    class="rounded-500 me-4">
                                <input type="file" name="image" id="image"> </input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control " name="name_dep" type="text" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <select class="selectpicker" data-live-search="true" multiple="multiple" name="id_dr"
                            tabindex="null">
                            <?php foreach ($cnx->query('select id_dr,name_dr from doctors') as $dr){ ?>
                            <option value="<?= $dr['id_dr'] ?>"><?= $dr['name_dr'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group mb-0"><textarea class="form-control" name="desc_dep"
                            placeholder="With placeholder" rows="4"></textarea></div>
                </div>
                <div class="modal-footer d-block">
                    <div class="actions justify-content-between">
                        <button type="button" class="btn btn-error" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary add_dep" name="add_dep">ajouer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Add department modals -->