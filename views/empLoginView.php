<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login Forms</title>
</head>
<body>
<div class="header">
       
    </div>
    <div class="form-container">
    <!-- Employer login Form -->
    <form id="EmpLogin" action="../include/signupNew.inc.php" method="post">
        <h2>Lag ny bruker</h2>
        <p>Har du ikke konto? <a href="empSignupView.php">Arbeidsgiver logg inn her</a></p>
    
        <label for="email">E-mail:<font color="red">*</font></label>
        <input type="text" id="email" name="email">

        <label for="OrgName">Organisasjonsnavn:<font color="red">*</font></label>
        <input type="text" id="OrgName" name="OrgName">

        <label for="OrgNumber">Organisasjonsnummer:<font color="red">*</font></label>
        <input type="text" id="OrgNumber" name="OrgNumber">

 
        <label for="password">Passord:<font color="red">*</font></label>
        <input type="password" id="password" name="password">


        <button type="submit" name="submit" value="submit" class="standardButton">Sign Up</button>
    </form>
    
</div>

</body>
</html>