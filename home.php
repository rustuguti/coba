<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spare Part Kapal</title>
    <style>
        /* Reset and General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            background-image: url("g2.jpg");
            background-repeat:no-repeat;
            background-size :cover;
        }

        header, footer {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-buttons button {
            font-weight: bold;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .add-button {
            background-color: #28a745;
            color: white;
        }

        .add-button:hover {
            background-color: #218838;
        }

        .logout-button {
            background-color: #FF0000;
            color: white;
        }

        .logout-button:hover {
            background-color: #CC0000;
        }

        /* Table Styles */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.5); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 50%; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
        /* Form Inputs */
        input[type="text"], input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type="submit"], button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }

        h1 {
        color:white
        
        }
        .center {
            text-align: center;
        }
        footer {
             position: fixed; /* Memastikan footer tetap di bawah */
             left: 0;
             bottom: 0;
             width: 100%; /* Lebar penuh */
             text-align: center; /* Teks di tengah */
             padding: 10px 0; /* Ruang di atas dan bawah */
             background-color: #007BFF; /* Warna latar belakang footer */
             color: white; /* Warna teks */
        }
    </style>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target.className === 'modal') {
                closeModal(event.target.id);
            }
        }
    </script>
</head>
<body>
<header>
        <h1>Manajemen Spare Part Kapal</h1>
    </header>
    <!-- Top Buttons -->
    <div class="top-buttons">
        <button class="add-button" onclick="openModal('addModal')">Tambah</button>
        <button class="logout-button" onclick="location.href='logout.php'">Logout</button>
    </div>

    <!-- Data Table -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Alat</th>
            <th>Tahun</th>
            <th>Merek</th>
            <th>Nomor Seri</th>
            <th>Lokasi</th>
            <th>Aksi</th> 
        </tr>
        <?php
        include_once("config.php");
        $result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY id DESC");
        $i = 1;
        while ($user_data = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $user_data['nama_alat'] . "</td>";
            echo "<td>" . $user_data['tahun'] . "</td>";
            echo "<td>" . $user_data['merek'] . "</td>";   
            echo "<td>" . $user_data['nomor_seri'] . "</td>";   
            echo "<td>" . $user_data['lokasi'] . "</td>";    
            echo "<td>
                    <a href='javascript:void(0);' onclick=\"openModal('editModal" . $user_data['id'] . "')\">Edit</a> | 
                    <a href='javascript:void(0);' onclick=\"openModal('deleteModal" . $user_data['id'] . "')\">Delete</a>
                  </td>";
            echo "</tr>"; 
            $i++;       
        }
        ?>
    </table>

    <!-- Add Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addModal')">&times;</span>
            <h2>Tambah Alat</h2>
            <form action="add.php" method="post">
                <label>Nama Alat:</label>
                <input type="text" name="nama_alat" required>
                <label>Tahun:</label>
                <input type="text" name="tahun" required>
                <label>Merek:</label>
                <input type="text" name="merek" required>
                <label>Nomor Seri:</label>
                <input type="text" name="nomor_seri" required>
                <label>Lokasi:</label>
                <input type="text" name="lokasi" required>
                <input type="submit" value="Simpan">
            </form>
        </div>
    </div>

    <!-- Edit and Delete Modals -->
    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM barang ORDER BY id DESC");
    while ($user_data = mysqli_fetch_array($result)) {
    ?>
    <!-- Edit Modal -->
    <div id="editModal<?php echo $user_data['id']; ?>" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal<?php echo $user_data['id']; ?>')">&times;</span>
            <h2>Edit Alat</h2>
            <form action="edit.php?id=<?php echo $user_data['id']; ?>" method="post">
                <label>Nama Alat:</label>
                <input type="text" name="nama_alat" value="<?php echo $user_data['nama_alat']; ?>" required>
                <label>Tahun:</label>
                <input type="text" name="tahun" value="<?php echo $user_data['tahun']; ?>" required>
                <label>Merek:</label>
                <input type="text" name="merek" value="<?php echo $user_data['merek']; ?>" required>
                <label>Nomor Seri:</label>
                <input type="text" name="nomor_seri" value="<?php echo $user_data['nomor_seri']; ?>" required>
                <label>Lokasi:</label>
                <input type="text" name="lokasi" value="<?php echo $user_data['lokasi']; ?>" required>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal<?php echo $user_data['id']; ?>" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('deleteModal<?php echo $user_data['id']; ?>')">&times;</span>
            <h2>Hapus Alat</h2>
            <p>Apakah Anda yakin ingin menghapus alat <strong><?php echo $user_data['nama_alat']; ?></strong>?</p>
            <form action="delete.php?id=<?php echo $user_data['id']; ?>" method="post">
                <input type="submit" value="Hapus">
                <button type="button" onclick="closeModal('deleteModal<?php echo $user_data['id']; ?>')">Batal</button>
            </form>
        </div>
    </div>
    <?php } ?>
    <footer>
    <div class="footer-content">
        <p>Copyrights 2025 All Right Reserved</p>
    </div>
</footer>
</body>
</html>
