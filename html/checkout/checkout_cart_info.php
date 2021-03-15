<?php
include_once '../common/extras.php';
include_once 'checkout_inc_cart.php';
pageHeader("MyGarden - Cart");
navbar();
?>

<div class="container">

    <div class="col-12">

        <div class="row">
            <div class="row m-3"></div>
            <!-- Breadcrumb  -->
            <div class="d-flex justify-content-center">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" id="selectedLink" aria-current="page">Information</li>
                        <li class="breadcrumb-item"><a href="checkout_shipping_payment.php" style="text-decoration: none; color: black;">Shipping / Payment</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row m-3"></div>

        </div>

        <div class="col order-1">
            <?php orderSummary(3); ?>
        </div>

        <div class="col order-6">
            <div class="row ">
                <?php

                for ($i = 0; $i < 5; $i++) {
                    cartProduct(
                        "bananas",
                        1,
                        2
                    );
                }
                ?>
            </div>
        </div>

        <div class="row m-3"></div>

        <div class="row">

            <!-- Periodic Buys -->
            <div class="col-12 col-lg-12 order-2">
                <div class="row">

                    <div class="col"></div>

                    <div class="col-12 col-lg-12">

                        <div class="row">
                            <h3 style='text-align:left;border-bottom:2px solid black;'>Periodic Buys <button type="button" class="simpleicon">history</button></h3>
                        </div>

                        <div class="row mb-3"></div>

                        <div class="row">

                            <ul class="nav nav-pills mb-3 d-flex justify-content-evenly" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <label for="male" data-bs-toggle="pill" data-bs-target="#pills-once">Once</label>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <label for="male" data-bs-toggle="pill" data-bs-target="#pills-daily">Daily</label>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <label for="female" data-bs-toggle="pill" data-bs-target="#pills-weekly">Weekly</label>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <label for="other" data-bs-toggle="pill" data-bs-target="#pills-monthly">Monthly</label>
                                </li>
                            </ul>

                            <div class="row mb-3"></div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade text-center" id="pills-once" role="tabpanel" aria-labelledby="pills-once-tab">One time purchase</div>
                                <div class="tab-pane fade text-center" id="pills-daily" role="tabpanel" aria-labelledby="pills-daily-tab">Daily purchase the products in this cart</div>
                                <div class="tab-pane fade text-center" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                                    <input type="radio" id="monday" name="gender" value="monday" class="d-none">
                                    <label for="monday">Monday</label><br>
                                    <input type="radio" id="tuesday" name="gender" value="tuesday" class="d-none">
                                    <label for="tuesday">Tuesday</label><br>
                                    <input type="radio" id="wednesday" name="gender" value="wednesday" class="d-none">
                                    <label for="wednesday">Wednesday</label><br>
                                    <input type="radio" id="thursday" name="gender" value="thursday" class="d-none">
                                    <label for="thursday">Thursday</label><br>
                                    <input type="radio" id="friday" name="gender" value="friday" class="d-none">
                                    <label for="friday">Friday</label><br>
                                    <input type="radio" id="saturday" name="gender" value="saturday" class="d-none">
                                    <label for="saturday">Saturday</label><br>
                                    <input type="radio" id="sunday" name="gender" value="sunday" class="d-none">
                                    <label for="sunday">Sunday</label><br>
                                </div>
                                <div class="tab-pane fade text-center" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                                    <label for="festa">Choose the day of the next delivery <br> All of the next deliveries will occur on the same day monthly</label>
                                    <div class="col-12 d-flex justify-content-center mt-2">
                                        <input type="date" id="festa" name="festa" min="<?= date('Y-m-d') ?>" max="<?php $dt2 = new DateTime("+1 month");
                                                                                                                    $date = $dt2->format("Y-m-d");
                                                                                                                    echo $date ?>" required>
                                    </div>
                                </div>
                            </div>



                            <!-- 
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
                                <button type="radio" id="simple-btt">Once</button>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
                                <button type="radio" id="simple-btt">Daily</button>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">

                                <button type="radio" id="simple-btt" data-bs-toggle="collapse" data-bs-target="#weekly">
                                    Weekly
                                </button>

                                <div class="collapse" id="weekly">
                                    <div class="card card-body">
                                        <div class="modal-body">

                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Monday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Monday">Monday </label>
                                            </div>

                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Thuesday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Thuesday">Thuesday </label>
                                            </div>
                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Wednesday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Wednesday">Wednesday </label>
                                            </div>
                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Thursday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Thursday">Thursday </label>
                                            </div>
                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Friday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Friday">Friday </label>
                                            </div>
                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Saturday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Saturday">Saturday </label>
                                            </div>
                                            <div class="row mb-1">
                                                <input type="radio" class="btn-check" name="options" id="Sunday" autocomplete="off">
                                                <label class="btn btn-secondary" for="Sunday">Sunday </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">

                                <button type="button" id="simple-btt" data-bs-toggle="collapse" data-bs-target="#monthly">
                                    Monthly
                                </button>

                                <div class="collapse" id="monthly">
                                    <div class="card card-body">
                                        <input class="form-control" type="date" id="example-date-input">

                                    </div>
                                </div>

                            </div> 
                            -->


                        </div>
                    </div>
                    <div class="col"></div>
                    <div class="row m-3"></div>
                </div>
            </div>

            <!-- Cupons -->
            <div class="col-12  col-lg-12 order-3">

                <div class="row">

                    <div class="col"></div>

                    <div class="col-12 col-lg-12">

                        <div class="row">
                            <h3 style='text-align:left;border-bottom:2px solid black;'>Cupons <button type="button" class="simpleicon">redeem</button></h3>
                        </div>

                        <div class="row mt-3"></div>

                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="CODE">
                            </div>
                            <div class="col-3 text-center">
                                <button type="button" class="simpleicon">add</button>
                            </div>
                        </div>

                        <div class="row mt-3"></div>

                        <div class="row row-cols-1 row-cols-md-2 g-4">

                            <?php
                            for ($i = 0; $i < 2; $i++) {
                                cuponCard(
                                    "SUMMER 2021",
                                    10,
                                    "2/5/2021",
                                );
                            }
                            ?>
                        </div>

                        <div class="row m-3"></div>

                    </div>
                    <div class="col"></div>

                    <div class="row m-3"></div>
                </div>
            </div>


        </div>


        <?php orderTotal(8.37); ?>


        <div class="col-12">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <a href="../checkout/checkout_shipping_payment.php">
                        <button type="button" class="btn btn-primary"> Continue</button>
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

<?php
footer();
?>