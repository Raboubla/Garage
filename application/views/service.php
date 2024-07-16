<?php include 'header.php' ?>
<main role="main" >
    <!-- Hero -->
    <div class="content-space-t-lg-1 lib-hero overflow-hidden text-black-50">
        <div class="container position-relative content-space-t-3 content-space-b-2">
            <div class="col-lg-6 grid-margin stretch-card w-100" style=" margin-bottom: 8%;">
                <div class="col-md-5" style="margin-left: 35%;">
                    <form class="form">
                        <p class="text-black-50 titles" style="font-family: 'Oxanium', sans-serif; font-size: 29px;">Rendez-vous</p>
                        <label>Date et heure 
                                <input required="" placeholder="" type="datetime-local" class="input">
                            </label>
                        <label for="serviceType" class="form-label">Type de service</label>
                        <select id="serviceType" class="form-select" required>
                            <option selected disabled value="">Choisissez un service...</option>
                            <option value="service1">Service 1</option>
                            <option value="service2">Service 2</option>
                            <option value="service3">Service 3</option>
                        </select>

                        <button type="submit" class="btn btn-outline-primary placeholder-wave rounded rounded-1">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Pricing -->
    <!-- FAQ -->
    <!-- End FAQ -->
  <?php include 'footer.php'?>
