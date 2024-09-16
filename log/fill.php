
<?php
session_start();
// include("connection.php");
// include("function.php");

// $user_data = check_details($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-grid.min.css">
     <link rel="stylesheet" href="./style.css">
    <title>BIRTH CERTIFICATE OF KENYA</title>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 0%;
        }
        .btn-submit, .logout {
            background-color: #007bff;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
        }
        .btn-submit:hover, .logout:hover {
            background-color: #0056b3;
        }
        .preview-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .draggable {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .img-fluid {
            max-width: 150px;
            height: auto;
        }
        .form-group label {
            margin-bottom: 0.5rem;
        }
        .text-bg-primary{
         background-color: #007bff;
         border-radius: 8px;
         border: none;
         color: white;
        }
        .text-bg-primary:hover{
            cursor: pointer;
            background-color: #0056b3;
        }
    </style>

</head>
    
<body>
   <div>
    <div class="container p-4">
        <h2 class="text-center">REPUBLIC OF KENYA</h2>
        <hr>

        <h1 class="text-center">CERTIFICATE OF BIRTH</h1>
        <form action="submission.php" method="POST" onsubmit="alert('Are you sure you want to submit this record?')">

            <!-- // session messages -->
            <?php
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']); // Clear the message after displaying it
            }

            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']); // Clear the message after displaying it
            }
            ?>
            
            <!-- Search Box -->
        <div class="row mt-4">
            <div class="col-md-3">
                <input type="text" id="searchEntryNo" placeholder="Enter Entry No">
            </div>
            <div class="col-md-3">
                <button type="button" onclick="searchEntry()" class="p-3 mb-3 text-bg-primary rounded-3">Search</button>
            </div> 
            <div class="ml-3">
                <label for="Name of the filler"> Name of the filler </label>
            </div>
            <div class="col col-md-3">
                <input type="text" required name="Name_of_the_filler" id="Name_of_the_filler">
            </div>
        </div>
        
            <div class="row mt-4">
                <div class="col-flex ml-3">
                    <label for="County">Birth in the </label>
                </div>
                <div class="col-md-3">
                    <input type="text" required name="Birth_in_the" placeholder="DISTRICT" id="Birth_in_the">
                </div>
                <div class="col-flex">
                    <label for="District in the">District in the </label>
                </div>
                <div class="col-md-4">
                    <input type="text" required name="District_in_the" placeholder="PROVINCE" id="District_in_the">
                </div>
                <div class="col-md-1">
                    Province
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-1">
                    <label for="Entry no">Entry no </label>
                </div>
                <div class="col-md-3">
                    <input type="text" required name="Entry_no" placeholder="L12345678/12" id="Entry_no">
                </div>

                <div class="col-md-1">
                    <label for="Where born"> Where Born </label>
                </div>

                <div class="col-md-3">
                    <input type="text" required name="where_born" id="where_born">
                </div>

                <div class="col-md-1">
                    <label for="Name">Name </label>
                </div>
                <div class="col-md-3">
                    <input type="text" required name="Name" id="Name">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-1">
                    <label for="Date of birth"> Date of Birth<label>
                </div>
                <div class="col-md-3">
                    <input type="date" required name="Date_of_birth" id="Date_of_birth">
                </div>

                <div class="col-md-1">
                    <label for="sex"> Sex </label>
                </div>

                <div class="col-md-3">
                    
                   <input type="text" required name="sex" id="sex">
                    <!-- <select name="sex" id="sex">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select> -->
                </div>

                <div class="col-md-1">
                    <label for="father_name">Name and Surname of Father </label>
                </div>
                <div class="col-md-3">
                    <input type="text" required name="Name_and_Surname_of_Father" id="Name_and_Surname_of_Father">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-auto">
                    <label for="Name and Maiden Name of Mother"> Name and Maiden Name of Mother </label>
                </div>
                <div class="col">
                    <input type="text" required name="Name_and_Maiden_Name_of_Mother" id="Name_and_Maiden_Name_of_Mother">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-auto">
                    <label for="Name and Maiden Name of Mother"> Name and Description of Informant </label>
                </div>
                <div class="col">
                    <input type="text" required name="Name_and_Description_of_Informant" id="Name_and_Description_of_Informant">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-2">
                    <label for="Name registering officer">Name of registering officer </label>
                </div>
                <div class="col-md-4">
                    <input type="text" required name="Name_of_Registering_Officer" id="Name_of_Registering_Officer">
                </div>

                <div class="col-md-2">
                    <label for="Date of registration"> Date of registration </label>
                </div>
                <div class="col-md-4">
                    <input type="date" required name="Date_of_Registration"
                    id="Date_of_Registration">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label for="Districtassistance">I
                        <input type="text" required name="District_Assistance" class="w-unset" id="District_Assistance">
                        District/Assistant</label>
                </div>
                <div class="col-12 mt-4">
                    <p>Register for<label for="registrar"> <input type="text" required name="Registrar"
                                class="w-unset w-50" id="Registrar">District, hereby
                            certify that this certificate
                            is compiled from an entry/return in the Register of Births in the District</label></p>
                </div>
            </div>
            <p>Given under the seal of the Director of Civil Registration on the <label for="date"> <input type="date"
                        required name="Date" class="w-unset w-50" id="Date"></label></p>


            <div class="row justify-content-start mb-6 mt-4">
                <div class="col-md-12">
                    <button class="btn-submit" type="submit">save</button>
                </div>
            </div>
            

            <!-- <p>This Certificate is issued in pursuance of ther Deaths Registration Act(Cap.149) which provides
                that
                a certified copy of any entry in any register oor return purporting to be sealed or stamped with
                the
                Seal of Director of civil Registration shall be received as evidence of the dates and facts
                therein
                contained without any or other proof of such entry. </p> -->


            <hr>
            <p class="">
                GPK(1) 281-40M bKS-10/2023
            </p>
            <button type="button" onclick="previewForm()" class="logout">Preview</button>
        </form>

        <!-- <div id="previewContainer" class="preview-container"> -->
            <!-- <h2>Form Preview</h2>
            <div id="previewContent" class="preview-content">
                <p id="previewEntry_no" class="draggable"></p>
            </div>
            <button onclick="printPreview()">Print</button>
        </div> -->
       <h2>Form Preview</h2>
        <div id="previewContainer" class="preview-container">
           
            <div id="previewContent" class="preview-content">
                <p id="previewBirth_in_the" class="draggable"></p>
                <p id="previewDistrict_in_the" class="draggable"></p>                
                <p id="previewEntry_no" class="draggable"></p>
                <p id="previewwhere_born" class="draggable"></p>
                <p id="previewName" class="draggable"></p>
                <p id="previewDate_of_birth" class="draggable"></p>
                <p id="previewsex" class="draggable"></p>
                <p id="previewName_and_Surname_of_Father" class="draggable"></p>
                <p id="previewName_and_Maiden_Name_of_Mother" class="draggable"></p>
                <p id="previewName_and_Description_of_Informant" class="draggable"></p>
                <p id="previewName_of_Registering_Officer" class="draggable"></p>
                <p id="previewDate_of_Registration" class="draggable"></p>
                <p id="previewDistrict_Assistance" class="draggable"></p>
                <p id="previewRegistrar" class="draggable"></p>
                <p id="previewDate" class="draggable"></p>
            </div>
            
        </div>
                <button onclick="printPreview()" class="logout">Print</button>

        <script src="./script.js"></script>
        <a href="../index.php" class="btn btn-warning btn-lg shadow rounded-pill">Logout</a>
        <!-- <script src="./script.js" charset="utf-8"></script> 
           
</body> -->


          
</html>


