<main class="main-content">
                    <div class="main-content-wrap">
                        <div class="page-content">
                            <div class="row">
                                <div class="col col-12 col-md-6 col-xl-3">
                                    <div class="card animated fadeInUp delay-01s bg-light">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                            <?php
                                                foreach ($cnx->query('SELECT COUNT(*) AS totalrows FROM appoiments') as $v) { ?>
                                                <div class="col col-5">
                                                    <div class="icon p-0 fs-48 text-primary opacity-50">
                                                        <i class="fa-solid fa-stethoscope fa-xl" style="color: #5993f7;"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-7">
                                                    <h6 class="mt-0 mb-1">Appointments</h6>
                                                <div class="count text-primary fs-20"><?= $v['totalrows'] ?></div>
                                        </div>
                                    </div>
                                
                                            <?php
                                            }
                                            ?>

                            </div>
                            </div>
                            </div>
                                <div class="col col-12 col-md-6 col-xl-3">
                                <div class="card animated fadeInUp delay-02s bg-light">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                        <?php
                            foreach ($cnx->query('SELECT COUNT(*) AS totalrows FROM patients') as $v) { ?>
                                            <div class="col col-5">
                                                <div class="icon p-0 fs-48 text-primary opacity-50 "><i class="fa-solid fa-truck-medical fa-xl" style="color: #5993f7;"></i>
                                                </div>
                                            </div>
                                            <div class="col col-7">
                                                
                                                <h6 class="mt-0 mb-1">Patients</h6>
                                                <div class="count text-primary fs-20"><?= $v['totalrows'] ?></div>
                                            </div>
                                        </div>
                                        <?php
                                          }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-3">
                                <div class="card animated fadeInUp delay-03s bg-light">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col col-5">
                                                <div class="icon p-0 fs-48 text-primary opacity-50 "><i class="fa-solid fa-bed-pulse fa-xl" style="color: #5993f7;"></i>

                                                </div>
                                            </div>
                                            <div class="col col-7">
                                                <h6 class="mt-0 mb-1">Operations</h6>
                                                <div class="count text-primary fs-20">24</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col col-12 col-md-6 col-xl-3">
                                <div class="card animated fadeInUp delay-04s bg-light">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                        <?php
                                        foreach ($cnx->query('SELECT COUNT(*) AS totalrows FROM doctors') as $v) { ?>
                                            <div class="col col-5">
                                                <div class="icon p-0 fs-48 text-primary opacity-50 "><i class="fa-solid fa-user-doctor fa-xl" style="color: #5993f7;"></i>
                                                </div>
                                            </div>
                                            <div class="col col-7">
                                                <h6 class="mt-0 mb-1 text-nowrap">Doctors</h6>
                                                <div class="count text-primary fs-20"><?= $v['totalrows'] ?></div>
                                            </div>
                                           </div>
                                        <?php
                                          }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div> 
                         
                        <div class="col col-12 col-md-6 col-xl-8">
                            <div class="card-body">
                            <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="linearChartjs" style="display: block; height: 216px; width: 432px;" width="540" height="270" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                                <div class="card mb-0">
                                    <div class="card-header">Today appointments</div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                            <form action="./assets/include/script.php" method="GET">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Patient</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Date </th>
                                                    <th scope="col">Visit time</th>
                                                    <th scope="col">Injury </th>
                                                    <th scope="col">Doctor</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                <tbody>
                                <?php $today=date('y-m-d') ; foreach( $cnx->query("select p.name_pat , p.phone_pat, app.id_app, app.date_app , app.time_app ,app.injury , dr.name_dr , dep.name_dep 
                                                    from appoiments as app 
                                                    INNER JOIN patients as p on (app.id_pat = p.id_pat) 
                                                    INNER JOIN doctors as dr on (app.id_dr = dr.id_dr) 
                                                    INNER JOIN department as dep on (app.id_dep = dep.id_dep) where app.date_app ='$today'   ORDER BY app.time_app DESC
                                                    LIMIT 7") as $v) { ?>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center nowrap text-primary"><?= $v['id_app'] ?></div>
                                                            </td>
                                                            <td><strong><?=$v['name_pat']?> </strong></td>
                                                            <td>
                                                              <div class="d-flex align-items-center nowrap text-primary"><?=$v['phone_pat']?> </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-muted text-nowrap"><?=$v['date_app']?></div>
                                                            </td>
                                                            <td>
                                                                <div class="text-muted text-nowrap"><?=$v['time_app']?></div>
                                                            </td>
                                                            <td><?=$v['injury']?></td>
                                                            <td><?=$v['name_dr']?></td>
                                                            <td><?=$v['name_dep']?></td>
                                                            <td>
                                                                <span  style="background-color: #4CAF50;" class="badge ">Today</span>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>      
                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>