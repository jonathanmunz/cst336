Please review your information below: <br> <br>

<?php

echo "Position: ".$_POST['position1'] . "<br>";
echo "Salary: ".$_POST['salary'] . "<br>";
echo "Start Date: ".$_POST['startdate'] . "<br>";

echo "Last Name: ".$_POST['lastname'] . "<br>";
echo "First Name: ".$_POST['firstname'] . "<br>";
echo "Middle Name: ".$_POST['middlename'] . "<br>";

echo "Address: ".$_POST['address'] . "<br>";
echo "City: ".$_POST['city'] . "<br>";
echo "State: ".$_POST['state'] . "<br>";
echo "Zip: ".$_POST['zip'] . "<br>";

echo "Home Phone: ".$_POST['homephone'] . "<br>";
echo "Cell Phone: ".$_POST['cellphone'] . "<br>";
echo "Email Address: ".$_POST['email'] . "<br>";
echo "Social Security Number: ".$_POST['SSN'] . "<br>";

echo "US Citizen: ".$_POST['citizen'] . "<br>";
echo "Felony Convition: ".$_POST['felony'] . "<br>";
echo "Drug Screening: ".$_POST['drug'] . "<br>";

echo "School Name: ".$_POST['schoolname'] . "<br>";
echo "Location: ".$_POST['location'] . "<br>";
echo "Years Attended: ".$_POST['yearsattended'] . "<br>";
echo "Degree Received: ".$_POST['degree'] . "<br>";
echo "Major: ".$_POST['major'] . "<br>";

echo "Employer: ".$_POST['employer'] . "<br>";
echo "Dates Employed: ".$_POST['dateemp'] . "<br>";
echo "Work Phone: ".$_POST['workphoneemp'] . "<br>";
echo "Pay Rate: ".$_POST['payrateemp'] . "<br>";
echo "Address: ".$_POST['addressemp'] . "<br>";
echo "City: ".$_POST['cityemp'] . "<br>";
echo "Position: ".$_POST['positionemp'] . "<br>";
echo "Duties Performed: ".$_POST['dutiesemp'] . "<br>";
echo "Supervisor Name & Title: ".$_POST['supervisoremp'] . "<br>";
echo "Reason for Leaving: ".$_POST['reasonemp'] . "<br>";
echo "May we contact them?: ".$_POST['contactemp'] . "<br>";

echo "Name: ".$_POST['nameref'] . "<br>";
echo "Title: ".$_POST['titleref'] . "<br>";
echo "Company: ".$_POST['companyref'] . "<br>";
echo "Phone: ".$_POST['phoneref'] . "<br>";
echo "Acknowledgement 1: ".$_POST['ack1'] . "<br>";
echo "Acknowledgement 2: ".$_POST['ack2'] . "<br>";
echo "Acknowledgement 3: ".$_POST['ack3'] . "<br>";
echo "Signiture of Applicant: ".$_POST['sig'] . "<br>";
echo "Date: ".$_POST['date'] . "<br>";

?>

<form action="thankyou.php">;
<input type="submit" value="Confirm"> <br>;
</form>;