<?php
include '../common/head.php';
?>

<script src="admin_modal.js" defer></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-2 d-none d-md-block" style="border-right: 1px solid gray; height: 750px">

            <div class="row py-5"></div>
            <div class="row pb-5"></div>
            <div class="row pb-5"></div>


            <div class="row my-5 mx-auto">
                <div class="col-12 ">
                    <a class="btn btn-outline-primary" href="view_req.php">View suppliers request</a>
                </div>
            </div>

            <div class="row my-5 mx-auto">
                <div class="col-12">
                    <a class="btn btn-outline-primary" href="view_prods.php">View products</a>
                </div>
            </div>

            <div class="row my-5 mx-auto">
                <div class="col-12">
                    <a class="btn btn-outline-primary" href="view_users.php">View users</a>
                </div>
            </div>
        </div>
        <div class="col-9 ms-5 my-5">
            <div class="row my-5"></div>
            <div class="row mb-4">
                <h2 class="text-center">Users</h2>
            </div>
            <div class="row">
                <form action="">
                    <div class="col-8 col-md-4">
                        <input class="form-control" placeholder="Search">
                    </div>
                </form>
            </div>
            <div class="row">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">#1</th>
                            <td>
                                <div class="row">
                                    <div class="col-7">Zé das bananas</div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="1"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></button>
                                    </div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <th scope="row">#2</th>
                            <td>
                                <div class="row">
                                    <div class="col-7">Luís das beterrabas</div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="2"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">#3</th>
                            <td>
                                <div class="row">
                                    <div class="col-7">André dos pêssegos</div>
                                    <div class="col-5">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="3"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">#4</th>
                            <td>
                                <div class="row">
                                    <div class="col-7">Ricardo das ananonas</div>
                                    <div class="col-5">                                   
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="4"><i class="bi bi-trash"></i></button>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <a class="btn btn-primary" href="dashboard.php"><i class="bi bi-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Deleting user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure that you want to delete this user?</p>
        <p id="user_id" class="fw-bold text-center"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>


<?php include '../common/end.php' ?>