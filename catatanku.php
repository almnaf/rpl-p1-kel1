<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .form {
            border: 1.5px solid #ced4da;
            padding: 1rem;
            border-radius: 8px;
        }

        .text {
            text-align: center;
            padding: 10px 20px;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
        }

        .d-flex {
            text-align: center;
            margin:auto;
            width: 73%;
            padding-top: 35px;
            padding-bottom: 5px;
        }


        :target::before {
            content: "";
            display: block;
            height: 90px;
            /* fixed header height*/
            margin: -90px 0 0;
            /* negative fixed header height */
        }
    </style>
    <title>CataKu | Catatan Keuanganku</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <?php include "db.php" ?>
    <div class="text">
        <p>
        <h2><i class="bi bi-journal-text"></i>&nbsp;Catatanku</h2>
        </p>
    </div>

    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="Search" id="search">
      <button class="btn btn-outline-success" type="submit" id="searchbtn"><i class="bi bi-search"></i></button>
    </form>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 mt-3">
                <h1>Keuanganku</h1>
                <?php
                $sql = "SELECT * FROM `notes`";
                $res = mysqli_query($conn, $sql);
                $noNotes = true;
                while ($fetch = mysqli_fetch_assoc($res)) {
                    $noNotes = false;
                    $number = $fetch["amount"];
                    $formattedNum = number_format($number);
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h4 class="card-title">' . $fetch["title"] . '</h4> <br>
                                <p class="card-text">Rp ' . $formattedNum . '</p>
                                <p class="card-text">Sumber : ' . $fetch["source"] . '</p>
                                <p class="card-text">"' . $fetch["description"] . '"</p>
                                <a href="keuangan.php#1" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</a>
                                <a href="delete.php?id=' . $fetch["sno"] . '" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;Delete</a>
                            </div>
                        </div>';
                }
                if ($noNotes) {
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h4 class="card-title">Pesan</h4>
                                <p class="card-text">Belum ada catatan yang dibuat.</p>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>Hutangku</h1>
                <?php
                $sql = "SELECT * FROM `notes2`";
                $res = mysqli_query($conn, $sql);
                $noNotes = true;
                while ($fetch = mysqli_fetch_assoc($res)) {
                    $noNotes = false;
                    $number = $fetch["amount"];
                    $formattedNum = number_format($number);
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h4 class="card-title">' . $fetch["title"] . '</h4> <br>
                                <p class="card-text">Rp ' . $formattedNum . '</p>
                                <p class="card-text">Hutang Ke : ' . $fetch["lender"] . '</p>
                                <p class="card-text">Jatuh Tempo : ' . $fetch["duedate"] . '</p>
                                <p class="card-text">"' . $fetch["description"] . '"</p>
                                <a href="hutang.php#1" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</a>
                                <a href="delete2.php?id=' . $fetch["sno"] . '" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;Delete</a>
                            </div>
                        </div>';
                }
                if ($noNotes) {
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h4 class="card-title">Pesan</h4>
                                <p class="card-text">Belum ada catatan yang dibuat.</p>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>Tabunganku</h1>
                <?php
                $sql = "SELECT * FROM `notes3`";
                $res = mysqli_query($conn, $sql);
                $noNotes = true;
                while ($fetch = mysqli_fetch_assoc($res)) {
                    $noNotes = false;
                    $number1 = $fetch["target"];
                    $formattedNum1 = number_format($number1);
                    $number2 = $fetch["current"];
                    $formattedNum2 = number_format($number2);
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h4 class="card-title">' . $fetch["title"] . '</h4> <br>
                                <p class="card-text"><strong>Target </strong>: Rp ' . $formattedNum1 . '</p>
                                <p class="card-text">Terkumpul : Rp ' . $formattedNum2 . '</p>
                                <p class="card-text">(' . round((($number2 * 100)/$number1),2) . '% dari target)</p>
                                <p class="card-text">"' . $fetch["description"] . '"</p>
                                <a href="tabungan.php#1" class="btn btn-primary"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</a>
                                <a href="delete3.php?id=' . $fetch["sno"] . '" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;Delete</a>
                            </div>
                        </div>';
                }
                if ($noNotes) {
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <h4 class="card-title">Pesan</h4>
                                <p class="card-text">Belum ada catatan yang dibuat.</p>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        const search=document.getElementById('search');
        const cardBody = document.querySelectorAll(".card-body");
        search.addEventListener("input", ()=>{
            const value=search.value.toLowerCase();
            cardBody.forEach(element => {
                const titleText = element.children[0].innerText.toLowerCase();
                if(titleText.includes(value)){
                    element.parentElement.style.display="block";
                }
                else{
                    element.parentElement.parentElement.style.display="none";
                }
            });
        })

    </script>

</body>

</html>