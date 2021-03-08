<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

  <title>Title of the document</title>
</head>

<body>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <div class="container">

    <div class="pt-4 my-md-5 pt-md-5 border-bottom">
      <h2><b> Create Coupon</b></h2>
    </div>

    <div class="row">
      <div id="imagesContainer" class="col-sm-8">
        <div class="image-upload">
          <label for="file-input">
            <img src="genericAddImage" class="img-fluid" />
          </label>
          <input id="file-input" type="file" class="invisible" />
        </div>

      </div>
      <div id="DataContainer" class="col-md-4 mt-5">
        <h5><b>Coupon Name</b></h5>
        <div class="row mt-5">
        <div class="col">
        <i class="text-muted">discount</i>
        <h6 class="text-muted">50.2</h6>
        </div>
        <div class="col">
        <div class="col-auto my-1">

          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option selected>%</option>
            <option value="€">€</option>
          </select>
        </div>
      </div>
        </div>
        </div>
        

      <div class="row">
        <div id="DescriptionContainer" class="col-sm-6">
          <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" rows="5"></textarea>
          </div>
        </div>
        <div id="OtherInformationContainer" class="col-sm-6">
          <div class="form-group row">
            <b>
              <label for="Coupon expire date" class="col-2 col-form-label">Date</label>
            </b>
            <div class="col-10">
              <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
            </div>
          </div>
          <div class="form-group row">
            <b>
              <label for="Coupon Code" class="col-2 col-form-label">Code</label>
            </b>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="code" id="example-search-input">
            </div>
          </div>
        </div>
      </div>



      <div class="row">
        <div id="deleteProductContainer" class="float-end">
          <p>Delete Coupon <i class="bi bi-trash"></i></p>
        </div>

        <div id="confirmContainer" class="text-center">
          <button type="button" class="btn btn-light">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>