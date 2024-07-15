<?php include 'header.php'?>
        <main role="main">
            <!-- Hero -->
            <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
                <div class="container position-relative content-space-t-3 content-space-b-2">
                    <div class="col-lg-6 grid-margin stretch-card w-100" style=" margin-bottom: 8%;">
                        <div class="col-md-5" style="margin-left: 35%;">
                            <form class="form">
                                <p class="text-black-50 title" style="font-family: 'Oxanium', sans-serif; font-size: 29px;">Créer ou modifier</p> 
                                <label>
                                    <input required="" placeholder="" type="text" class="input"><span>Nom du service</span>
                                </label>
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input"><span>Durée</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="text" class="input"><span>Montant</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-outline-primary placeholder-wave rounded rounded-1">Valider</button>                                 
                            </form>                             
                        </div>
                    </div>
                    <div class="col-lg-6 grid-margin stretch-card w-100">
                        <div class="card-body">
                            <h4 class="card-title text-black-50" style="font-family: 'Oxanium', sans-serif; font-size: 42px;">Liste des services</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning-emphasis">
                                        <tr class="text-primary-emphasis">
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Nom</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Temps de realisation</th>
                                            <th style="font-family: 'Titillium Web', sans-serif; font-size: 19px;" class="fw-bold">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Reparation Simple</td>
                                            <td>1 <span>heures</span></td>
                                            <td class="text-danger"><span>Ar</span> 15000</td>
                                            <td style="width: 25%;"> <a class="btn btn-light btn-outline-primary placeholder-wave rounded rounded-1" href="#">Modifier</a><a class="btn btn-danger btn-outline-light placeholder-wave rounded rounded-1 text-white" href="#">Supprimer</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
</div>
                    </div>
                </div>
            </div>
            <!-- End Pricing -->
            <!-- FAQ -->
            <!-- End FAQ -->
        </main>
        <?php include 'footer.php'?>
