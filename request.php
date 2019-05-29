<?php include('server.php'); ?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }

    $email=$_SESSION['email'];
    $username=$_SESSION['username'];
    $dev_name=$_SESSION['developer_name'];
    $dev_email=$_SESSION['developer_email'];
    $project_type=$_SESSION['project_type'];
    //echo $_SESSION['project_type'];
?>

<?php
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Form</title>
    <link rel="stylesheet" href="request.css">
</head>
<body style="background:url(images/bgolg.png);background-repeat:no-repeat;background-size:100% 100%;">
    <div class="header">
        <h1>Request Form</h1>
    </div>
<form method="post" action="request.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Client's Username</label>
            <input type="text" name="clientsName" value="<?php echo $username; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Client's Email</label>
            <input type="text" name="clientsEmail" value="<?php echo $email; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Developers's Username</label>
            <input type="text" name="developersName" value="<?php echo $dev_name; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Developer's Email</label>
            <input type="text" name="developersEmail" value="<?php echo $dev_email; ?>" readonly>
        </div>
        <div class="input-group">
            <label>Description about the project</label>
            <input type="text" name="description">
        </div>
        
        <div class="input-group">
            <label>Project Type</label>
            <input type="text" name="type" value="<?php echo $project_type ?>" readonly>
        </div>
        <div class="input-group1">
            <select name="period" class="select">
                <option>Select Duration</option>
                <option value="3 days">3 days</option>
                <option value="5 days">5 days</option>
                <option value="1 week">1 week</option>
                <option value="1.5 weeks">1.5 weeks</option>
                <option value="2 weeks">2 weeks</option>
                <option value="2.5 week">2.5 weeks</option>
                <option value="3 weeks">3 weeks</option>
                <option value="3.5 weeks">3.5 weeks</option>
                <option value="1 month">1 month</option>
                <option value="1.5 months">1.5 months</option>
                <option value="2 months">2 months</option>
                <option value="3 moths">3 months</option>
                <option value="3 moths +">more than 3 moths</option>
                
            </select>
        </div>
        
        <div class="input-group-btn">
            <button type="submit" name="request" class="btn1">Submit Request</button>
            <button type="submit" name="cancel request" class="btn2"><a href="<?= $previous ?>">Cancel Request</a></button>
        </div>
    </form>
</body>
</html>