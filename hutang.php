<?php

session_start();

if(!isset($_SESSION['login'])){
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
            border: 1.4px solid #ced4da;
            padding: 1rem;
            border-radius: 8px;
        }

        .text {
            text-align: center;
            padding: 10px 20px;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
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
    <?php include "editModal2.php" ?>
    <div class="text">
        <p>
        <h2>Catat Hutangmu</h2>
        </p>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        if (!isset($_POST["hidden"])) {
            $title = $_POST["title"];
            $amount = $_POST["amount"];
            $lender = $_POST["lender"];
            $duedate = $_POST["duedate"];
            $desc = $_POST["desc"];
            // $sql = "INSERT INTO `notes`(`title`, `description`) VALUES ('$title','$desc')";
            $sql = "INSERT INTO `notes2`(`title`, `amount`, `lender`, `duedate`, `description`) VALUES ('$title', '$amount', '$lender', '$duedate', '$desc')";
            $res = mysqli_query($conn, $sql);
        }
    }
    ?>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" placeholder="Masukkan Judul..." name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah Hutang</label>
                        <input type="text" class="form-control" id="amount" placeholder="Masukkan Jumlah..." name="amount" required>
                    </div>

                    <div class="mb-3">
                        <label for="lender" class="form-label">Nama Pemberi Pinjaman</label>
                        <input type="text" class="form-control" id="lender" placeholder="Masukkan Peminjam..." name="lender" required>
                    </div>

                    <div class="mb-3">
                        <label for="duedate" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="duedate" placeholder=date name="duedate" required>
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="desc" rows="3" placeholder="Masukkan Deskripsi..." name="desc" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-plus-square"></i>&nbsp;&nbsp;Add Note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container" id="1">
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
                                <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal" id="' . $fetch["sno"] . '"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</button>
                                <a href="delete2.php?id=' . $fetch["sno"] . '" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;Delete</a>
                            </div>
                        </div>';
                }
                if ($noNotes) {
                    echo '
                        <div class="card my-3 position-static">
                            <div class="card-body">
                                <h5 class="card-title">Pesan</h5>
                                <p class="card-text">Belum ada catatan yang dibuat.</p>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        const edit = document.querySelectorAll(".edit");
        const editTitle = document.getElementById("edittitle");
        const editdesc = document.getElementById("editdesc");
        const hiddenInput = document.getElementById("hidden");
        edit.forEach(element => {
            element.addEventListener("click", () => {
                hiddenInput.value = element.id;
                console.log(hiddenInput);
            });
        });
    </script>

</body>

</html>