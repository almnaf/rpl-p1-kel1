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
    <?php include "editModal3.php" ?>
    <div class="text">
        <p>
        <h2>Catat Tabunganmu</h2>
        </p>
    </div>
    <?php
    if (isset($_POST["submit"])) {
        if (!isset($_POST["hidden"])) {
            $title = $_POST["title"];
            $target = $_POST["target"];
            $current = $_POST["current"];
            $desc = $_POST["desc"];
            $sql = "INSERT INTO `notes3`(`title`, `target`, `current`, `description`) VALUES ('$title', '$target', '$current', '$desc')";
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
                        <label for="target" class="form-label">Target Tabungan</label>
                        <input type="text" class="form-control" id="target" placeholder="Masukkan Target..." name="target" required>
                    </div>

                    <div class="mb-3">
                        <label for="current" class="form-label">Jumlah Saat Ini</label>
                        <input type="text" class="form-control" id="current" placeholder="Masukkan Jumlah Tabungan Sekarang..." name="current" required>
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
                                <button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal" id="' . $fetch["sno"] . '"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</button>
                                <a href="delete3.php?id=' . $fetch["sno"] . '" class="btn btn-danger"><i class="bi bi-trash"></i>&nbsp;&nbsp;Delete</a>
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