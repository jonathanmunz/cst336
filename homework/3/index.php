<DOCTYPE! HTML>
<html>
<head>
<title>Application for Emplyment</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  
<div id="title">  
Application for Employment

</div>

<form action="action_page.php" method = "POST">
  Position You Are Applying For:
    <input type="text" name="position1">
    Desired Salary:
    <input type="text" name="salary">
    Date Available for Work:
    <input type="text" name="startdate"> <br> <br>
    
  <fieldset>
   <div id "PIStyle"> <br>
    <legend>Personal Information</legend> <br>
    Last name:
    <input type="text" name="lastname">
    First name:
    <input type="text" name="firstname">
    Middle:
    <input type="text" name="middlename"><br><br>
    </div>

    
    Address:    
    <input type="text" name="address">
    City:
    <input type="text" name="city">
    State:
    <input type="text" name="state">
    Zip:
    <input type="text" name="zip">
  

    
 
     Home Phone: <input type="text" name="homephone">
     Cell Phone:  <input type="text" name="cellphone">
     Email Address:  <input type="text" name="email"><br><br>
     Social Security Number: <input type="text" name="SSN"><br>
  

    US Citizen? <br>
      
      <input type="radio" name="citizen" value="Yes"> Yes<br>
      <input type="radio" name="citizen" value="No"> No<br><br>
      

    Have you ever been convicted of a felony?<br>
      
      <input type="radio" name="felony" value="Yes"> Yes<br>
      <input type="radio" name="felony" value="No"> No<br><br>
      

    If selected for employment are you willing to submit to a pre-employment drug screening test?<br>
      
      <input type="radio" name="drug" value="Yes"> Yes<br>
      <input type="radio" name="drug" value="No"> No<br><br>
      </fieldset>

    
    <fieldset> 

    <div id="EducationStyle"> 
    <legend>Education</legend> <br>
      <div>
      School Name:                                 
      <input type="text" name="schoolname" value= > <br>  
      </div>
      Location: 
      <input type="text" name="location"  value= > <br>
      
      Years Attended:  
      <input type="text" name="yearsattended" value= > <br>
      
      Degree Received: 
      <input type="text" name="degree" value= > <br>
      
      Major: 
      <input type="text" name="major" value= > <br>
     </div>
    
      </fieldset>
      

    <fieldset>
    <div id = "EmployStyle"> 
    <legend>Employment</legend> <br>
      Employer: <input type="text" name="employer"> <br> 
      Dates Employed: <input type="text" name="dateemp">  <br>
      Work Phone: <input type= "text" name="workphoneemp" align="right">  <br>
      Pay Rate: <input type="text" name="payrateemp"> <br>
      Address: <input type="text" name="addressemp"> <br>
      City: <input type="text" name="cityemp"> <br>
      Position: <input type="text" name="positionemp"> <br>
      Duties Performed: <input type="text" name="dutiesemp"> <br>
      Supervisors Name and Title: <input type="text" name="supervisoremp"> <br>
      Reason for leaving: <input type="text" name="reasonemp"> <br>
      May we contact them? :
      <input type="checkbox" name="contactemp" value="yes"> Yes
      <input type="checkbox" name="contactemp" value="no"> No
     </div>  
      </fieldset>

    
    <fieldset>
    <div id= RefStyle> 
    <legend>References</legend> <br>
      Name: <input type="text" name="nameref"> <br>
      Title: <input type="text" name="titleref"> <br>
      Company: <input type="text" name="companyref"> <br>
      Phone: <input type="text" name="phoneref"> <br>
    </div>
      </fieldset>
      

    <fieldset>
    <div id= AckStyle> 
    <legend>Acknowledgement and Authorization </legend> <br>
      <input type="Checkbox" name="ack1" value= true >I certify that all answers given herein are true and complete to the best of my knowledge. <br>
      <input type="Checkbox" name="ack2" value= true >I authorize investigation of all statements contained in this application for employment as may be necessary in arriving at
an employment decision. <br>
      <input type="Checkbox" name="ack3" value= true >In the event of employment, I understand that false or misleading information given in my application or interview(s) may
result in discharge. <br>
    </div>
      </fieldset>

Signiture of applicant: <input type="text" name ="sig">
Date: <input type="text" name ="date">


<input type="submit" value="Submit"> <br>
</form>

	<footer>
		
	</footer>
</body>
</html>