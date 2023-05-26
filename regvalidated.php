<!DOCTYPE html>
<html lang="en">
<head>
  <title>Incubate Registration Form</title>
  <style>
    body {
      background-color: #0F416F;
      color: rgb(24, 18, 18);
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
      margin-top: 50px;
    }


    .form-container {
      margin: 0 auto;
      max-width: 700px;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      text-align: left;
      background-color: #F0E9D6;
    }
    h3 {
      text-align: center;
    }
    h5 
    {
      text-align: right;
      color: red;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: navy; /* Added color for labels */
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,select {
      width: 90%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    input[type="date"]
    {
      width: 40%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    textarea {
      resize: vertical;
      height: 100px;
    }

    input[type="file"] {
      padding: 10px;
    }

    input[type="submit"],
    input[type="button"],input[type="reset"]{
      background-color: navy;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
    }

	.button-container {
      margin-top: 40px;
	    display: flex;
      justify-content: space-between;
    }
    .section-heading {
            text-align: center;
        }
        
        .section-heading h2 {
            margin: 0;
            font-size: 24px;
            line-height: 1.2;
        }
        .contact-info {
      float: left;
      width: 50%;
    }
    
    .address {
      float: right;
      width: 50%;
      text-align: right;
    }
    .error {
    color: red; 
    font-size: 14px; 
  }
    .form-group {
      display: flex;
      align-items: center;
    }
    
    .form-group label {
      margin-right: 10px;
    }
    
    .form-group .error {
      margin-left: 5px;
    }
  
   
  </style>
</head>
<body>
<?php
 $firstname = $lastname = $student_type = $registration_number = $school = $id_number = $date_incubated = $innovation_stage = $phone_number =
  $email = $photo = $partners = $ip_registered = $description = $category = "";

 $firstnameErr = $lastnameErr = $student_typeErr = $registration_numberErr = $schoolErr = $id_numberErr = $date_incubatedErr = $innovation_stageErr = $phone_numberErr 
 = $emailErr = $photoErr = $partnersErr = $ip_registeredErr = $descriptionErr = $categoryErr = "";


if($_SERVER["REQUEST_METHOD"]=="POST") 
{

        if(empty($_POST["first_name"]))
        {
            $firstnameErr="First Name is Required";
         }
        else
        {
            $firstname = test_input($_POST["first_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                $firstnameErr = "Only letters and white space allowed";
              }
        }
        if(empty($_POST["last_name"]))
        {
            $lastnameErr="Last Name is Required";
         }
        else 
        {
            $lastname = test_input($_POST["last_name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
                $lastnameErr = "Only letters and white space allowed";
              }
        }   
        if(empty($_POST["student_type"]))
        {
            $student_typeErr="Please fill this field";         
        }
        else
        {
            $student_type = test_input($_POST["student_type"]);

        }

        if (isset($_POST['student_type']) && $_POST['student_type'] === "Yes") 
   {
      if(empty($_POST["registration_number"]))
      {
          $registration_numberErr="Registration Number is required for Students";       
      }
      else
      {
          $registration_number = test_input($_POST["registration_number"]);

      }
      if(empty($_POST["school"]))
      {
          $schoolErr="School is required for students.";        
      }
      else
      {
          $school = test_input($_POST["school"]);

      }
    }
        
        if(empty($_POST["id_number"]))
        {
            $id_numberErr="ID number is Required";         
        }
        else
        {
            $id_number = test_input($_POST["id_number"]);
            if (!preg_match('/^\d{8}$/', $id_number)) {
                $id_numberErr = "Please enter a valid id number";
              } 
        }

        if(empty($_POST["date_incubated"]))
        {
            $date_incubatedErr ="The date is Required";         
        }
        else
        {
            $date_incubated = test_input($_POST["date_incubated"]);

        }
        if(empty($_POST["innovation_stage"])|| $_POST["innovation_stage"] == "default")
        {
            $innovation_stageErr="Select a valid stage";         
        }
        else
        {
            $innovation_stage = test_input($_POST["innovation_stage"]);

        }
        if(empty($_POST["phone_number"]))
        {
            $phone_numberErr="Phone number is Required";        
        }
        else
        {
            $phone_number = test_input($_POST["phone_number"]);
            if (!preg_match("/^(01|07)\d{8}$/", $phone_number)) {
              $phone_numberErr ="Please enter a valid phone number.";
            }

        }
        if(empty($_POST["email"]))
        {
            $emailErr="Email is Required";         
        }
        else
        {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }

        }
        if(empty($_POST["photo"]))
        {
            $photoErr="Photo is Required";        
         }
        else
        {
            $photo = test_input($_POST["photo"]);

        }
        if(empty($_POST["partners"]))
        {
            $partnersErr="Names of partners are Required";        
         }
        else
        {
            $partners = test_input($_POST["partners"]);

        }
        if(empty($_POST["ip_registered"]))
        {
            $ip_registeredErr="This field is Required";         
        }
        else
        {
            $ip_registered = test_input($_POST["ip_registered"]);

        }
        if(empty($_POST["description"]))
        {
            $descriptionErr="Description is Required";       
        }
        else
        {
            $description = test_input($_POST["description"]);
            $wordCount = str_word_count($description);
            $extrawords=$wordCount-250;
                    
            if ($wordCount > 250) {
                $descriptionErr = " Your description has $wordCount words.That is $extrawords more word(s) than required";
            }

        }
        if(empty($_POST["category"]) || $_POST["category"] == "default")
        {
            $categoryErr="Select a valid category";         
        }
        else
        {
            $category = test_input($_POST["category"]);

        }
        if (isset($_POST['clear_form'])) {
          // Clear form fields
           $firstname = $lastname = $student_type = $registration_number = $school =
           $id_number = $date_incubated = $innovation_stage = $phone_number =
           $email = $photo = $partners = $ip_registered = $description = $category =' ';
  
          // Display success message
          echo "<script>alert('Form cleared successfully!');</script>";
        }
        
        
      }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="form-container" ><br><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>">
        <div class="section-heading">
            <h2>KENYATTA UNIVERSITY<br>CHANDARIA BUSINESS INNOVATION AND INCUBATION CENTRE</h2>
        </div>
        <br><br>
        <div class="contact-info">
            <p>Kenya Drive, Next to KU Main Gate</p>
            <p>Main Campus</p>
            <p>Tel: 254-020-8710901</p>
          </div>
          
          <div class="address">
            <p>PO Box 43844-00100</p>
            <p>Nairobi-Kenya</p>
            <p>E-mail: <u>director-iiuil@ku.ac.ke</u></p>
        
          </div>
  <h3><u>Incubate Registration Form</u></h3>
   <h5>* Indicates required fields</h5>
    
    <div class="form-group">
    <label for="first_name">First Name:</label>
    <input autofocus type="text" id="first_name" name="first_name" value="<?php echo $firstname;?>">
    <span class="error">*<?php echo $firstnameErr; ?></span>
  </div>

    <div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" value="<?php echo $lastname; ?>">
    <span class="error">*<?php echo $lastnameErr; ?></span><br><br>
  </div>
  
  <br><br>

    <label for="student_type">Are you a KU student?</label>
    <input type="radio" name="student_type" id="KUStudentYes"
    <?php if (isset($student_type) && $student_type=="Yes") echo "checked";?>
    value="Yes" onchange="showFields()">Yes
    <input type="radio" name="student_type" id="KUStudentNo"
    <?php if (isset($student_type) && $student_type=="No") echo "checked";?>
    value="No" onchange="showFields()">No
    <br><span class="error">*<?php echo $student_typeErr; ?></span><br><br>


    <ol>
    <div id="registrationNumberInfo" style="display: none;" >
    <label>If yes please fill the following required fields:</label><br>
    <li>
      <label for="registration_number">Registration Number:</label>
      <input type="text" id="registration_number" name="registration_number" value="<?php echo $registration_number;?>"><br></li>
      <span class="error">*<?php echo $registration_numberErr; ?></span><br><br>
    </div>
    <div id="schoolInfo" style="display:none;">
    <li>
      <label for="school">School:</label>
      <input type="text" id="school" name="school" value="<?php echo $school;?>"><br></li>
      <span class="error">*<?php echo $schoolErr; ?></span><br><br>
    </div>
  </ol>
    <label for="id_number">ID Number: (8digits) </label>
    <input type="text" id="id_number" name="id_number" value="<?php echo $id_number;?>"><br>
    <span class="error">*<?php echo $id_numberErr; ?></span><br><br>

    <label for="date_incubated">Date Incubated:</label>
    <input type="date" id="date_incubated" name="date_incubated" value="<?php echo $date_incubated;?>" ><br>
    <span class="error">*<?php echo $date_incubatedErr; ?></span><br><br>

    <label for="innovation_stage">Stage of Innovation:</label>
    <select id="innovation_stage" name="innovation_stage">
      <option value="" selected disabled>Choose...</option>
      <option value="idea" <?php if ($innovation_stage == "idea") echo "selected"; ?>>Idea Phase</option>
      <option value="r&d" <?php if ($innovation_stage == "r&d") echo "selected"; ?>>Research and Development</option>
      <option value="prototype" <?php if ($innovation_stage == "prototype") echo "selected"; ?>>Prototype Phase</option>
      <option value="startup" <?php if ($innovation_stage == "startup") echo "selected"; ?>>Start-up</option>
      <option value="market" <?php if ($innovation_stage == "market") echo "selected"; ?>>Market Phase</option>
      <option value="scaling_up" <?php if ($innovation_stage == "scaling_up") echo "selected"; ?>>Scaling-up Phase</option>
      <option value="other" <?php if ($innovation_stage == "other") echo "selected"; ?>>Other</option>
    </select>
    <br><span class="error">*<?php echo $innovation_stageErr; ?></span><br><br>

 
    <label for="phone_number">Phone Number:(10 digits)</label>
    <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number;?>"><br>
    <span class="error">*<?php echo $phone_numberErr; ?></span><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email;?>"><br>
    <span class="error">*<?php echo $emailErr; ?></span><br><br>

    <label for="photo">Passport Size Photo:</label>
    <input type="file" id="photo" name="photo" accept="image/*" value="<?php echo $photo;?>"><br>
    <span class="error">*<?php echo $photoErr; ?></span><br><br>

    <label for="partners">Names of Key Partners/Investors:</label>
    <input type="text" id="partners" name="partners" value="<?php echo $partners;?>"><br>
    <span class="error">*<?php echo $partnersErr; ?></span><br><br>

    <label for="ip_registered">Is your IP (Intellectual Property) registered?</label>
    <input type="radio" name="ip_registered"
    <?php if (isset($ip_registered) && $ip_registered=="Yes") echo "checked";?>
    value="Yes">Yes
    <input type="radio" name="ip_registered"
    <?php if (isset($ip_registered) && $ip_registered=="No") echo "checked";?>
    value="No">No
    <br><span class="error">*<?php echo $ip_registeredErr; ?></span><br><br>


    <label for="description">Brief Description of Innovation (not exceeding 250 words):</label>
    <textarea id="description" name="description" ><?php echo $description;?></textarea><br>
    <span class="error">*<?php echo $descriptionErr; ?></span>  <br><br>


    <label for="category">Category of Innovation:</label>
<select id="category" name="category">
  <option value="" disabled selected>Choose...</option>
  <option value="business_professional_services" <?php if ($category == "business_professional_services") echo "selected"; ?>>Business and Professional Services</option>
  <option value="information_communication_technology" <?php if ($category == "information_communication_technology") echo "selected"; ?>>Information and Communication Technology</option>
  <option value="marketing_communication" <?php if ($category == "marketing_communication") echo "selected"; ?>>Marketing and Communication</option>
  <option value="manufacturing_construction" <?php if ($category == "manufacturing_construction") echo "selected"; ?>>Manufacturing and Construction</option>
  <option value="transport_logistics" <?php if ($category == "transport_logistics") echo "selected"; ?>>Transport and Logistics</option>
  <option value="bio_nano_technology" <?php if ($category == "bio_nano_technology") echo "selected"; ?>>Bio and Nano-Technology</option>
  <option value="health_nutrition" <?php if ($category == "health_nutrition") echo "selected"; ?>>Health and Nutrition</option>
  <option value="green_ecological_business" <?php if ($category == "green_ecological_business") echo "selected"; ?>>Green and Ecological Business</option>
  <option value="tourism_ecotourism" <?php if ($category == "tourism_ecotourism") echo "selected"; ?>>Tourism and Eco-Tourism</option>
  <option value="fine_performing_arts" <?php if ($category == "fine_performing_arts") echo "selected"; ?>>Fine and Performing Arts</option>
  <option value="sports_leisure_entertainment" <?php if ($category == "sports_leisure_entertainment") echo "selected"; ?>>Sports, Leisure and Entertainment</option>
  <option value="water_sanitation" <?php if ($category == "water_sanitation") echo "selected"; ?>>Water and Sanitation</option>
  <option value="energy" <?php if ($category == "energy") echo "selected"; ?>>Energy</option>
  <option value="media_entertainment" <?php if ($category == "media_entertainment") echo "selected"; ?>>Media and Entertainment</option>
</select>
<br><span class="error">*<?php echo $categoryErr; ?></span><br><br>


	  
       <div class="button-container">
        <div class="submit-button">
          <input type="submit" value="Submit">
        </div>
        <div class="clear-button">
          <input type="submit" name="clear_form" value="Clear Form" onclick=clearForm();>
        </div>
        <div class="cancel-button">
          <input type="button" value="Cancel">
        </div>
      </div>
</form>
</div>
<script>
  function clearForm() {
    if (confirm('Are you sure you want to clear the form?')) {
      document.getElementById('name').value = '';
      document.getElementById('student_type').value = '';
      document.getElementById('registration_number').value = '';
      document.getElementById('school').value = '';
      document.getElementById('id_number').value = '';
      document.getElementById('date_incubated').value = '';
      document.getElementById('innovation_stage').value = '';
      document.getElementById('phone_number').value = '';
      document.getElementById('email').value = '';
      document.getElementById('photo').value = '';
      document.getElementById('partners').value = '';
      document.getElementById('ip_registered').value = '';
      document.getElementById('description').value = '';
      document.getElementById('category').value = '';

    }
  }
  function showFields() {
      var student_type = document.getElementById("KUStudentYes").checked;
      var registrationNumberInfo = document.getElementById("registrationNumberInfo");
      var schoolInfo = document.getElementById("schoolInfo");

      if (student_type) {
        registrationNumberInfo.style.display = "block";
        schoolInfo.style.display = "block";
      } else {
        registrationNumberInfo.style.display = "none";
        schoolInfo.style.display = "none";
      }
    }
</script>
</body>
</html>