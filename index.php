<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ảnh</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #cfe6f66e; 
            margin: 0;
            padding: 0; 
            display: flex;
            justify-content: center; 
            align-items: center;     
            height: 100vh;           
        }
        .container {
            max-width: 550px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .container input[type="text"], .container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        .container input[type="submit"] {
            background-color: #008ff672;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #0191f7d3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        #imageName {
            width: 450px; 
            max-width: 100%; 
            padding: 10px; 
            border-radius: 5px; 
            border: 1px solid #ccc; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Ảnh (Tối đa 2MB)</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="error-message">'.htmlspecialchars($_GET['error']).'</div>';
        }
        ?>
        <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="imageName">Tên Ảnh:</label>
            <input type="text" name="image_name" id="imageName" required placeholder="Nhập tên ảnh...">
            
            <label for="fileUpload">Chọn Ảnh:</label>
            <input type="file" name="image" id="fileUpload" required>

            <input type="submit" name="submit" value="UPLOAD">
        </form>
    </div>
    
    <script>
        document.getElementById('uploadForm').onsubmit = function() {
            // Giữ lại giá trị tên ảnh trong trường hợp chuyển sang trang crop
            const imageName = document.getElementById('imageName').value;
            localStorage.setItem('imageName', imageName);
        };
    </script>
</body>
</html>
