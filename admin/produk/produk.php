
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <title>Hello, world!</title>
    <style>
        .pbeli{
            background-color: rgb(255, 255, 255);
            text-align: center;
            width: auto;
            margin: 1rem auto;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
            font-family: 'Roboto Mono', monospace;
        }
        .menu-produk{
          margin: 1rem auto;
          padding: 2rem;
          border-radius: 10px;
        }
        .container-kategori{
          border-radius: 10px;
        }
        .page1{
            background-color: rgb(255, 255, 255);
            text-align: center;
            width: auto;
            margin: 1rem auto;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
        }
        .footer1{
          background-color: white;
          text-align: center;
          padding: 1rem auto;
        }
        .linkfooter{
          text-align: left;
        }
        .chart-container {
    width: 50%;
    height: 50%;
    margin: auto;
  }
            </style>
            
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light sticky-top">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">

                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                            <i class="bi-house fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="./produk/produk.php" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                            <i class="bi bi-bag fs-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                            <i class="bi-table fs-1"></i>
                        </a>
                    </li>

                    <li>
                        <a href="./chat.html" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                            <i class="bi-people fs-1"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle h2"></i>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <!-- content -->

            <!-- text -->
            <div class="container">
            <a href="tambah.php" type="button" class="btn btn-primary">Tambah Produk</a>
            </div>


<div class="pbeli container shadow-lg">
<table class="table">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama</th>
      <th scope="col">harga</th>
      <th scope="col">deskripsi</th>
      <th scope="col">stock</th>
      <th scope="col">Kategori</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include "../koneksi.php";
        $query = "SELECT * FROM produk";
        $data = $conn->prepare($query);
        $data->execute();
        ?>
        <?php 
        while($data_produk = $data->fetch()){
          ?>
    
    <tr>
      <th scope="row">1</th>
      <td><?= $data_produk['nama'];?></td>
      <td><?= $data_produk['harga'];?></td>
      <td><?= $data_produk['deskripsi'];?></td>
      <td><?= $data_produk['stock'];?></td>
      <td>
      <?php
        $data_id_kategori = $data_produk['kategori']; 
        $queryy = "SELECT * FROM kategori WHERE id = $data_id_kategori";
        $data_kategori = $conn->prepare($queryy);
        $data_kategori->execute();
        $statkategori = $data_kategori->fetch(PDO::FETCH_ASSOC);
        echo $statkategori['kategori'];
        ?>
      </td>
      <td><img src="../../gambarproduk/<?php echo $data_produk['img']?>" style="width: 60px;"></td>
      <td>
      <button type="button" class="btn btn-primary">Edit</button>
      <a href="hapus.php?id=<?php echo $data_produk['id'] ?>" type="button" class="btn btn-danger" >Hapus</a>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
   </div>



    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
    </script>
    <script>
          const ctx = document.getElementById("chart").getContext('2d');
          const myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["sunday", "monday", "tuesday",
              "wednesday", "thursday", "friday", "saturday"],
              datasets: [{
                label: 'Last week',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [3000, 4000, 2000, 5000, 200, 700, 500],
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true,
                  }
                }]
              }
            },
          });
    </script>
      </div>

   </div>
        </div>

    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>