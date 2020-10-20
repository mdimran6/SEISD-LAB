<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$game = $pc = $Category= $price = "";
$game_err = $pc_err =$Category_err = $price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_game = trim($_POST["game"]);
    if(empty($input_game)){
        $name_err = "Please enter a game.";
    } elseif(!filter_var($input_game, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid game.";
    } else{
        $game = $input_game;
    }
    
    // Validate Category
    $input_Category = trim($_POST["Category"]);
    if(empty($input_Category)){
        $address_err = "Please enter an Category.";     
    } else{
        $Category = $input_Category;
    }
      // Validate pc
    $input_pc = trim($_POST["pc"]);
    if(empty($input_pc)){
        $pc_err = "Please enter an pc.";     
    } else{
        $pc = $input_pc;
    }
    
    
    // Validate salary
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the price amount.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Check input errors before inserting in database
    if(empty($game_err) && empty($pc_err) && empty($Category_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO games (game, pc, Category, price) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_game, $param_pc, $param_Category, $param_price);
            
            // Set parameters
            $param_game = $game;
            $param_pc = $pc;
            $param_Category=$Category;
            $param_price = $price;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add game to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($game_err)) ? 'has-error' : ''; ?>">
                            <label>Game</label>
                            <input type="text" name="game" class="form-control" value="<?php echo $game; ?>">
                            <span class="help-block"><?php echo $game_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pc_err)) ? 'has-error' : ''; ?>">
                            <label>PC config</label>
                            <textarea name="pc" class="form-control"><?php echo $pc; ?></textarea>
                            <span class="help-block"><?php echo $pc_err;?></span>
                        </div>
                        <div class="form-group">
                            <select name="Category"  class="form-control">
                            <option selected>Game Category...</option>
                            <option>Action</option>
                            <option>history</option>
                            <option>Adventure</option>
                            <option>Race</option>
                            </select>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>